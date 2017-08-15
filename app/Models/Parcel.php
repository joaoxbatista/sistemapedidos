<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = ['pay_date', 'value', 'order_id', 'status'];
    public $timestamps = false;

    public function order()
    {
    	return $this->belongsTo('App\Models\Order');
    }

    public function getPayDateAttribute()
    {
		return date('d/m/Y', strtotime($this->attributes['pay_date']));
	}

	public function getValueAttribute()
	{
		return 'R$ '.$this->attributes['value'];
	}
}
