<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        return view("pages.auth.login");
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $isValid = \Auth::attempt($validated);
        if (!$isValid) {
            return back()->withErrors([
                "email" => __("auth.failed"),
            ]);
        }

        $request->session()->regenerate();

        $user = \Auth::user();

        $intended = "/dashboard";
        if ($user->can("view-own-schedule")) {
            $intended = "/jadwal-terapi";
        }

        return redirect()->intended($intended);
    }

    public function destroy(Request $request): RedirectResponse
    {
        \Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to("/login");
    }
}
