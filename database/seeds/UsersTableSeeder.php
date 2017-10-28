<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<50; $i++) {
            $user = new App\User();
            $user->firstName = $faker->firstName;
            $user->lastName = $faker->lastName;
            $user->email = $faker->email;
            $user->phone = $faker->phoneNumber;
            $user->address = $faker->address;
            $user->save();
        }
    }
}
