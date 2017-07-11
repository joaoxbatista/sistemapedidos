<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Saller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'saller';

    public $fillable = ['cpf', 'name', 'payment', 'email', 'image', 'password', 'user_id'];
    protected $hidden = ['password', 'remember_token'];

}

