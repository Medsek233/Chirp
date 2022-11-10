<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Chirp;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $user;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()->create();
        Chirp::factory()->create();
    }
}
