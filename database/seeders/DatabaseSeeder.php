<?php

namespace Database\Seeders;

use Api\User\Database\Seeders\UserSeeder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     $this->call([
        UserSeeder::class,
     ]);
    }
}
