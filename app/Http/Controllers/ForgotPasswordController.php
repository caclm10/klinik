<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        Password::sendResetLink($validated);

        return back()->with(
            'status',
            'Link reset password akan dikirim ke email Anda. Silahkan cek email Anda.'
        );
    }
}
