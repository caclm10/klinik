@extends('pdf._base')

@section('title', "Detail Dokter/Perawat #{$staff->id}")

@section('content')
    <div class="header">
        <h1>Detail Dokter/Perawat</h1>
        <p>GenQi Klinik</p>
    </div>

    <h2>Informasi</h2>
    <table class="meta">
        <tbody>
            <tr>
                <td>Nama Lengkap</td>
                <td>{{ $staff->name }}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>{{ $staff->birth_place }}</td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td>{{ $staff->birth_date?->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $staff->gender->label() }}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>{{ $staff->phone }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $staff->email }}</td>
            </tr>
            <tr>
                <td>Nomor SIP</td>
                <td>{{ $staff->sip }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td class="capitalize">{{ $staff->role }}</td>
            </tr>
        </tbody>
    </table>
@endsection
