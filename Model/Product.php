<?php
class Product
{
    protected float $price;
    private int $discount;
    protected int $quantity;

    public function __construct($price, $quantity, $discount)
    {
        $this->price = $price;
        $this->quantity = $quantity;
        $this->discount = $discount;
    }
    public function setDiscount(int $perc)
    {
        if ($perc < 5 || $perc > 90) {
            throw new Exception("Discount must be between 5 and 90");
        } else {
            $this->discount = $perc;
        }
    }
    public function getDiscount()
    {
        return $this->discount;
    }
}
