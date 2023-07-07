@extends('layouts.app')

@section('content')
@if (Gate::allows('isAdmin'))
<div class="container">
  <div class="row">
    <div class="align-self-center">
      <h1>Welcome, Admin {{ auth()->user()->name }}</h1>
        <br>
      <h3 class="display-5"><b>Sistem Pemeriksaan Ibu Hamil</b></h3>
    </div>
  </div>
</div>
@else
    <p>You are not authorized to access this page.</p>
@endif
@endsection
