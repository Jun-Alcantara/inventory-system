<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShowEditUserForm extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, Request $request)
    {
        return view('users.edit', compact('user'));
    }
}
