<?php

namespace Database\Seeders;

use App\Enums\ApplicationStatus;
use App\Enums\UserRole;
use App\Models\Application;
use App\Models\User;
use App\Models\Vaccine;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddApplicationsForEachPatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $faker = Factory::create();
        $patients = User::where('role', UserRole::PATIENT)->get('id');
            foreach ($patients as $patient) {
                while (Application::where('patient_id', $patient->id)->count() < 10) {
                    DB::table('applications')->insert([
                        'patient_id' => $patient->id,
                        'vaccine_id' => $faker->randomElement(Vaccine::all())->id,
                        'doctor_id' => $faker->randomElement(User::where('role', UserRole::DOCTOR)->get())->id,
                        'status' => $faker->randomElement(ApplicationStatus::TYPES),
                        'date_vaccination' => $faker->dateTime,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
}
