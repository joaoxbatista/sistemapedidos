<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSettings extends Model
{
    $fillable = ['name', 'logo', 'cnpj', 'city', 'state', 'street', 'district', 'cep'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
