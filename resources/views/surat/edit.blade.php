@extends('layouts.app')
@section('title', 'Edit Surat')
@section('content')
<div class="bg-white rounded shadow p-6 max-w-xl">
    <h1 class="text-xl font-semibold mb-4">Edit Surat</h1>
    <form method="POST" action="{{ route('surat.update', $surat) }}">@csrf @method('PUT') @include('surat._form')</form>
</div>
@endsection
