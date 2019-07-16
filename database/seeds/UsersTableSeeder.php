<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker::create('en_US');

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name(),
                'password' => $faker->password(),
                'email' => $faker->email(),
                'age' => $faker->numberBetween($min=0,$max=100),
                'sex' => $faker->numberBetween($min=0,$max=1),
                'comment' => $faker->paragraph(),
                'icon' => $faker->image(),
                'created_at' => Carbon::today()
            ]);
        }
    }
}
