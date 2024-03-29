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
        $this->call(UserSeeder::class);
        //$this->call(CategorySeeder::class);
        $this->call(TestSeeder::class);
        // $this->call(QuestionSeeder::class);
        // $this->call(AnswerSeeder::class);
    }
}
