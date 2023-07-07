@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="align-self-center">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        <br>
      <h3 class="display-5"><b>Sistem Informasi Pemeriksaan Ibu Hamil</b></h3>
    </div>
  </div>
</div>
@endsection
