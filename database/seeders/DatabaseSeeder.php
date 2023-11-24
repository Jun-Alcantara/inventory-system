<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\EquipmentManufacturerSeeder;
use Database\Seeders\EquipmentDepartmentSeeder;
use Database\Seeders\EquipmentStatusesSeeder;
use Database\Seeders\EquipmentTypesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EquipmentManufacturerSeeder::class,
            EquipmentDepartmentSeeder::class,
            EquipmentStatusesSeeder::class,
            EquipmentTypesSeeder::class,
        ]);
    }
}
