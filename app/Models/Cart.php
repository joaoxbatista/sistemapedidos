<?php
	
	/*
	|	Classe responsável por gerênciar as compras e armazenar na sessão
	*/
	namespace App\Models;

	class Cart{

	
		public $items = null;

		/*Valor total da compras*/
		public $totalPrice = 0;

		/*Quantidade de itens*/
		public $totalQty = 0;


		public function __construct($oldCart){

			/*Caso já exista algum valor em oldCart, então usar esse valor*/
			if($oldCart):
				$this->items = $oldCart->items;
				$this->totalPrice = $oldCart->totalPrice;
				$this->totalQty = $oldCart->totalQty;
			endif;
		}


		public function add($item, $id){
			$storedItem = ['qty' => 0, 'price' => $item->unit_price, 'item' => $item];
			
			/*Caso existam itens e se existir o item com o id igual ao do produto então pegar o que já existe*/
			if($this->items):
			
				if(array_key_exists($id, $this->items)): 
					$storedItem = $this->items[$id];
				endif;

			endif;

			/*Adiciona mais 1 a quantidade do produto*/
			$storedItem['qty']++;

			/*Adiciona o preço do produto baseado na quantidade*/
			$storedItem['price'] = $item->unit_price * $storedItem['qty'];

			/*Atualiza as informações do carrinho com as alterações do item*/
			$this->items[$id] = $storedItem;
			$this->totalPrice += $item->unit_price;
			$this->totalQty++;
		}

		public function remove($id){
			if($this->items[$id]){
				$this->totalQty -= $this->items[$id]['qty'];
				unset($this->items[$id]);
			}
		}

		public function clear(){
			$this->items = null;
			$this->totalQty = 0;
			$this->totalPrice = 0;
		}


		
	}