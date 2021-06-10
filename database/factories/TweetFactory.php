<?php

namespace Database\Factories;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'slug' => $this->faker->slug,
            'body' => $this->faker->realText(255),
            'is_fixed' => $this->faker->numberBetween(0, 1),
            'views' => $this->faker->randomNumber,
            'user_id' => $this->faker->numberBetween(1, 25),
        ];
    }
}
