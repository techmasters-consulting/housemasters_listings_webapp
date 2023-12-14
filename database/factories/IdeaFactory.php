<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Idea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->numberBetween(1, 4),
            'status_id' => $this->faker->numberBetween(1, 5),
            'location_id' => $this->faker->numberBetween(1, 4),
            'title' => ucwords($this->faker->words(4, true)),
            'price' => $this->faker->numberBetween($min = 1000, $max = 999999),
            'no_of_bathrooms' => $this->faker->numberBetween(1, 10),
            'no_of_bedrooms' => $this->faker->numberBetween(1, 10),
            'photo' => $this->faker->imageUrl(640, 480, 'cats'),
            //'with_pool' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
