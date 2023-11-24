<?php

namespace App\Http\Controllers\Equipments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipments\CreateEquipmentRequest;

use App\Models\Equipment;

class SaveEquipmentDetails extends Controller
{
    public function __invoke(CreateEquipmentRequest $request)
    {   
        $e = Equipment::create([
            'asset_number' => $request->asset_number,
            'serial_number' => $request->serial_number,
            'equipment_type_id' => $request->type,
            'manufacturer' => $request->manufacturer,
            'year_model' => $request->year_model,
            'description' => $request->description,
            'equipment_department_id' => $request->department,
            'equipment_status_id' => 1,
            'created_by' => auth()->user()->id
        ]);

        $this->log('Created new equipment with asset number ' . $e->asset_number, 'Equipments');

        return redirect()->route('equipments.index')
            ->with('swal.fire', [
                'title' => 'Success',
                'message' => 'New equipment created'
            ]);
    }
}
