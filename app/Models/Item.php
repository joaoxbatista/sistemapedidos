<?php

namespace App\Models;

class Item {

    public $product;
    public $quantity;
    public $price;

    public function __construct($product, $quantity = 0) {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->price = $product->unit_price * $quantity;
    }

    public function addQuantity($quantity){
        $this->quantity += $quantity;
        $this->price = $this->product->unit_price * $this->quantity;
    }
}
