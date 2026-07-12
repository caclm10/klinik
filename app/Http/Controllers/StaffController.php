<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $staff = User::whereHas('roles', function ($query): void {
            $query->whereIn('name', ['dokter', 'perawat']);
        })
            ->when($search, function ($query, $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('sip', 'like', "%{$search}%");
                });
            })
            ->paginate(10)
            ->withQueryString();

        return view('pages.staff.index', [
            'staff' => $staff,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('pages.staff.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:L,P'],
            'phone' => ['nullable', 'string', 'max:255'],
            'sip' => ['nullable', 'string', 'max:255', 'unique:users,sip'],
            'role' => ['required', 'in:dokter,perawat'],
        ]);

        $role = $validated['role'];
        unset($validated['role']);

        $staff = User::create($validated);
        $staff->assign($role);

        return redirect()->route('staff.index');
    }

    public function show(string $id): View
    {
        return view('pages.staff.show', [
            'staff' => User::whereHas('roles', function ($query): void {
                $query->whereIn('name', ['dokter', 'perawat']);
            })->findOrFail($id),
        ]);
    }
}
