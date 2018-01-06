<?php

/**
 Classe para armazernar items no carrinho. A mesma é utilizada na sessão e possui  uma lista de items, o preço total e sua quantidade total.
 **/

 namespace App\Models;

 class Cart {

    private $items;
    private $totalPrice;
    private $totalQuantity;
    private $seller;
    private $client;
    private $parcels;
    private $parcelsQuantity;
    private $discount;

    //Obtem o json do carrinho
    public function getJson()
    {
        $data = [];
        foreach($this->items as $item){
            $row = [
            "id" => $item->product->id,
            "name" => $item->product->name,
            "unit_price" => $item->product->unit_price,
            "quantity" => $item->quantity,
            ];

            array_push($data, $row);

        }

        return $data;
    }

    //Construtor
    public function __construct($oldCart = null) {
        if ($oldCart) 
        {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->seller = $oldCart->seller;
            $this->client = $oldCart->client;
            $this->parcels = $oldCart->parcels;
            $this->parcelsQuantity = $oldCart->parcelsQuantity;
            $this->discount = $oldCart->discount;
        } 
        else 
        {
            $this->items = null;
            $this->totalPrice = 0;
            $this->totalQuantity = 0;
            $this->parcelsQuantity = 0;
            $this->seller = null;
            $this->client = null;
            $this->parcels = null;
            $this->discount = 0;
        }
    }

    
    //Adiciona o item no array de items
    public function addItem(Item $item) 
    {

        if ($this->items) 
        {
            if (array_key_exists($item->product->id, $this->items)) 
            {

                $this->totalPrice -= $this->items[$item->product->id]->price;
                $this->totalQuantity -= $this->items[$item->product->id]->quantity;
                $item->addQuantity($this->items[$item->product->id]->quantity);
            }
        }

        $this->items[$item->product->id] = $item;
        $this->totalPrice += $item->price;
        $this->totalQuantity += $item->quantity;

    }

    //Atualiza os items
    public function updateItem(Item $item) 
    {
        if($item->price > 0 and $item->quantity > 0)
        {
           if (array_key_exists($item->product->id, $this->items)) 
           {

                $this->totalPrice -= $this->items[$item->product->id]->price;
                $this->totalQuantity -= $this->items[$item->product->id]->quantity;

                $this->items[$item->product->id]->quantity = $item->quantity;
                $this->items[$item->product->id]->price = $item->price;

                $this->totalPrice += $item->price;
                $this->totalQuantity += $item->quantity;
                echo "item atualizado com sucesso";
            
            } 

            else 
            {
                echo "item não existe";
            }
        } 
        else 
        {
            echo "quantidade e preços não podem ser negativos";
        }

    }
    //Remove o item do carrinho
    public function removeItem(int $id) 
    {
        if (array_key_exists($id, $this->items)) 
        {
            $item = $this->items[$id];
            array_pull($this->items, $id);
            $this->totalPrice -= $item->price;
            $this->totalQuantity -= $item->quantity;
            echo "item removido com sucesso";
        } 
        else 
        {
            echo "item não existe";
        }
    }

    //Obtem os items
    function getItems() 
    {
       return $this->items;
    }

    //Obtem o preço total
    function getTotalPrice() 
    {
       return round($this->totalPrice, 2);
    }

    //Obtem a quantidade total
    function getTotalQuantity() 
    {
       return $this->totalQuantity;
    }
    
    //Seta os items
    function setItems($items) {
       $this->items = $items;
    }

    //Seta o Preço total
    function setTotalPrice($totalPrice) {
       $this->totalPrice = $totalPrice;
    }

    //Seta a quantidade total de items
    function setTotalQuantity($totalQuantity) {
       $this->totalQuantity = $totalQuantity;
    }

    //Obtem o vendedor
    public function getseller()
    {
        return $this->seller;
    }

    //Seta o vendedor
    public function setseller(seller $seller)
    {
        $this->seller = $seller;
    }

    //Obtem o cliente
    public function getClient()
    {
        return $this->client;
    }

    //Seta o cliente
    public function setClient($client)
    {
        $this->client = $client;
    }
    
    //Seta porcentagem do disconte
    public function setDiscountPercent($discount)
    {
        $percent = $this->getTotalPrice()/100;
        $this->discount = $percent*$discount;
    }

    //Seta desconto
    public function setDiscount($discount)
    {   
        $this->discount = $discount;
    }

    //Retorna desconto
    public function getDiscount()
    {
        return $this->discount;
    }

    //Seta as parcelas do pedido
    public function setParcels($parcels)
    {
        $this->parcels = $parcels;
    }

    //Retorna as parcelas 
    public function getParcels()
    {
        return $this->parcels;
    }

    public function getTotalPriceWithDiscount(){
        if($this->discount > 0){
            return ($this->totalPrice - $this->discount);    
        }

        return $this->getTotalPrice();

        
    }

    //Seta quantidade de parcelas
    public function setParcelsQuantity($quantity){
        $this->parcelsQuantity = $quantity;
    }

    //Retorna quantidade de parcelas
    public function getParcelsQuantity(){
        return $this->parcelsQuantity;
    }

    //Atualiza o valor das parcelas
    //Atualizar parcelas
    public function updateParcels()
    {

        if($this->parcelsQuantity > 0){

            $value = round(($this->getTotalPriceWithDiscount() / $this->parcelsQuantity), 2);

            for ( $i = 0; $i < $this->parcelsQuantity; $i++)
            {
                $this->parcels[$i]['value'] = $value;
            }

        }

    }
}
