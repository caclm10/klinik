<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DokterPerawatController extends Controller
{
    public function index(): View
    {
        return view('pages.staff.index', [
            'staff' => collect($this->doctorStaff()),
        ]);
    }

    public function create(): View
    {
        return view('pages.staff.create');
    }

    public function show(string $id): View
    {
        return view('pages.staff.show', [
            'staff' => $this->doctorStaffMember($id),
        ]);
    }

    private function doctorStaffMember(string $id): object
    {
        return collect($this->doctorStaff())->firstWhere('id', (int) $id) ?? $this->doctorStaff()[0];
    }

    private function doctorStaff(): array
    {
        return [
            (object) [
                'id' => 1,
                'name' => 'dr. Indri Cahyani',
                'birth_place' => 'Surakarta',
                'birth_date' => '21/06/1961',
                'gender' => 'Perempuan',
                'phone' => '081311961193',
                'email' => 'tes123@gmail.com',
                'sip' => 'NR33742511013255',
                'status' => 'Dokter',
            ],
            (object) [
                'id' => 2,
                'name' => 'Sabila Nurul Putri',
                'birth_place' => 'Kota Medan',
                'birth_date' => '15/02/1961',
                'gender' => 'Laki-Laki',
                'phone' => '08591236541',
                'email' => 'tes123@gmail.com',
                'sip' => 'NR33742511013255',
                'status' => 'Perawat',
            ],
            (object) [
                'id' => 3,
                'name' => 'Usman Mudiyo',
                'birth_place' => 'Riau',
                'birth_date' => '14/02/1961',
                'gender' => 'Perempuan',
                'phone' => '08123456147',
                'email' => 'tes123@gmail.com',
                'sip' => 'NR33742511013255',
                'status' => 'Perawat',
            ],
            (object) [
                'id' => 4,
                'name' => 'dr. Yoga Darmawan',
                'birth_place' => 'Jakarta',
                'birth_date' => '08/02/1961',
                'gender' => 'Laki-Laki',
                'phone' => '08123456789',
                'email' => 'tes123@gmail.com',
                'sip' => 'NR33742511013255',
                'status' => 'Dokter',
            ],
        ];
    }
}
