<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'company') {
            return redirect()->route('company.dashboard');
        }

        if ($user->role === 'hr') {
            return redirect()->route('hr.dashboard');
        }

        return redirect()->intended('/dashboard');
    }
}
