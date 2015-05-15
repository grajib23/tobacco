<?php

use Illuminate\Database\Seeder;
use App\Models\QuestionType;

class QuestionTypeTableSeeder extends Seeder
{
    public function run()
    {
        QuestionType::truncate();
        $faker = Faker\Factory::create();
        for($i = 0; $i<10; $i++){
            QuestionType::create([
                'type'         => $faker->word,
                'status'       => $faker->randomElement(array(0,1)),
            ]);
        }
    }
}
