<?php

namespace Database\Factories;

use App\Models\TopicReaction;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicReactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TopicReaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'content' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            //'topic_id' => Topic::factory()
            'topic_id' => 13
        ];
    }
}
