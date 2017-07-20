<?php

use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $seller1 = [
            'name' => $faker->name,
            'email' => 'admin@admin.com',
            'cpf' => $faker->creditCardNumber,
            'password' => bcrypt('admin'),
            'payment' => $faker->numberBetween(700, 1200),
            'sales' => $faker->numberBetween(0, 100),
            'user_id' => 1,
        ];

        DB::table('sellers')->insert($seller1);

//        for($i = 0; $i < 2; $i++)
//        {
//            $seller = [
//                'name' => $faker->name,
//                'email' => $faker->email,
//                'cpf' => $faker->creditCardNumber,
//                'password' => bcrypt('seller'),
//                'payment' => $faker->numberBetween(700, 1200),
//                'sales' => $faker->numberBetween(0, 100),
//                'user_id' => 1,
//            ];
//
//            DB::table('sellers')->insert($seller);
//        }
    }
}
