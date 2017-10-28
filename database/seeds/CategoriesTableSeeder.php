<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i < 11; $i++) {
            $category = new App\ProductCategory();
            $category->name = "Category" . $i;
            $category->name = "Category" . $i;
            $category->save();
        }

        for($i = 1; $i<11; $i++) {
            $category = new App\ProductCategory();
            $category->name = "Subcategory" . $i;
            $category->parent_id = rand(1,10);
            $category->save();
        }

    }
}
