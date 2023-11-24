<?php

namespace App\Http\Controllers\Equipments;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Log;

class DeleteEquipment extends Controller
{
    public function __invoke(Equipment $equipment)
    {
        $equipment->delete();

        $this->log('Deleted equipment '. $equipment->asset_number, 'Equipments');

        return redirect()->route('equipments.index')
            ->with('swal.fire', ['title' => 'Deleted', 'message' => 'An equipment has been deleted']);
    }
}
