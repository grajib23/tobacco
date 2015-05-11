<?php

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        News::truncate();
        $faker = Faker\Factory::create();
        $authorIds = User::lists('id');
        for($i = 0; $i<10; $i++){
            News::create([
                'title'      => $faker->word,
                'desc'       => $faker->sentence,
                'image_url'  => $faker->imageUrl($width = 640, $height = 480),
                'share_url'  => $faker->url,
                'status'     => $faker->randomElement(array(0,1)),
                'author_id'   => $faker->randomElement($authorIds),
            ]);
        }
    }
}
