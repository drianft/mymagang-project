<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function changeUserRole(Request $request, User $targetUser)
    {
        $user = Auth::user();

        // Hanya admin dan company yang boleh ubah role
        if (!in_array($user->role, ['admin', 'company'])) {
            abort(403, 'Kamu tidak punya izin untuk mengubah role.');
        }

        $validated = $request->validate([
            'role' => ['required', Rule::in(['applier', 'hr', 'company'])],
        ]);

        $targetUser->role = $validated['role'];
        $targetUser->save();

        if ($validated['role'] === 'applier') {
            $targetUser->applier()->firstOrCreate([]);
        } elseif ($validated['role'] === 'hr') {
            $targetUser->hr()->firstOrCreate([]);
        } elseif ($validated['role'] === 'company') {
            $targetUser->company()->firstOrCreate([]);
        }

        return back()->with('status', 'Role user berhasil diubah.');
    }
}
