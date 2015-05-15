<?php

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;

class QuestionTableSeeder extends Seeder
{
    public function run()
    {
        Question::truncate();
        $faker = Faker\Factory::create();
        $authorIds = User::lists('id');
        for($i = 0; $i<10; $i++){
            Question::create([
                'desc'       => $faker->sentence,
                'type'       => $faker->word,
                'status'     => $faker->randomElement(array(0,1)),
                'author_id'   => $faker->randomElement($authorIds),
            ]);
        }
    }
}
