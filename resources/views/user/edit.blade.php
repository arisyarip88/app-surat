@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-xl"><form method="POST" action="{{ route('user.update', $user) }}">@csrf @method('PUT') @include('user._form')</form></div>
@endsection
