<?php

namespace Database\Factories;

use App\Models\Kursus;
use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pendaftar_id' => Pendaftar::inRandomOrder()->value('id'),
            'kursus_id' => Kursus::inRandomOrder()->value('id'),
            'start_datetime' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_datetime' => $this->faker->dateTimeBetween('+1 hour', '+2 month'),
            'location' => $this->faker->city(),
            'quota' => $this->faker->numberBetween(1, 30),
        ];
    }
}
