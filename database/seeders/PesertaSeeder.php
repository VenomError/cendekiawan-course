<?php

namespace Database\Seeders;

use App\Enum\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Peserta Count' , 10);

        $this->command->withProgressBar($count , function() use ($count){

            for ($i = 0; $i < $count; $i++) {
                $user = User::factory()->create([
                    'name' => fake()->name(),
                    'email' => fake()->email(),
                    'password' => 'password',
                ]);

                $user->assignRole(UserRole::PESERTA);
            }

        });

        $this->command->newLine()->info("Seeding {$count} Peserta Success");
    }
}
