<?php
include __DIR__ . '/Product.php';
include __DIR__ . '/../Traits/DrawCard.php';


class Game extends Product
{
    use DrawCard;
    private int $appid;
    private string $name;
    private string $image;
    private string $playtime;


    function __construct($id, $title, $image, $quantity, $price, $playtime, $discount)
    {
        parent::__construct($price, $quantity, $discount);
        $this->appid = $id;
        $this->name = $title;
        $this->image = $image;
        $this->playtime = $playtime;
    }
    public function formatCard()
    {
        $cardItem = [
            'title' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'sconto' => $this->setDiscount(10),
            'playtime' => $this->playtime
        ];
        return $cardItem;
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
            $discount = rand(0, 100);
            $quantity = rand(0, 100);
            $price = rand(5, 200);
            $games[] = new Game($item['appid'], $item['name'], $image, $quantity, $price, $item['playtime_forever'], $discount);
        }
        return $games;
    }
}
