<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
           CategorySeeder::class
       ]);

        User::factory()->create([
            'email' => 'smaty_soluce@example.net',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'email' => 'jhon@example.net',
            'role' => 'client'
        ]);


    }

}
