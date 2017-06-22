<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Order extends Model{
		protected $fillable = ['client_id', 'buy_date', 'total'];
		public $timestamps = false;

		public function client(){
			return $this->belongsTo('App\Models\Client');
		}

		public function items(){
			return $this->belongsToMany('App\Models\Product', 'order_product', 'order_id', 'product_id');
		}
	}