<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';

    public $fillable = ['cpf', 'name', 'payment' ,'comission', 'email', 'image', 'password', 'user_id'];
    protected $hidden = ['password', 'remember_token'];

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

}

