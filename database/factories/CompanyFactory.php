<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->randomNumber(5, true),
            'name' => $this->faker->company(),
            'streetname' => $this->faker->streetName(),
            'housenmr' => $this->faker->randomNumber(3, true),
            'postalcode' => $this->faker->regexify('[0-9]{4}[A-Z]{2}')
        ];
    }
}
