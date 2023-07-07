@extends('layouts.app')

@section('content')
@if (Gate::allows('isAdmin'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Data Ibu</h5>
                        <a href="{{ route('ibu.index') }}" class="btn btn-secondary btn-sm float-right mt-2">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ibu.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nik_ibu">NIK Ibu</label>
                                <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="{{ old('nik_ibu') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_ibu">Alamat Ibu</label>
                                <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu" value="{{ old('alamat_ibu') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir_ibu">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir_ibu" name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="foto_profil">Foto Profil</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn" style="color:white; background-color:#00C2C0">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<p>You are not authorized to access this page.</p>
@endif
@endsection
