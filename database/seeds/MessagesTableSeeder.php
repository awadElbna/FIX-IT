<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Message;

class MessagesTableSeeder extends Seeder
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
            Message::create([
                'msg' =>$faker->paragraph,
                'created' => \Carbon\Carbon::now(),
                'sender_id' => rand(1, 10),
                'receiver_id' => rand(11, 20)
            ]);
        }

    }
}
