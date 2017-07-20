<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Order extends Model{
		protected $fillable = ['client_id', 'buy_date', 'due_date', 'total', 'seller_id', 'status'];
		public $timestamps = false;

		public function client()
        {
			return $this->belongsTo('App\Models\Client');
		}

		public function getBuyDateAttribute()
        {
			return date('d/m/Y H:i:s', strtotime($this->attributes['buy_date']));
		}

        public function getDueDateAttribute()
        {
            return date('d/m/Y', strtotime($this->attributes['due_date']));
        }

		public function seller(){
		    return $this->belongsTo('App\Models\Seller');
        }

		public static function sellerItems()
        {
            $orders = self::all();
            $totalItems = 0;

            foreach($orders as $order){
                $totalItems += $order->items()->sum('qtd_itens');
            }

            return $totalItems;
        }


        public static function balance()
        {
            return Order::all()->sum('total');
        }

        public function items()
        {
			return $this->belongsToMany('App\Models\Product', 'order_product', 'order_id', 'product_id')
			->withPivot('total', 'qtd_itens');
		}

	}