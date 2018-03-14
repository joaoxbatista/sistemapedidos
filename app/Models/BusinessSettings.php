<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSettings extends Model
{
    
    protected $fillable = [
		'name',
		'logo', 
		'cnpj', 
		'city', 
		'state', 
		'street', 
		'district', 
		'cep', 
		'kilometer_value',
    ];

    public function user()
    {
    	return $this->hasOne('App\User');
    }

}
