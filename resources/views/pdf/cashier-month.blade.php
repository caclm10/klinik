@extends('pdf._base')

@section('title', "Kasir {$monthName} {$year}")

@section('content')
    <div class="header">
        <h1>Laporan Kasir {{ $monthName }} {{ $year }}</h1>
        <p>GenQi Klinik</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Nama Pasien</th>
                <th>Treatment</th>
                <th>Perawat/Dokter</th>
                <th>Status Bayar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($schedules as $schedule)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $schedule->schedule_date->format('d/m/Y') }}</td>
                    <td class="text-center">{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}</td>
                    <td>{{ $schedule->patient->name }}</td>
                    <td>{{ $schedule->treatment }}</td>
                    <td>{{ $schedule->practitioner->name }}</td>
                    <td class="text-center">
                        <span class="badge {{ $schedule->transaction ? 'status-lunas' : 'status-belum' }}">
                            {{ $schedule->transaction ? 'Lunas' : 'Belum' }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
