<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EquipmentType;

class EquipmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Monitor', 'CPU', 'Keyboard', 'Mouse', 'AVR', 'MAC', 'Printer', 'Projector'
        ];

        EquipmentType::truncate();

        foreach ($types as $type) {
            EquipmentType::create(['name' => $type]);
        }
    }
}
