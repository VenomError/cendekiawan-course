<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $count = $this->command->ask('Seeder Pendaftar Count' , 10);

        $this->command->withProgressBar($count,function() use ($count){

            Pendaftar::factory($count)->create();

        });

        $this->command->newLine()->info('Seeding Pendaftar Success');
    }
}
