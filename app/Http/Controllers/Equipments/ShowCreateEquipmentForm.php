<?php

namespace App\Http\Controllers\Equipments;

use App\Http\Controllers\Controller;
use App\Models\EquipmentType;
use App\Models\EquipmentDepartment;

class ShowCreateEquipmentForm extends Controller
{
    public function __invoke()
    {
        $types = EquipmentType::all();
        $departments = EquipmentDepartment::all();

        return view('equipments.create', compact('types', 'departments'));
    }
}
