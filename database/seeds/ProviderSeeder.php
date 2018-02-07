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
        for($i = 0; $i < 40; $i++)
        {
            $providers = [

            ['name' => "Empresa {$i}", 
            'cnpj' => "000000000000{$i}",
            'phone' => "123019230133",
            'email' => "empresa@empresa{$i}.com",
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
}
