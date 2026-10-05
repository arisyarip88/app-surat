@extends('layouts.app')
@section('title', 'Buat Nomor Surat')
@section('content')
<div class="bg-white rounded shadow p-6 max-w-xl">
    <h1 class="text-xl font-semibold mb-4">Buat Nomor Surat</h1>
    <form method="POST" action="{{ route('surat.store') }}">@csrf @include('surat._form')</form>
</div>
@endsection
