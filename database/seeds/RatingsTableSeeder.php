<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $total = 20;
        for($i = 0; $i<10; $i++){
            Rating::create([
                'user_id' => $total--,
                'company_id' => $i+1,
                'stars' => rand(1, 5),
                'review' => $faker->text,
                'status' => '0',
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
