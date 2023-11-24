<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EquipmentManufacturer;

class EquipmentManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manufacturers = [
            'JVT', 'RS8', 'TTMRC', 'Dyson', 'Standard', 'Corsair', 'A4tech'
        ];

        EquipmentManufacturer::truncate();

        foreach ($manufacturers as $manufacturer) {
            EquipmentManufacturer::create(['name' => $manufacturer]);
        }
    }
}
