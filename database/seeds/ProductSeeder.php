<?php
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    public function run() {
        $faker = Faker\Factory::create();
        $i = 0;
        for ($i; $i < 30; $i++) {
            $product = [
                'name' => $faker->word,
                'unit_price' => $faker->randomFloat(2,4,12),
                'weight' => $faker->randomFloat(2, 0, 2),
                'desc' => $faker->text(300),
                'quantity' => 100,
                'provider_id' => 1,
                'user_id' => 1,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime
            ];

            DB::table('products')->insert($product);

            $product = null;
        }
    }

}
