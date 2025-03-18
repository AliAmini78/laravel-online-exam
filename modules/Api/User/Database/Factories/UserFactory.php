<?php

namespace Api\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Api\User\Enum\UserTypeEnum;
use Api\User\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "email" => $this->faker->unique()->email,
            "type" => UserTypeEnum::toArray()[array_rand( UserTypeEnum::toArray())],
            "password" => "123456",
            "address" => $this->faker->address,
            "birthday" => $this->faker->date,
            "age" => $this->faker->numberBetween( 10 , 89),
        ];
    }
}
