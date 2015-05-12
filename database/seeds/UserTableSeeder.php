<?php

use App\Models\User;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        $faker = Faker\Factory::create();
        for($i = 0; $i<10; $i++) {
            User::create([
                'first_name' => $faker->name,
                'email'      => $faker->unique()->email,
            ]);
        }
    }
}
