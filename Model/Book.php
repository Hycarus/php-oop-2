<?php
include __DIR__ . '/Product.php';
include __DIR__ . '/../Traits/DrawCard.php';

class Book extends Product
{
    use DrawCard;
    private int $_id;
    private string $title;
    private string $longDescription;
    private string $thumbnailUrl;
    private array $authors;
    private array $categories;


    function __construct($id, $title, $overview, $image, $authors, $quantity, $price, $categories)
    {

        parent::__construct($price, $quantity);
        $this->categories = $categories;
        $this->_id = $id;
        $this->title = $title;
        $this->longDescription = $overview;
        $this->thumbnailUrl = $image;
        $this->authors = $authors;
    }
    public function formatCard()
    {
        $cardItem = [
            'title' => $this->title,
            'content' => $this->longDescription,
            'image' => $this->thumbnailUrl,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'sconto' => $this->setDiscount($this->title),
            'authors' => $this->authors,
            'categories' => $this->categories,
        ];
        return $cardItem;
    }
    public static function fetchAll()
    {
        $bookString = file_get_contents(__DIR__ . '/books_db.json');
        $bookList = json_decode($bookString, true);

        $books = [];


        foreach ($bookList as $item) {
            $authorsList = [];
            for ($i = 0; $i < count($item['authors']); $i++) {
                array_push($authorsList, $item['authors'][$i]);
            }
            $categoriesList = [];
            for ($i = 0; $i < count($item['categories']); $i++) {
                array_push($categoriesList, $item['categories'][$i]);
            }
            $quantity = rand(0, 100);
            $price = rand(5, 200);
            $books[] = new Book($item['_id'], $item['title'], $item['longDescription'], $item['thumbnailUrl'], $item['authors'], $quantity, $price, $item['categories']);
        }
        return $books;
    }
}
