<?php

namespace Database\Factories;

use App\Models\Chirp;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'chirp_id' => Chirp::factory(),
            'user_id' => User::factory(),
            'body' => $this->faker->text()
        ];
    }
}
