@extends('pdf._base')

@section('title', "Detail Jadwal #{$schedule->id}")

@section('content')
    <div class="header">
        <h1>Detail Jadwal Terapi</h1>
        <p>GenQi Klinik</p>
    </div>

    <h2>Informasi</h2>
    <table class="meta">
        <tbody>
            <tr>
                <td>Pasien</td>
                <td>{{ $schedule->patient->name }} (#{{ $schedule->patient_id }})</td>
            </tr>
            <tr>
                <td>Keluhan</td>
                <td>{{ $schedule->complaint }}</td>
            </tr>
            <tr>
                <td>Treatment</td>
                <td>{{ $schedule->treatment }}</td>
            </tr>
            <tr>
                <td>Jadwal</td>
                <td>{{ $schedule->schedule_date->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }} WIB</td>
            </tr>
            <tr>
                <td>Perawat/Dokter</td>
                <td>{{ $schedule->practitioner->name }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td class="capitalize">{{ $schedule->status }}</td>
            </tr>
        </tbody>
    </table>
@endsection
