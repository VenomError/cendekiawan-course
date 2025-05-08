<?php

namespace Database\Seeders;

use App\Models\Kursus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Jumlah Seeder Kursus');
        $this->command->withProgressBar($count, function () use ($count) {
            Kursus::factory($count)->create();
        });
    }
}
