<?php

namespace Database\Factories;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reply' => $this->faker->realText(255),
            'user_id' => $this->faker->numberBetween(1, 25),
            'comment_id' => $this->faker->numberBetween(1, 25),
        ];
    }
}
