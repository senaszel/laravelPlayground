<?php

namespace Database\Factories;

use App\Models\Personal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalFactory extends Factory
{
    protected $model = Personal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomSex = $this->faker->randomElement(['male','female']);
        return [
            'user_id'=>random_int(1,User::all()->count()),
            'firstname'=>$this->faker->firstName($randomSex),
            'lastname'=>$this->faker->lastName($randomSex),
            'adress'=>$this->faker->address,
            'age'=>$this->faker->randomNumber(2),
            'phone'=>$this->faker->phoneNumber,
            'sex'=>$randomSex
        ];
    }
}
