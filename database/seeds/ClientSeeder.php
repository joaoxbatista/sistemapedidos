<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                  'name' => 'default',
                  'cpf' => '000000000000',
                  'phone' => '00000000',
                  'email' => 'defautl@default.com',
                  'cep' => '000000000',
                  'street' => 'default',
                  'district' => 'default',
                  'city' => 'default',
                  'state' => 'default',
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

        ];


        DB::table('clients')->insert($clients);
    }
}
