<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Http\Resources\StaffResource;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\JsonResponse;

class StaffController extends Controller
{
    public function index(Request $request): View|AnonymousResourceCollection|JsonResponse
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
            ->orderBy('name');

        if ($request->ajax() || $request->wantsJson()) {
            return StaffResource::collection($staff->paginate(5));
        }

        return view('pages.staff.index', [
            'staff' => $staff->paginate(10)->withQueryString(),
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

    public function edit(User $staff): View
    {
        return view('pages.staff.edit', [
            'staff' => User::whereHas('roles', function ($query): void {
                $query->whereIn('name', ['dokter', 'perawat']);
            })->findOrFail($staff->id),
        ]);
    }

    public function update(UpdateStaffRequest $request, User $staff): RedirectResponse
    {
        $validated = $request->validated();

        $role = $validated['role'];
        unset($validated['role']);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $staff->update($validated);

        $staff->roles()->detach();
        $staff->assign($role);

        return redirect()->to("/staff/{$staff->id}")->with('success', ucfirst($role).' berhasil diperbarui.');
    }
}
