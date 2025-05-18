<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enum\UserRole;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\JadwalSeeder;
use Database\Seeders\KursusSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\PesertaSeeder;
use Database\Seeders\MetadataSeeder;
use Database\Seeders\PimpinanSeeder;
use Database\Seeders\PendaftarSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = UserRole::values();

        foreach ($roles as $role)
        {
            Role::updateOrCreate([
                'name' => $role
            ]);
        }

        $this->command->info('Seeding Role Success');
        $this->command->newLine();

        $this->call(MetadataSeeder::class);

        if ($this->command->confirm('Seeding Admin ?', false))
        {
            $this->call(AdminSeeder::class);
        }
        if ($this->command->confirm('Seeding Pimpinan ?', false))
        {
            $this->call(PimpinanSeeder::class);
        }

        if ($this->command->confirm('Seeding Peserta ?', false))
        {
            $this->call(PesertaSeeder::class);
        }

        if ($this->command->confirm('Seeding Kursus ?', false))
        {
            $this->call(KursusSeeder::class);
        }

        if ($this->command->confirm('Seeding Pendaftar ?', false))
        {
            $this->call(PendaftarSeeder::class);
        }
        if ($this->command->confirm('Seeding Jadwal ?', false))
        {
            $this->call(JadwalSeeder::class);
        }



    }
}
