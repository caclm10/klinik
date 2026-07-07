<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('pages.account.index', [
            'admin' => (object) [
                'name' => 'Mufqi',
                'email' => 'mufqi@genqi.local',
                'password' => '123456',
            ],
        ]);
    }
}
