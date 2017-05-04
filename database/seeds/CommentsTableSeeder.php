<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i<60; $i++){
            Comment::create([
                'comment' =>$faker->text,
                'parent_id' => 0,
                'question_id' => rand(1, 40),
                'created' => \Carbon\Carbon::now(),
                'user_id' => rand(1,20)
            ]);
        }
    }
}
