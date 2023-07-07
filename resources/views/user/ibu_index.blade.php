@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Ibu</h5>
                        <br>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto Profil</th>
                                    <th>NIK</th>
                                    <th>Nama Ibu</th>
                                    <th>Alamat Ibu</th>
                                    <th>Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ibu as $data)
                                    <tr>
                                        <td>
                                            @if ($data->foto_profil)
                                                <img src="{{ asset('storage/foto_profil/' . $data->foto_profil) }}" alt="Foto Profil" width="50" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('storage/foto_profil/default.jpg') }}" alt="Tanpa Foto Profil" width="50" class="rounded-circle">
                                            @endif
                                        </td>
                                        <td>{{ $data->nik_ibu }}</td>
                                        <td>{{ $data->nama_ibu }}</td>
                                        <td>{{ $data->alamat_ibu }}</td>
                                        <td>{{ $data->tgl_lahir_ibu }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
