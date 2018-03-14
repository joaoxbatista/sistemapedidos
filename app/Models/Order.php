<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Order extends Model{
		protected $fillable = [
            'buy_date',
            'due_date',
            'status',
            'payment_form',
            'price_products',
            'price_discounts',
            'price_final',
            'seller_id',
            'client_id',
        ];

		public $timestamps = false;

        public function getStatusAttribute()
        {
            $parcels = $this->parcels;
            if(is_null($parcels))
            {
                $this->attributes['status'];
            }
            else
            {
               
                foreach($parcels as $parcel)
                {
                    if(!$parcel->status)
                    {
                        return false;
                    }
                }

                return true;
            }
        }

		public function client()
        {
			return $this->belongsTo('App\Models\Client');
		}

		public function getBuyDateAttribute()
        {
			return date('d/m/Y', strtotime($this->attributes['buy_date']));
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
            return Order::all()->sum('price_final');
        }

        public function items()
        {
			return $this->belongsToMany('App\Models\Product', 'order_product', 'order_id', 'product_id')
			->withPivot('item_total_price', 'item_price', 'item_weight', 'product_quantity', 'item_discount');
		}

        public function parcels()
        {
            return $this->hasMany('App\Models\Parcel');
        }

        

	}