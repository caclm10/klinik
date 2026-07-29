@extends('pdf._base')

@section('title', "Detail Pasien #{$patient->id}")

@section('content')
    <div class="header">
        <h1>Detail Pasien</h1>
        <p>GenQi Klinik</p>
    </div>

    <h2>Biodata Pasien</h2>
    <table class="meta">
        <tbody>
            <tr>
                <td>ID Pasien</td>
                <td>#{{ $patient->id }}</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>{{ $patient->name }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>{{ $patient->birth_place }}, {{ $patient->birth_date?->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $patient->gender_label }}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>{{ $patient->phone }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ $patient->address }}</td>
            </tr>
        </tbody>
    </table>

    @php
        $therapy = $patient->schedules->sortByDesc('schedule_date')->first();
    @endphp

    @if ($therapy)
        <h2>Terapi Terakhir</h2>
        <table class="meta">
            <tbody>
                <tr>
                    <td>Keluhan</td>
                    <td>{{ $therapy->complaint }}</td>
                </tr>
                <tr>
                    <td>Treatment</td>
                    <td>{{ $therapy->treatment }}</td>
                </tr>
                <tr>
                    <td>Jadwal</td>
                    <td>{{ $therapy->schedule_date?->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>{{ $therapy->start_time?->format('H:i') }} - {{ $therapy->end_time?->format('H:i') }} WIB</td>
                </tr>
                <tr>
                    <td>Perawat/Dokter</td>
                    <td>{{ $therapy->practitioner?->name }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td class="capitalize">{{ $therapy->status }}</td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
