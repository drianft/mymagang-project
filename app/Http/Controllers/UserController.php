<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->input('status');
        $user->save();

        return redirect()->back()->with('success', 'User status updated.');
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->roles = $request->input('roles');
        $user->save();

        return redirect()->back()->with('success', 'User role updated.');
    }

}
