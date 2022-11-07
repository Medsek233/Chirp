<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChirpFactory extends Factory
{


    public function definition(): array
    {

        return [
            'user_id'=>User::factory(),
            'message'=>$this->faker->text,
        ];
    }
}