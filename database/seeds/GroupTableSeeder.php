<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        Group::create(['role' => 'user']);
        Group::create(['role' => 'company']);
        Group::create(['role' => 'admin']);
   
    }
}
