<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = Answer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraphs(rand(3,7),true),
            'user_id' => User::pluck('id')->random(),
            'votes_count' => rand(0,5),
        ];
    }
}
