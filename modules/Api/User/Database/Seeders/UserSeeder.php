<?php

namespace Api\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Api\User\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//        User::query()->create([
//            "name" => "علی امینی",
//            'email' => "admin@gmail.com",
//            "password" => "123456",
//            "type" => UserTypeEnum::ADMIN->value,
//            "address" =>"amol",
//            "age" => 25
//        ]);
        User::factory()->count(25)->create();
    }
}
