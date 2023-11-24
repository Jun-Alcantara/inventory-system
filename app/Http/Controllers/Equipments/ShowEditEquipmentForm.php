<?php

namespace App\Http\Controllers\Equipments;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Models\EquipmentDepartment;

class ShowEditEquipmentForm extends Controller
{
    public function __invoke(Equipment $equipment)
    {
        $types = EquipmentType::get();
        $departments = EquipmentDepartment::get();
        return view('equipments.edit', compact('equipment', 'types', 'departments'));
    }
}
