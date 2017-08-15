<?php

use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = [

            ['name' => "Nike Sapatos", 
            'cnpj' => "1232322123123",
            'phone' => "123019230133",
            'email' => "contact@nike.com",
            'cep' => "12301294",
            'street' => "US Solevan",
            'district' => "SQ Loborian",
            'city' => "Quorion",
            'state' => "New Mexico",
            'user_id' => 1],
         
        ];

        DB::table('providers')->insert($providers);

    }
}
