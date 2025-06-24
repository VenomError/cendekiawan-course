<?php
namespace Database\Seeders;

use App\Models\Metadata;
use Illuminate\Database\Seeder;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'key'   => 'metadata_phone_number',
                'value' => '62123456789',
            ],
            [
                'key'   => 'metadata_location',
                'value' => 'makassar',
            ],
            [
                'key'   => 'metadata_email',
                'value' => 'email@gmail.com',
            ],
            [
                'key'   => 'metadata_instagram',
                'value' => 'instagram.com',
            ],
            [
                'key'   => 'metadata_rekening_number',
                'value' => '1234567890',
            ],
            [
                'key'   => 'metadata_rekening_name',
                'value' => 'BCA',
            ],
        ];
        $datas = collect($datas);
        $this->command->newLine()->info("Seeding Metadata");
        $datas->each(function ($data) use ($datas) {
            Metadata::updateOrCreate($data);
            $this->command->newLine()->info("Create {$data['key']} Success" );
        });
    }
}
