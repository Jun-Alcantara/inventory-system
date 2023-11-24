<?php

namespace App\Http\Controllers\Logs;

use App\Http\Controllers\Controller;
use App\Models\Log;

class ShowLogs extends Controller
{
    public function __invoke()
    {
        $logs = Log::all();
        return view('logs.index', compact('logs'));
    }
}
