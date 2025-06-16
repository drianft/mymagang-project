<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Hr;
use App\Models\Company;
use Illuminate\Support\Carbon;

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
            'status' => ['nullable', 'string'], // Tambahkan jika kamu pakai status
        ]);

        $targetUser->role = $validated['role'];

        if (isset($validated['status'])) {
            $targetUser->status = $validated['status'];
        }

        $targetUser->save();

        // Buat entri di tabel relasi sesuai role baru
        if ($validated['role'] === 'applier') {
            $targetUser->applier()->firstOrCreate([]);
        } elseif ($validated['role'] === 'hr') {
            $targetUser->hr()->firstOrCreate([]);
        } elseif ($validated['role'] === 'company') {
            $targetUser->company()->firstOrCreate([]);
        }

        return back()->with('status', 'Role user berhasil diubah.');
    }


    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $newRole = $request->input('roles');
        $user->roles = $newRole;
        $user->save();

        // Insert ke tabel hr kalau role-nya jadi 'hr' dan belum ada
        if ($newRole === 'hr' && !$user->hr) {
            Hr::create([
                'user_id' => $user->id,
                'company_id' => 1, // default null, bisa diisi nanti kalau perlu
                'position' => 'Unknown', // atau default lain
            ]);
        }

        // Insert ke tabel company kalau role-nya jadi 'company' dan belum ada
        if ($newRole === 'company' && !$user->company) {
            Company::create([
                'user_id' => $user->id,
                'industry' => 'freelance', // pastikan enum-nya ada opsi ini
                'company_description' => '',
                'joined_at' => Carbon::now(),
            ]);
        }

        return redirect()->back()->with('success', 'User role updated.');
    }

}
