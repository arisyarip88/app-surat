<?php

namespace App\Http\Controllers;

use App\Models\Kode1;
use App\Models\Kode2;
use App\Models\KodeSurat;
use App\Models\Surat;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SuratController extends Controller
{
    public function index(Request $request): View
    {
        $surats = Surat::query()
            ->when($request->q, fn ($q, $s) => $q->where(fn ($w) => $w
                ->where('nomor_surat', 'like', "%{$s}%")
                ->orWhere('perihal', 'like', "%{$s}%")
                ->orWhere('tujuan', 'like', "%{$s}%")))
            ->latest('tanggal')->latest('id')
            ->paginate(in_array((int) $request->per_page, [10, 25, 50, 100]) ? (int) $request->per_page : 10)->withQueryString();

        return view('surat.index', compact('surats'));
    }

    public function create(): View
    {
        return view('surat.create', [
            'kodes1' => Kode1::orderBy('kode')->get(),
            'kodes2' => Kode2::orderBy('kode')->get(),
            'kodes3' => KodeSurat::orderBy('kode')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'kode1' => ['required', 'exists:kode1s,kode'],
            'kode2' => ['required', 'exists:kode2s,kode'],
            'kode' => ['required', 'exists:kode_surats,kode'],
            'tanggal' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'tujuan' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
        ]);
        $tanggal = Carbon::parse($data['tanggal']);

        $surat = null;
        for ($i = 0; $i < 3 && ! $surat; $i++) {
            try {
                $surat = DB::transaction(fn () => Surat::create($data + Surat::generateNomor($data['kode1'], $data['kode2'], $data['kode'], $tanggal)));
            } catch (UniqueConstraintViolationException $e) {
                if ($i === 2) {
                    throw $e;
                }
            }
        }

        return redirect()->route('surat.index')->with('success', "Nomor surat {$surat->nomor_surat} berhasil dibuat.");
    }

    public function show(Surat $surat): View
    {
        return view('surat.show', compact('surat'));
    }

    public function edit(Surat $surat): View
    {
        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, Surat $surat): RedirectResponse
    {
        $surat->update($request->validate([
            'perihal' => ['required', 'string', 'max:255'],
            'tujuan' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
        ]));

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy(Surat $surat): RedirectResponse
    {
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }
}



