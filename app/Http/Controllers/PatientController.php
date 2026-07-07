<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PatientController extends Controller
{
    public function index(): View
    {
        $patients = [
            (object) [
                'id' => 1,
                'name' => 'Joko Saputra',
                'birth_place' => 'Surakarta',
                'birth_date' => '21/06/1961',
                'gender' => 'Laki-Laki',
                'phone' => '081311961193',
                'address' => 'Jl. Tuba II, Medan Denai',
            ],
            (object) [
                'id' => 2,
                'name' => 'Muhammad Hamzah Alfatih',
                'birth_place' => 'Kota Medan',
                'birth_date' => '15/02/1961',
                'gender' => 'Laki-Laki',
                'phone' => '08591236541',
                'address' => 'Jl. Pancasila, Medan Denai',
            ],
            (object) [
                'id' => 3,
                'name' => 'Suwarni',
                'birth_place' => 'Riau',
                'birth_date' => '14/02/1961',
                'gender' => 'Perempuan',
                'phone' => '08123456147',
                'address' => 'Jl. Setia Budi No. 45A, Tanjung Sari',
            ],
            (object) [
                'id' => 4,
                'name' => 'Teguh Baskara',
                'birth_place' => 'Jakarta',
                'birth_date' => '08/02/1961',
                'gender' => 'Laki-Laki',
                'phone' => '08123456789',
                'address' => 'Jl. Dr. Mansyur No. 78, Padang Bulan',
            ],
            (object) [
                'id' => 5,
                'name' => 'Sawiyah',
                'birth_place' => 'Semarang',
                'birth_date' => '06/02/1961',
                'gender' => 'Perempuan',
                'phone' => '08123456789',
                'address' => 'Jl. Asia No. 210, Sei Rengas II',
            ],
            (object) [
                'id' => 6,
                'name' => 'Irwan Sumandi',
                'birth_place' => 'Kota Medan',
                'birth_date' => '06/01/1961',
                'gender' => 'Laki-Laki',
                'phone' => '08123456789',
                'address' => 'Jl. HM. Joni No. 33, Teladan Barat',
            ],
            (object) [
                'id' => 7,
                'name' => 'Jayanto Nugroho',
                'birth_place' => 'Aceh',
                'birth_date' => '09/01/1961',
                'gender' => 'Laki-Laki',
                'phone' => '08123456789',
                'address' => 'Jl. Kapten Muslim No. 89, Helvetia Tengah',
            ],
            (object) [
                'id' => 8,
                'name' => 'Rahmayati',
                'birth_place' => 'Padang',
                'birth_date' => '14/01/1961',
                'gender' => 'Perempuan',
                'phone' => '08123456789',
                'address' => 'Jl. Krakatau Ujung No. 17, Pulo Brayan',
            ],
            (object) [
                'id' => 9,
                'name' => 'Megawati',
                'birth_place' => 'Jakarta',
                'birth_date' => '17/01/1961',
                'gender' => 'Perempuan',
                'phone' => '08123456789',
                'address' => 'Jl. Yos Sudarso No. 145, Glugur Kota',
            ],
            (object) [
                'id' => 10,
                'name' => 'Puan Maharani',
                'birth_place' => 'Jakarta',
                'birth_date' => '19/01/1961',
                'gender' => 'Perempuan',
                'phone' => '08123456789',
                'address' => 'Jl. Brigjen Katamso No. 67, Kampung Baru',
            ],
        ];

        return view('pages.patients.index', [
            'patients' => collect($patients),
        ]);
    }

    public function create(): View
    {
        return view('pages.patients.create');
    }

    public function edit(string $id): View
    {
        return view('pages.patients.edit', [
            'patient' => $this->patientDetail(),
        ]);
    }

    public function show(string $id): View
    {
        return view('pages.patients.show', [
            'patient' => $this->patientDetail(),
        ]);
    }

    private function patientDetail(): object
    {
        return (object) [
            'id' => 1,
            'name' => 'Joko Saputra',
            'birth_place' => 'Surakarta',
            'birth_date' => '21/06/1961',
            'gender' => 'Laki-Laki',
            'phone' => '081311961193',
            'address' => 'Jl. Tuba II, Medan Denai',

            'therapy' => (object) [
                'complaint' => 'Stroke',
                'treatment' => 'Terapi Stroke',
                'schedule_date' => '15/02/2026',
                'schedule_time' => '15.00 - 16.00 WIB',
                'practitioner' => 'dr. Yoga Darmawan',
                'status' => 'Menunggu',
            ],
        ];
    }
}
