<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'schedule_id' => Schedule::factory(),
            'payment_method' => fake()->randomElement(['Tunai', 'Transfer', 'QRIS']),
            'amount' => fake()->numberBetween(50000, 500000),
            'paid_by' => fake()->name(),
            'note' => fake()->optional()->sentence(),
            'paid_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
