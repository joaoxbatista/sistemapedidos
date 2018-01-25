<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\BusinessSettings;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'phone' => '082981413960',
            'password' => bcrypt('admin'),
        ]);

        BusinessSettings::create([
            'name' => 'versatil',
            'cnpj' => '000000000', 
            'city' => 'Garanhuns', 
            'state' => 'Pernanbuco', 
            'kilometer_value' => 1.5,
            'user_id' => 1,
        ]);

    }
}
