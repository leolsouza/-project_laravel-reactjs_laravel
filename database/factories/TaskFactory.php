<?php

namespace Database\Factories;

use App\Models\TaskGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(15),
            'completed' => false,
            'task_group_id' => TaskGroup::factory()
        ];
    }
}
