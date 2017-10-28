<?php

use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<100; $i++) {
            $picture = new App\Picture();
            $picture->alt = "Alt" . $i;
            $picture->file = "picture" . strtotime($faker->time()) . ".jpg";
            $picture->save();
        }
    }
}
