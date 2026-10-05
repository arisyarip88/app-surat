@extends('layouts.app')
@section('title', 'Kode '.$jenis)
@section('content')
@php $input = 'rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400'; @endphp
@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
        <ul class="list-disc pl-5">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif
<h1 class="text-xl font-semibold mb-4">Data Kode {{ $jenis }}</h1>
<form method="POST" action="{{ route('kode.store', $jenis) }}" class="mb-6 flex flex-wrap gap-2 bg-white p-4 rounded-xl shadow-sm">
    @csrf
    <input name="kode" value="{{ old('kode') }}" placeholder="Kode {{ $jenis }}" maxlength="30" class="{{ $input }} w-40 uppercase" required>
    <input name="keterangan" value="{{ old('keterangan') }}" placeholder="Keterangan" class="{{ $input }} flex-1" required>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Tambah</button>
</form>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 text-slate-600 uppercase text-xs"><tr><th class="px-4 py-3">Kode {{ $jenis }}</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3 text-right">Aksi</th></tr></thead>
        <tbody class="divide-y">
        @forelse ($kodes as $k)
            <tr>
                <td class="px-4 py-3 font-mono font-medium">{{ $k->kode }}</td>
                <td class="px-4 py-3">
                    <form id="u{{ $k->id }}" method="POST" action="{{ route('kode.update', [$jenis, $k->id]) }}">@csrf @method('PUT')
                        <input name="keterangan" value="{{ $k->keterangan }}" class="{{ $input }} w-full" required>
                    </form>
                </td>
                <td class="px-4 py-3 text-right whitespace-nowrap">
                    <button form="u{{ $k->id }}" class="text-amber-600 hover:underline">Simpan</button>
                    <form method="POST" action="{{ route('kode.destroy', [$jenis, $k->id]) }}" class="inline" onsubmit="return confirm('Hapus kode ini?')">
                        @csrf @method('DELETE')<button class="text-red-600 hover:underline ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3" class="px-4 py-8 text-center text-slate-500">Belum ada kode.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
