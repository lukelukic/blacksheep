<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 30; $i++) {
            $product = new App\Product();
            $product->name = "Product" . $i;
            $product->description = $faker->text(100);
            $product->product_category_id = rand(11, 20);
            $product->save();
        }
    }
}
