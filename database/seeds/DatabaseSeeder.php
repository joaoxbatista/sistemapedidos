<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'phone' => '082981413960',
            'password' => bcrypt('admin'),
        ]);

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


        $clients = [
            [
                  'name' => 'Mr. João Batista Gomes',
                  'cpf' => '1231315123141',
                  'phone' => '8148465471',
                  'email' => 'jbg@gmail.com',
                  'cep' => '124621221',
                  'street' => 'Centro',
                  'district' => 'Pç. Antônio Pedro de Albuquerque',
                  'city' => 'Coité do Nóia',
                  'state' => 'Alagoas',
                  'user_id' => 1
            ],

            [
                  'name' => 'Mr. Joseph Cleans',
                  'cpf' => '1231315123141',
                  'phone' => '8148465472',
                  'email' => 'jc@gmail.com',
                  'cep' => '124623200',
                  'street' => 'Centro',
                  'district' => 'Cacimbas',
                  'city' => 'Arapiraca',
                  'state' => 'Alagoas',
                  'user_id' => 1
            ],

            [
                  'name' => 'Mr. Sendorf Clauz',
                  'cpf' => '1231315123141',
                  'phone' => '8148465473',
                  'email' => 'sc@gmail.com',
                  'cep' => '124654002',
                  'street' => 'Centro',
                  'district' => '17 de Outubro',
                  'city' => 'São Sebastião',
                  'state' => 'Alagoas',
                  'user_id' => 1
            ],

            [
                  'name' => 'Sr. Galaga Marques',
                  'cpf' => '1231315123141',
                  'phone' => '8148465478',
                  'email' => 'gm@gmail.com',
                  'cep' => '124621230',
                  'street' => 'Centro',
                  'district' => 'Pç. Mariana Soares',
                  'city' => 'Taquarana',
                  'state' => 'Alagoas',
                  'user_id' => 1
            ],
        ];

      DB::table('clients')->insert($clients);
    }
}
