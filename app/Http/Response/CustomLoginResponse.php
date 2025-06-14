<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'company') {
            return redirect()->route('company.dashboard');
        } elseif ($user->role === 'hr') {
            return redirect()->route('hr.dashboard');
        } elseif ($user->role === 'applier') {
            return redirect()->route('applier.dashboard');
        }

        // Default fallback
        return redirect()->route('dashboard');
    }
}
