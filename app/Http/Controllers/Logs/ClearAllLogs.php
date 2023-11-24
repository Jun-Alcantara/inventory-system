<?php

namespace App\Http\Controllers\Logs;

use App\Http\Controllers\Controller;
use App\Models\Log;

class ClearAllLogs extends Controller
{
    public function __invoke()
    {
        Log::truncate();

        return back()->with('swal.fire', ['title' => 'Deleted', 'message' => 'All logs has been deleted']);
    }
}
