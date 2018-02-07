<?php
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $i = 0;
        for ($i; $i < 30; $i++) {
            
            $client =
            [
             'user_id' => 1,
             'name' => $faker->name,
             'cpf' => $faker->creditCardNumber, 
             'cnpj' => $faker->creditCardNumber, 
             'limit_credit' => 0, 
             'email' => $faker->email, 
             'phone'=> '00000000000', 
             'city' => 'Arapiraca', 
             'state' => 'Alagoas', 
             'street' => 'Praça Luiz Pereira Lima', 
             'district' => 'São Luiz',  
             'cep' => $faker->randomFloat(6)
            ];

            Client::create($client);

            $client = null;
        }
    }
}
