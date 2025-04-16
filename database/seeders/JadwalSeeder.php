<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Pendaftar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Jadwal Count' , 100);

        $this->command->withProgressBar($count , function() use ($count){

            Jadwal::factory($count)->create();
        });

        $this->command->info('Seeding Jadwal OK');

        // Get all Pendaftar and Kursus
        $pendaftars = Pendaftar::all();
        $kursuses = Kursus::all();

        foreach ($pendaftars as $pendaftar)
        {
            // Pick 3 random Kursus from the list
            $randomKursus = $kursuses->random(3);

            // Attach the Pendaftar to the 3 random Kursus
            foreach ($randomKursus as $kursus)
            {
                // Access the id of each individual Kursus model
                $pendaftar->kursuses()->attach($kursus->id);
            }
        }
        $this->command->newLine()->info("Attach to Kursus Pendaftar Success");

    }
}
