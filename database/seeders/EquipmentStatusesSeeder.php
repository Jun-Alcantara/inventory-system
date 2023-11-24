<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EquipmentStatus;

class EquipmentStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Working', 
            'On-Repait',
            'Retired'
        ];

        EquipmentStatus::truncate();

        foreach ($statuses as $status) {
            EquipmentStatus::create(['name' => $status]);
        }
    }
}
