<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Client extends Model{
		protected $fillable = ['user_id', 'name', 'cpf', 'cnpj', 'limit_credit', 'email', 'phone', 'city', 'state', 'street', 'district', 'cep'];
		public $timestamps = false;


		public function orders()
		{
			return $this->hasMany('App\Models\Order');
		}

		public function getIdentify($type = null){
			if(is_null($type))
			{
				if(!is_null($this->attributes['cpf']))
				{
					return $this->attributes['cpf'];
				}

				return $this->attributes['cnpj'];
			}

			if(!is_null($this->attributes['cpf']))
			{
				return "CPF";
			}
			else{
				return "CNPJ";
			}

			
			

			
		}
	}