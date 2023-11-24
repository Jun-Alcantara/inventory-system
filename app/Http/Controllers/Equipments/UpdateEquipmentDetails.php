<?php

namespace App\Http\Controllers\Equipments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipments\UpdateEquipmentRequest;
use App\Models\Equipment;

class UpdateEquipmentDetails extends Controller
{
    public function __invoke(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update([
            'serial_number' => $request->serial_number,
            'equipment_type_id' => $request->type,
            'manufacturer' => $request->manufacturer,
            'year_model' => $request->year_model,
            'equipment_department_id' => $request->department,
            'equipment_status_id' => $request->status,
            'description' => $request->description
        ]);

        $this->log('Edited equipment ' . $equipment->asset_number, 'Equipments');

        return redirect()->route('equipments.index')
            ->with('swal.fire', ['title' => 'Success', 'message' => 'An equipment details has been updated']);
    }
}
