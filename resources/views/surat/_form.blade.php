@php
    $input = 'w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400';
@endphp
@if ($errors->any())
    <div class="mb-4 rounded bg-red-100 border border-red-300 text-red-800 px-4 py-3">
        <ul class="list-disc pl-5">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif
<div class="space-y-4">
    @unless (isset($surat))
@foreach ([1 => ['kode1', $kodes1], 2 => ['kode2', $kodes2], 3 => ['kode', $kodes3]] as $j => [$field, $list])
        <div>
            <label class="block text-sm font-medium mb-1">Kode {{ $j }}</label>
            <select name="{{ $field }}" class="{{ $input }}" required>
                <option value="">-- Pilih kode {{ $j }} --</option>
                @foreach ($list as $k)
                    <option value="{{ $k->kode }}" @selected(old($field) === $k->kode)>{{ $k->kode }} - {{ $k->keterangan }}</option>
                @endforeach
            </select>
            @if ($list->isEmpty())
                <p class="text-sm text-amber-600 mt-1">Belum ada kode {{ $j }}. <a href="{{ route('kode.index', $j) }}" class="underline">Tambah dulu</a>.</p>
            @endif
        </div>
        @endforeach        <div>
            <label class="block text-sm font-medium mb-1">Tanggal Surat</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', now()->toDateString()) }}" class="{{ $input }}" required>
        </div>
        <p class="text-sm text-slate-500">Format nomor: <span class="font-mono">NO/KODE1/KODE2/KODE3/BULAN-ROMAWI/TAHUN</span>, dibuat otomatis.</p>
    @else
        <div>
            <label class="block text-sm font-medium mb-1">Nomor Surat</label>
            <input type="text" value="{{ $surat->nomor_surat }}" class="{{ $input }} bg-slate-100 font-mono" disabled>
        </div>
    @endunless
    <div>
        <label class="block text-sm font-medium mb-1">Perihal</label>
        <input type="text" name="perihal" value="{{ old('perihal', $surat->perihal ?? '') }}" class="{{ $input }}" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Tujuan</label>
        <input type="text" name="tujuan" value="{{ old('tujuan', $surat->tujuan ?? '') }}" class="{{ $input }}" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Keterangan</label>
        <textarea name="keterangan" rows="3" class="{{ $input }}">{{ old('keterangan', $surat->keterangan ?? '') }}</textarea>
    </div>
    <div class="flex gap-2">
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Simpan</button>
        <a href="{{ route('surat.index') }}" class="px-4 py-2 rounded border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</div>



