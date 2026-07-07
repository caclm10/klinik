<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CashierTransactionController extends Controller
{
    public function index(): View
    {
        return view('kasir');
    }
}
