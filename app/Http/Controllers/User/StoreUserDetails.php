<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StoreUserDetails extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'usertype' => $request->user_type,
            'status' => $request->status
        ]);

        return redirect()
            ->route('users.index')
            ->with('swal.fire', [
                'title' => 'Created!',
                'message' => 'User details has been created'
            ]);
    }
}
