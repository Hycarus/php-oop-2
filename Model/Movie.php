<?php
include __DIR__ . '/Genre.php';
include __DIR__ . '/Product.php';
class Movie extends Product
{
    private int $id;
    private string $title;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $original_language;
    private array $genre;


    function __construct($id, $title, $overview, $vote, $image, $language, $genre, $quantity, $price)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->original_language = $language;
        $this->genre = $genre;
    }

    /**
     * Generates the HTML template for displaying the vote average as stars.
     *
     * This function calculates the number of stars to display based on the vote average.
     * It uses the ceil function to round up the vote average divided by 2.
     * Then it generates an HTML template with the appropriate number of filled and empty stars.
     *
     * @return string The HTML template for displaying the vote average as stars.
     */
    public function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= '</p>';
        return $template;
    }

    public function getFlag()
    {
        $flag = 'img/' . $this->original_language . '.gif';
        return $flag;
    }

    public function printCard()
    {
        $sconto = $this->setDiscount($this->title);
        $image = $this->poster_path;
        $title = $this->title;
        $content = $this->overview;
        $custom = $this->getVote();
        $genre = $this->genre;
        $flag = $this->getFlag();
        $price = $this->price;
        $quantity = $this->quantity;
        include __DIR__ . '/../Views/card.php';
    }

    public static function fetchAll()
    {
        $movieString = file_get_contents(__DIR__ . '/movie_db.json');
        $movieList = json_decode($movieString, true);

        $movies = [];


        foreach ($movieList as $item) {
            $randomGenres = [];
            $genres = Genre::fetchAll();
            for ($i = 0; $i < count($item['genre_ids']); $i++) {
                $index = rand(0, count($genres) - 1);
                $randGenre = $genres[$index];
                array_push($randomGenres, $randGenre);
            }
            $quantity = rand(0, 100);
            $price = rand(5, 200);
            $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language'], $randomGenres, $quantity, $price);
        }
        return $movies;
    }
}
