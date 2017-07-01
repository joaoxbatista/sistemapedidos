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

            ['name' => "Nature", 
            'cnpj' => "123124123123",
            'phone' => "123019230123",
            'email' => "Nature@gmail.com",
            'cep' => "12301294",
            'street' => "Nature",
            'district' => "Centro",
            'city' => "Arapiraca",
            'state' => "Alagoas",
            'user_id' => 1],

            ['name' => "Limbongo", 
            'cnpj' => "1232322123123",
            'phone' => "123019230133",
            'email' => "Limbongo@gmail.com",
            'cep' => "12301294",
            'street' => "Limbongo ",
            'district' => "Centro",
            'city' => "Arapiraca",
            'state' => "Alagoas",
            'user_id' => 1],

            ['name' => "Masterico", 
            'cnpj' => "123124123123",
            'phone' => "12301912233",
            'email' => "Masterico@gmail.com",
            'cep' => "12301294",
            'street' => "Masterico",
            'district' => "Centro",
            'city' => "Arapiraca",
            'state' => "Alagoas",
            'user_id' => 1],

         
        ];

        DB::table('providers')->insert($providers);

    }
}
