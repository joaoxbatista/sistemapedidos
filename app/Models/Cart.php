<?php

/**
 * Classe para armazernar items no carrinho. A mesma é utilizada na sessão e possui 
 * uma lista de items, o preço total e sua quantidade total
 */

namespace App\Models;

class Cart {

    private $items;
    private $totalPrice;
    private $totalQuantity;

    public function __construct($oldCart = null) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuantity = $oldCart->totalQuantity;
        } else {
            $this->items = null;
            $this->totalPrice = 0;
            $this->totalQuantity = 0;
        }
    }
    
    public function addItem(Item $item) {

        if ($this->items) {
            if (array_key_exists($item->product->id, $this->items)) {

                $this->totalPrice -= $this->items[$item->product->id]->price;
                $this->totalQuantity -= $this->items[$item->product->id]->quantity;
                $item->addQuantity($this->items[$item->product->id]->quantity);
            }
        }

        $this->items[$item->product->id] = $item;
        $this->totalPrice += $item->price;
        $this->totalQuantity += $item->quantity;

        echo "Item adicionado com sucesso!";
    }

    public function updateItem(Item $item) {
        if($item->price > 0 and $item->quantity > 0){
           if (array_key_exists($item->product->id, $this->items)) {
            
                $this->totalPrice -= $this->items[$item->product->id]->price;
                $this->totalQuantity -= $this->items[$item->product->id]->quantity;

                $this->items[$item->product->id]->quantity = $item->quantity;
                $this->items[$item->product->id]->price = $item->price;

                $this->totalPrice += $item->price;
                $this->totalQuantity += $item->quantity;
                echo "item atualizado com sucesso";
            
            
            
            } else {
                echo "item não existe";
            }
        } else {
            echo "quantidade e preços não podem ser negativos";
        }
        
    }

    public function removeItem(int $id) {
        if (array_key_exists($id, $this->items)) {
            $item = $this->items[$id];
            array_pull($this->items, $id);
            $this->totalPrice -= $item->price;
            $this->totalQuantity -= $item->quantity;
            echo "item removido com sucesso";
        } else {
            echo "item não existe";
        }
    }
    
    /**
     * Getters And Setters 
     **/
    
   function getItems() {
       return $this->items;
   }

   function getTotalPrice() {
       return round($this->totalPrice, 2);
   }

   function getTotalQuantity() {
       return $this->totalQuantity;
   }

   function setItems($items) {
       $this->items = $items;
   }

   function setTotalPrice($totalPrice) {
       $this->totalPrice = $totalPrice;
   }

   function setTotalQuantity($totalQuantity) {
       $this->totalQuantity = $totalQuantity;
   }


    

}
