<?php

namespace Database\Factories;

use App\Models\User;
use App\Enum\PendaftarStatus;
use Database\Seeders\PendaftarSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftar>
 */
class PendaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            "user_id" => User::pesertas()->inRandomOrder()->value('id'),
            "phone" => $this->faker->phoneNumber(),
            "institute" => 'institute',
            "pekerjaan" => 'pekerjaan',
            "jabatan" => 'jabatan',
            "status" => $this->faker->randomElement(PendaftarStatus::values()),
        ];
    }
}
