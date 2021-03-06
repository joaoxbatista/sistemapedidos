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
        $this->call(UserSeeder::class);
        $this->call(ProviderSeeder::class);
//        $this->call(ProductSeeder::class);
//        $this->call(SallerSeeder::class);
    }
}
