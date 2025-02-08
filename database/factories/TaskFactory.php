<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use App\Models\Task;
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

    protected $model = Task::class;
    
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'user_id' => User::factory(),
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'is_completed' => fake()->boolean(),
            'start_at' => now(),
            'expired_at' => fake()->dateTimeBetween('now', '+1 year'),
        ];
    }
}
