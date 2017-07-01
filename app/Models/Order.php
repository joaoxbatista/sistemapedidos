<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Order extends Model{
		protected $fillable = ['client_id', 'buy_date', 'total'];
		public $timestamps = false;

		public function client(){
			return $this->belongsTo('App\Models\Client');
		}

		public function getBuyDateAttribute(){
			return date('d/m/Y H:i:s', strtotime($this->attributes['buy_date']));
		}

		public function items(){
			return $this->belongsToMany('App\Models\Product', 'order_product', 'order_id', 'product_id')
			->withPivot('total', 'qtd_itens');
		}
	}