<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text(20),
            'description'=>$this->faker->text,
            'content'=>$this->faker->text,
            'author'=>$this->faker->name($this->faker->randomElement(['female','male'])),
            'publisher_id'=>random_int(1,User::where('role',UserRole::ADMIN)->count()),
        ];
    }
}
