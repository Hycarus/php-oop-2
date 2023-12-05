<?php
include __DIR__ . '/Product.php';


class Game extends Product
{
    private int $appid;
    private string $name;
    private string $image;
    private string $playtime;


    function __construct($id, $title, $image, $quantity, $price, $playtime)
    {
        parent::__construct($price, $quantity);
        $this->appid = $id;
        $this->name = $title;
        $this->image = $image;
        $this->playtime = $playtime;
    }
    public function printCard()
    {
        $sconto = $this->setDiscount($this->name);
        $image = $this->image;
        $title = $this->name;
        $price = $this->price;
        $quantity = $this->quantity;
        $playtime = $this->playtime;
        include __DIR__ . '/../Views/card.php';
    }
    public static function getRndImage()
    {
        $gameString = file_get_contents(__DIR__ . '/steam_db.json');
        $gameList = json_decode($gameString, true);
        $rndIndex = rand(0, count($gameList) - 1);
        $gameList[$rndIndex];
        $image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $gameList[$rndIndex]['appid'] . '/header.jpg';
        return $image;
    }
    public static function fetchAll()
    {
        $gameString = file_get_contents(__DIR__ . '/steam_db.json');
        $gameList = json_decode($gameString, true);

        $games = [];


        foreach ($gameList as $item) {
            $image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $item['appid'] . '/header.jpg';
            $quantity = rand(0, 100);
            $price = rand(5, 200);
            $games[] = new Game($item['appid'], $item['name'], $image, $quantity, $price, $item['playtime_forever']);
        }
        return $games;
    }
}
