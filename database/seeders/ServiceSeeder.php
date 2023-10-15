<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->data();

        foreach ($data as $key => $value) {
            Service::firstOrCreate($value);
        }
    }

    public function data() {
        return [
            ['name' => 'Wedding Planning Services'],
            ['name' => 'Catering Services'],
            ['name' => 'Event Planning Services']
        ];
    }
}
