<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(Request $request): View
    {
        return view('pages.account.index', [
            'user' => $request->user(),
        ]);
    }

    public function update(UpdateAccountRequest $request)
    {
        $validated = $request->validated();

        $user = $request->user();
        $user->fill($validated);
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diperbarui.');
    }
}
