<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;


	class Provider extends Model{
		
		protected $fillable = ['user_id', 'name', 'cnpj', 'email', 'phone', 'city', 'state', 'street', 'district', 'cep'];
		public $timestamps = false;
	}