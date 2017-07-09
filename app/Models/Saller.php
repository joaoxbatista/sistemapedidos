<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saller extends Model
{
    public $fillable = ['cpf', 'name', 'payment', 'email', 'image', 'password', 'user_id'];
    protected $hidden = ['password', 'remember_token'];


}
