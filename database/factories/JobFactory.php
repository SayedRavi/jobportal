<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = rand(1,10);
        return [
            'user_id' => $random,
            'company_id' => $random,
            'title' => $name = $this->faker->text,
            'slug' => ($name),
            'roles' => $this->faker->text,
            'description' => $this->faker->paragraph(rand(2, 10)),
            'category_id' => rand(0, 1),
            'position' => $this->faker->jobTitle,
            'status' => rand(0, 1),
            'type' => 'full time',
            'last_date' => $this->faker->dateTime,
            'address' => $this->faker->address
        ];
    }
}
