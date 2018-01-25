<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
    	'number', 
    	'holder_name',
    	'cnpj',
    	'cpf',
        'agency',
        'acount_number',
        'due_date',
        'value',
        'status',
        'client_id',
        'bank_id',
    ];

    public function bank()
    {
    	return $this->belongsTo('App\Models\Bank');
    }
    
}
