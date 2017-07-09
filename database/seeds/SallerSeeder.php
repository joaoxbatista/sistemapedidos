<?php

use Illuminate\Database\Seeder;

class SallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 30; $i++)
        {
            $saller = [
                'name' => $faker->name,
                'email' => $faker->email,
                'cpf' => $faker->creditCardNumber,
                'password' => bcrypt('saller'),
                'payment' => $faker->numberBetween(700, 1200),
                'sales' => $faker->numberBetween(0, 100),
                'user_id' => 1,
            ];

            DB::table('sallers')->insert($saller);
        }
    }
}
