<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tell' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'building' => mt_rand(0, 1) ? $this->faker->secondaryAddress() : null,
            'detail' => $this->faker->sentence(),
        ];
    }
}
