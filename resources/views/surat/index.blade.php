@extends('layouts.app')
@section('content')
<form method="GET" class="mb-4 flex gap-2">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nomor, perihal, tujuan..." class="flex-1 rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
    <select name="per_page" onchange="this.form.submit()" class="rounded border border-slate-300 px-2 py-2">
        @foreach ([10, 25, 50, 100] as $n)
            <option value="{{ $n }}" @selected($surats->perPage() === $n)>{{ $n }} / halaman</option>
        @endforeach
    </select>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Cari</button>
</form>
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 text-slate-600 uppercase text-xs">
            <tr><th class="px-4 py-3">Nomor Surat</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Perihal</th><th class="px-4 py-3">Tujuan</th><th class="px-4 py-3 text-right">Aksi</th></tr>
        </thead>
        <tbody class="divide-y">
        @forelse ($surats as $s)
            <tr class="hover:bg-slate-50">
                <td class="px-4 py-3 font-mono font-medium">{{ $s->nomor_surat }}</td>
                <td class="px-4 py-3">{{ $s->tanggal->format('d/m/Y') }}</td>
                <td class="px-4 py-3">{{ $s->perihal }}</td>
                <td class="px-4 py-3">{{ $s->tujuan }}</td>
                <td class="px-4 py-3 text-right whitespace-nowrap">
                    <a href="{{ route('surat.show', $s) }}" class="text-indigo-600 hover:underline">Detail</a>
                    <a href="{{ route('surat.edit', $s) }}" class="text-amber-600 hover:underline ml-2">Edit</a>
                    <form method="POST" action="{{ route('surat.destroy', $s) }}" class="inline" onsubmit="return confirm('Hapus surat ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Belum ada data.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4 flex flex-wrap items-center justify-between gap-3">
    <p class="text-sm text-slate-500">Menampilkan {{ $surats->firstItem() ?? 0 }}-{{ $surats->lastItem() ?? 0 }} dari {{ $surats->total() }} surat</p>
    <div>{{ $surats->links() }}</div>
</div>
@endsection

