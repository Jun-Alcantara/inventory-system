<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EquipmentDepartment;

class EquipmentDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'College of Arts and Science',
            'College of Criminal Justice Education',
            'School of Education',
            'Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP)',
            'International Nursing Program',
            'College of Nursing',
            'College of Allied Medical Services', 
            'School of Computer Science',
            'Institute of Accoutancy',
            'School of Business and Administration',
            'School of Hospitality and Tourism Management',
        ];

        EquipmentDepartment::truncate();

        foreach ($departments as $department) {
            EquipmentDepartment::create(['name' => $department]);
        }
    }
}
