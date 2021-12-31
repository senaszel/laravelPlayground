<?php

namespace Database\Seeders;

use App\Models\Personal;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Personal::factory(10)->create();

        $this->call([
            OneOfEachRoleSeeder::class,
            VaccineSeeder::class,
            ApplicationSeeder::class,
        ]);
    }
}
