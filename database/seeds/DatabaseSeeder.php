<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CompanyDetailsTableSeeder::class);
        $this->call(CatsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);        
        $this->call(SettingTableSeeder::class);        
    }
}
