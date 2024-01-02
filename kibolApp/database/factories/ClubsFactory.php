<?php

namespace Database\Factories;

use App\Models\Clubs;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubsFactory extends Factory
{
    protected $model = Clubs::class;

    public function definition()
    {
        return [
            'team' => $this->faker->word,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'address' => $this->faker->address,
            'url_logo' => $this->faker->imageUrl(),
            'url' => $this->faker->url,
        ];
    }
}
