<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPersonalsForEachUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $randomSex = $faker->randomElement(['male', 'female']);

        $usersIds = DB::table('users')->get('id')->all();
        foreach ($usersIds as $userId) {
            $test = DB::table('personals')->where('user_id', $userId->id)->exists();
            if (!$test) {
                DB::table('personals')->insert([
                        'user_id' => $userId->id,
                        'firstname' => $faker->firstName($randomSex),
                        'lastname' => $faker->lastName($randomSex),
                        'adress' => $faker->address,
                        'age' => $faker->randomNumber(2),
                        'sex' => $randomSex,
                        'phone' => $faker->phoneNumber,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
