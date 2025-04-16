<?php

namespace Database\Seeders;

use App\Enum\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Validator;

class PimpinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("Seeding Pimpinan START");
        $fullName = $this->command->ask('Full Name');
        $email = $this->command->ask('Email', 'pimpinan@gmail.com');
        $password = $this->command->ask('Password', 'password');

        $validate = Validator::make(
            data: [
                'full_name' => $fullName,
                'email' => $email,
                'password' => $password
            ],
            rules: [
                'full_name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required'],
            ]
        );

        if ($validate->fails())
        {
            foreach ($validate->getMessageBag()->toArray() as $errors)
            {
                foreach ($errors as $message)
                {
                    $this->command->error($message);
                }
            }

            $this->command->info('Failed to Create Admin');
            return;
        }

        $user = new User();
        $user->name = $fullName;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        $this->command->info('Create Admin Success');

        $user->assignRole(UserRole::PIMPINAN);
        $this->command->info('Assign Role Success');
    }
}
