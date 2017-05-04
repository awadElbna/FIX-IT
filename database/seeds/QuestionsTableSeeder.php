<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i<40; $i++){
            Question::create([
                'title' =>$faker->name,
                'desc' => $faker->text,
                'img' => $faker->name,
                'visited' => rand(1, 10000),
                'created' => \Carbon\Carbon::now(),
                'status' => 'open',
                'cat_id' => rand(1, 5),
                'user_id' => rand(11, 20)
            ]);
        }
    }
}
