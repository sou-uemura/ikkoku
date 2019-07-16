<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Question;
use Carbon\Carbon;


class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();

        $faker = Faker::create('en_US');

        for ($i = 0; $i < 10; $i++) {
            Question::create([
                'title' => $faker->title(),
                'content' => $faker->content(),
            ]);
        }
    }
}
