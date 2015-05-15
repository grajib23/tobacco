<?php

use Illuminate\Database\Seeder;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\Question;

class QuestionAnswerTableSeeder extends Seeder
{
    public function run()
    {
        QuestionAnswer::truncate();
        $faker       = Faker\Factory::create();
        $authorIds   = User::lists('id');
        $questionIds = Question::lists('id');

        for($i = 0; $i<10; $i++){
            QuestionAnswer::create([
                'answer'        => $faker->sentence,
                'status'        => $faker->randomElement(array(0,1)),
                'question_id'   => $faker->randomElement($questionIds),
                'author_id'     => $faker->randomElement($authorIds),
            ]);
        }
    }
}
