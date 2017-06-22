<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Product extends Model{
		protected $fillable = ['name', 'unit_price', 'expiration', 'weight', 'desc', 'user_id', 'provider_id'];

		public function provider(){
			return $this->belongsTo('App\Models\Provider');
		}

		public function order(){
			return $this->belongsToMany('App\Models\Product', 'order_product', 'product_id', 'order_id');
		}

	}