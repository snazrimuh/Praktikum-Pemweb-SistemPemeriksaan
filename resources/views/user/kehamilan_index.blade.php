@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Kehamilan</h5>
                <br>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Kehamilan</th>
                            <th>Nama Ibu</th>
                            <th>Tanggal Kehamilan</th>
                            <th>Pemeriksaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayatKehamilan as $riwayat)
                            <tr>
                                <td>{{ $riwayat->id_kehamilan }}</td>
                                <td>{{ optional($riwayat->ibu)->nama_ibu }}</td>
                                <td>{{ $riwayat->tgl_kehamilan }}</td>
                                <td>
                                    <a href="{{ route('riwayat-kehamilan.pemeriksaan.index', $riwayat->id_kehamilan) }}" class="btn btn-sm btn-secondary">Lihat Pemeriksaan</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
