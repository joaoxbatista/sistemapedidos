<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Client extends Model{
		protected $fillable = ['user_id', 'name', 'cpf', 'cnpj', 'email', 'phone', 'city', 'state', 'street', 'district', 'cep'];
		public $timestamps = false;
	}