<?php

namespace Database\Seeders;

use App\Enums\ApplicationStatus;
use App\Enums\UserRole;
use App\Models\Application;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddApplicationsForEachPatients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $faker = Factory::create();
        $patient = User::where('role', UserRole::PATIENT)->get('id');
        for ($i = 1; $i <= User::where('role', UserRole::PATIENT)->count(); $i++) {
            while (Application::where('patient_id', $i)->count() < 10) {
                DB::table('applications')->insert([
                    'patient_id' => $i,
                    'vaccine_id' => random_int(1, 3),
                    'doctor_id' => random_int(1, User::where('role', UserRole::DOCTOR)->count()),
                    'status' => $faker->randomElement(ApplicationStatus::TYPES),
                    'date_vaccination' => $faker->dateTime,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
