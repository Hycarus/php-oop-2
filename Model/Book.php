<?php
include __DIR__ . '/Product.php';

class Book extends Product
{
    private int $_id;
    private string $title;
    private string $longDescription;
    private string $thumbnailUrl;
    private array $authors;


    function __construct($id, $title, $overview, $image, $authors, $quantity, $price)
    {
        parent::__construct($price, $quantity);
        $this->_id = $id;
        $this->title = $title;
        $this->longDescription = $overview;
        $this->thumbnailUrl = $image;
        $this->authors = $authors;
    }
    public function printCard()
    {
        $image = $this->thumbnailUrl;
        $title = $this->title;
        $content = $this->longDescription;
        $price = $this->price;
        $quantity = $this->quantity;
        $authors = $this->authors;
        include __DIR__ . '/../Views/card.php';
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
            $quantity = rand(0, 100);
            $price = rand(5, 200);
            $books[] = new Book($item['_id'], $item['title'], $item['longDescription'], $item['thumbnailUrl'], $item['authors'], $quantity, $price);
        }
        return $books;
    }
}
