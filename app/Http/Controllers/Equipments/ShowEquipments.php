<?php

namespace App\Http\Controllers\Equipments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Support\Facades\DB;

class ShowEquipments extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $equipments = Equipment::with(['type', 'department', 'status', 'createdBy'])->get();
        return view('equipments.list', compact('equipments'));
    }
}
