<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        $faker = Faker\Factory::create();
        for($i = 0; $i<10; $i++) {
            try
            {
                // Create the user
                $user = Sentry::createUser(array(
                    'first_name'         => $faker->name,
                    'last_name'          => $faker->name,
                    'email'              => $faker->unique()->email,
                    'phone'              => $faker->unique()->phoneNumber,
                    'image_url'          => $faker->imageUrl($width = 640, $height = 480),
                    'password'           => '123',
                    'activated'          => true,
                ));
                // Find the group using the group id
                $adminGroup = Sentry::findGroupById($faker->randomElement(array(1,2,3)));
                // Assign the group to the user
                $user->addGroup($adminGroup);
            }
            catch(\Exception $e){}
        }
    }
}
