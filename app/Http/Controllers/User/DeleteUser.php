<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class DeleteUser extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('swal.fire', [
                'title' => 'Deleted!',
                'message' => 'A users details has beed deleted permanently'
            ]);
    }
}
