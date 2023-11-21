<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $authAttempt = Auth::attempt(['username' => $request->username, 'password' => $request->password]);

        if (! $authAttempt) {
            return back()
                ->with('login.notification', 'Incorrect credentials')
                ->withInput();
        }

        return redirect()->route('dashboard.index');
    }
}
