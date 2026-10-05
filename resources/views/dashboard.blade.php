@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
@php
    $cards = [
        ['Surat Tahun '.$tahun, $totalTahunIni, 'bg-indigo-500'],
        ['Surat Bulan Ini', $totalBulanIni, 'bg-emerald-500'],
        ['Total Semua Surat', $totalSemua, 'bg-amber-500'],
        ['Jumlah Kode', $totalKode, 'bg-sky-500'],
    ];
@endphp
<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mb-6">
    @foreach ($cards as [$label, $val, $color])
        <div class="bg-white rounded-xl shadow-sm p-5 flex items-center gap-4">
            <div class="h-12 w-12 rounded-xl {{ $color }} text-white flex items-center justify-center text-lg font-bold">{{ $val }}</div>
            <div class="text-sm text-slate-500">{{ $label }}</div>
        </div>
    @endforeach
</div>
<div class="bg-white rounded-xl shadow-sm">
    <div class="flex items-center justify-between px-5 py-4 border-b">
        <h3 class="font-semibold">Surat Terbaru</h3>
        <a href="{{ route('surat.create') }}" class="bg-indigo-600 text-white text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-700">+ Buat Nomor</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <tbody class="divide-y">
            @forelse ($terbaru as $s)
                <tr class="hover:bg-slate-50">
                    <td class="px-5 py-3 font-mono font-medium">{{ $s->nomor_surat }}</td>
                    <td class="px-5 py-3">{{ $s->perihal }}</td>
                    <td class="px-5 py-3 text-slate-500">{{ $s->tanggal->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr><td class="px-5 py-8 text-center text-slate-500">Belum ada surat.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
