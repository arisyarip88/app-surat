@extends('layouts.app')
@section('title', 'Setting Nomor Terakhir')
@section('content')
@php $input = 'rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400'; @endphp
@if ($errors->any())
    <div class="mb-4 rounded bg-red-100 border border-red-300 text-red-800 px-4 py-3">
        <ul class="list-disc pl-5">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif
<h1 class="text-xl font-semibold mb-2">Setting Nomor Terakhir</h1>
<p class="text-sm text-slate-500 mb-4">Atur nomor terakhir yang sudah dipakai untuk semua kode (satu urutan per tahun). Nomor surat berikutnya = nomor terakhir + 1.</p>
<form method="POST" action="{{ route('setting.store') }}" class="mb-6 flex flex-wrap gap-2 bg-white p-4 rounded shadow">
    @csrf
    <input type="number" name="tahun" value="{{ old('tahun', now()->year) }}" class="{{ $input }} w-28" required>
    <input type="number" name="nomor_terakhir" value="{{ old('nomor_terakhir') }}" min="0" placeholder="Nomor terakhir" class="{{ $input }} w-40" required>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Simpan</button>
</form>
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 text-slate-600 uppercase text-xs"><tr><th class="px-4 py-3">Tahun</th><th class="px-4 py-3">Nomor Terakhir</th><th class="px-4 py-3">Berikutnya</th><th class="px-4 py-3 text-right">Aksi</th></tr></thead>
        <tbody class="divide-y">
        @forelse ($settings as $s)
            <tr>
                <td class="px-4 py-3">{{ $s->tahun }}</td>
                <td class="px-4 py-3">{{ $s->nomor_terakhir }}</td>
                <td class="px-4 py-3 font-mono">{{ sprintf('%03d', $s->nomor_terakhir + 1) }}</td>
                <td class="px-4 py-3 text-right">
                    <form method="POST" action="{{ route('setting.destroy', $s) }}" onsubmit="return confirm('Hapus setting ini?')">@csrf @method('DELETE')<button class="text-red-600 hover:underline">Hapus</button></form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada setting.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection

