<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\View\View;

class PatientController extends Controller
{
    public function index(Request $request): View|AnonymousResourceCollection|JsonResponse
    {
        $search = $request->query('search');

        $patients = Patient::query()
            ->when($search, function ($query, $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%");
                });
            });

        $paginated = $request->ajax() || $request->wantsJson()
            ? $patients->paginate(5)->withQueryString()
            : $patients->paginate(10)->withQueryString();

        if ($request->ajax() || $request->wantsJson()) {
            return $this->paginatedJsonResponse($paginated, PatientResource::class);
        }

        return view('pages.patients.index', [
            'patients' => $paginated,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('pages.patients.create');
    }

    public function store(StorePatientRequest $request): RedirectResponse
    {
        $patient = Patient::create($request->validated());

        return redirect()->to("/data-pasien/{$patient->id}")->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function show(Patient $patient): View
    {
        return view('pages.patients.show', [
            'patient' => $patient->load(['schedules.practitioner']),
        ]);
    }

    public function edit(Patient $patient): View
    {
        return view('pages.patients.edit', [
            'patient' => $patient,
        ]);
    }

    public function update(UpdatePatientRequest $request, Patient $patient): RedirectResponse
    {
        $patient->update($request->validated());

        return redirect()->to("/data-pasien/{$patient->id}")->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Patient $patient): RedirectResponse
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil dihapus.');
    }

    private function paginatedJsonResponse($paginator, string $resourceClass): JsonResponse
    {
        return response()->json([
            'data' => $resourceClass::collection($paginator)->resolve(),
            'links' => $paginator->linkCollection()->toArray(),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'from' => $paginator->firstItem(),
                'to' => $paginator->lastItem(),
                'total' => $paginator->total(),
                'last_page' => $paginator->lastPage(),
            ],
        ]);
    }
}
