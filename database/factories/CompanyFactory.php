<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
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
            'cname' => $title= $this->faker->company,
            'slug' => ($title),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'logo' => 'avatar/apple.png',
            'cover_photo' => 'cover/banner.png',
            'slogan' => 'Learn Earn And Grow',
            'description' => $this->faker->paragraph(rand(2,10))
        ];
    }
}
