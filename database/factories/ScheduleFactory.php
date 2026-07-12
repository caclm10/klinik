<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'user_id' => User::factory(),
            'complaint' => fake()->randomElement([
                'Stroke',
                'Sakit Punggung',
                'Tangan Kebas',
                'Sesak Nafas',
                'Kaki Kebas',
            ]),
            'treatment' => fake()->randomElement([
                'Terapi Stroke',
                'Terapi Full Body',
                'Hydrogen Inhalation',
            ]),
            'schedule_date' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'start_time' => fake()->time('H:i'),
            'end_time' => fake()->time('H:i'),
            'status' => fake()->randomElement(['menunggu', 'selesai']),
        ];
    }
}
