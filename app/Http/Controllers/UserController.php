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

    public function updateRoles(Request $request)
    {
        $user = Auth::user();

        // Hanya admin yang boleh ubah role
        if ($user->role !== 'admin') {
            abort(403, 'Kamu tidak punya izin untuk mengubah role.');
        }

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'roles' => ['required', Rule::in(['applier', 'hr', 'company'])],
        ]);

        $targetUser = User::findOrFail($validated['user_id']);
        $targetUser->roles = $validated['roles'];
        $targetUser->save();

        return redirect()->route('admin.users.main')->with('success', 'User role updated successfully.');
    }

    public function updateRole(Request $request, $id)
    {
        logger('🔥 updateRole kepanggil untuk user ID: ' . $id);
        // dd('✅ Function updateRole berhasil terpanggil');
        $user = User::findOrFail($id);
        $newRole = $request->input('roles');

        // ✅ Cek jika mau ubah ke 'hr' dan belum 'hr' sebelumnya
        if ($newRole === 'hr' && $user->roles !== 'hr') {
            $totalHrs = User::where('roles', 'hr')->count();
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

        return redirect()->route('admin.users.main')->with('success', 'User role updated.');
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->input('status');
        $user->save();

        return redirect()->route('admin.users.main')->with('success', 'User status updated successfully.');
    }
}
