<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowLoginForm extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
 
        return view('login');
    }
}
