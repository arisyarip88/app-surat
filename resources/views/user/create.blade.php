@extends('layouts.app')
@section('title', 'Tambah User')
@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-xl"><form method="POST" action="{{ route('user.store') }}">@csrf @include('user._form')</form></div>
@endsection
