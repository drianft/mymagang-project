<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    /**
     * Handle the response after a successful login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = $request->user();

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }

        if ($user->role === 'applier') {
            return redirect()->intended('/dashboard');
        }

        // Default redirect
        return redirect()->intended('/dashboard');
    }
}
