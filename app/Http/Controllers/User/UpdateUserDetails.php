<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;

use App\Models\User;

class UpdateUserDetails extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, UpdateUserRequest $request)
    {
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->user_type;
        $user->status = $request->status;

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('swal.fire', [
                'title' => 'Updated!',
                'message' => 'User details has been updated'
            ]);
            // ->with('notification.success', 'A user has beed updated');
    }
}
