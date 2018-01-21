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
    }
}
