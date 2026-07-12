<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $staff = User::with('roles')
            ->whereHas('roles', function ($query): void {
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

    public function store(StoreStaffRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $role = $validated['role'];
        unset($validated['role']);

        $staff = User::create($validated);
        $staff->assign($role);

        return redirect()->to("/staff/{$staff->id}")->with('success', ucfirst($role).' berhasil ditambahkan.');
    }

    public function show(User $staff): View
    {
        return view('pages.staff.show', [
            'staff' => User::whereHas('roles', function ($query): void {
                $query->whereIn('name', ['dokter', 'perawat']);
            })->findOrFail($staff->id),
        ]);
    }
}
