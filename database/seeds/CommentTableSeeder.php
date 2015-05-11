<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CommentTableSeeder extends Seeder
{
    public function run()
    {
        Comment::truncate();
        $faker = Faker\Factory::create();
        $userIds = User::lists('id');
        $postIds = Post::lists('id');
        for($i = 0; $i<10; $i++){
            Comment::create([
                'desc'        => $faker->sentence,
                'user_id'   => $faker->randomElement($userIds),
                'post_id'     => $faker->randomElement($postIds),
                'status'      => $faker->randomElement(array(0,1)),
            ]);
        }
    }
}
