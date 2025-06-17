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

        // ✅ Cek jika mau ubah ke 'hr' dan belum 'hr' sebelumnya
        if ($newRole === 'hr' && $user->roles !== 'hr') {
            $totalHrs = User::where('roles', 'hr')->count();
            if ($totalHrs >= 3) {
                return redirect()->back()->with('error', 'Maksimal HR hanya 3 orang.');
            }
        }

        // Ubah role
        $user->roles = $newRole;
        $user->save();

        // Tambahkan ke tabel hr jika belum ada
        if ($newRole === 'hr' && !$user->hr) {
            Hr::create([
                'user_id' => $user->id,
                'company_id' => 1, // nanti bisa diisi dinamis kalau perlu
                'position' => 'Unknown',
            ]);
        }

        if ($newRole === 'company' && !$user->company) {
            Company::create([
                'user_id' => $user->id,
                'industry' => 'freelance',
                'company_description' => '',
                'joined_at' => Carbon::now(),
            ]);
        }

        return redirect()->back()->with('success', 'User role updated.');
    }
}
