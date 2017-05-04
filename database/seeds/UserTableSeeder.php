<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i<20; $i++){
            if($i<10){
                $group_id = 2;
            }elseif($i < 20){
                $group_id = 1;
            }else{
                $group_id = 3;
            }
            User::create([
                'name' =>$faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'city' => $faker->name,
                'phone' => $faker->phoneNumber,
                'group_id' => $group_id
            ]);
        }
    }
}
