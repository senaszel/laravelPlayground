<?php

namespace Database\Factories;

use App\Enums\ApplicationStatus;
use App\Enums\UserRole;
use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        // todo ta i prawdopodobnie inne factory są do poprawy
        // random int z przedziały 1 do liczba osob o danej roli nie losuje jedynie osob o wymaganej roli
        return [
                 'patient_id'=>random_int(1,User::where('role',UserRole::PATIENT)->count()),
                 'vaccine_id'=>random_int(1,3),
                 'doctor_id'=>random_int(1,User::where('role',UserRole::DOCTOR)->count()),
                 'status'=>$this->faker->randomElement(ApplicationStatus::TYPES),
                 'date_vaccination'=>$this->faker->dateTime,
        ];
    }
}
