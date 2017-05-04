<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Company_detail;

class CompanyDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i<10; $i++){
            Company_detail::create([
                'address' =>$faker->name,
                'desc' => $faker->text,
                'rating' => (rand(1, 10)/2),
                'company_id' => $i+1
            ]);
        }
    }
}
