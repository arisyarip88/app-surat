@extends('layouts.app')
@section('title', 'Detail Surat')
@section('content')
<div class="bg-white rounded shadow p-6 max-w-xl">
    <h1 class="text-2xl font-mono font-bold text-indigo-600 mb-4">{{ $surat->nomor_surat }}</h1>
    <dl class="space-y-3">
        <div><dt class="text-xs uppercase text-slate-500">Tanggal</dt><dd>{{ $surat->tanggal->format('d/m/Y') }}</dd></div>
        <div><dt class="text-xs uppercase text-slate-500">Perihal</dt><dd>{{ $surat->perihal }}</dd></div>
        <div><dt class="text-xs uppercase text-slate-500">Tujuan</dt><dd>{{ $surat->tujuan }}</dd></div>
        <div><dt class="text-xs uppercase text-slate-500">Keterangan</dt><dd>{{ $surat->keterangan ?: '-' }}</dd></div>
    </dl>
    <a href="{{ route('surat.index') }}" class="inline-block mt-6 text-indigo-600 hover:underline">&larr; Kembali</a>
</div>
@endsection
