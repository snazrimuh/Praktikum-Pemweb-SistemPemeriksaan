@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Data Ibu</h5>
                        <a href="{{ route('ibu.index') }}" class="btn btn-primary btn-sm float-right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ibu.update', $ibu) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nik_ibu">NIK Ibu</label>
                                <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="{{ $ibu->nik_ibu }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $ibu->nama_ibu }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_ibu">Alamat Ibu</label>
                                <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu" value="{{ $ibu->alamat_ibu }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir_ibu">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir_ibu" name="tgl_lahir_ibu" value="{{ $ibu->tgl_lahir_ibu }}" required>
                            </div>
                            <div class="form-group">
                                <label for="foto_profil">Foto Profil</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
