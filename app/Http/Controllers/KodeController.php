<?php

namespace App\Http\Controllers;

use App\Models\Kode1;
use App\Models\Kode2;
use App\Models\KodeSurat;
use App\Models\Surat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class KodeController extends Controller
{
    private const MAP = [
        1 => [Kode1::class, 'kode1s', 'kode1'],
        2 => [Kode2::class, 'kode2s', 'kode2'],
        3 => [KodeSurat::class, 'kode_surats', 'kode'],
    ];

    public function index(int $jenis): View
    {
        [$model] = self::MAP[$jenis];

        return view('kode.index', ['jenis' => $jenis, 'kodes' => $model::orderBy('kode')->get()]);
    }

    public function store(Request $request, int $jenis): RedirectResponse
    {
        [$model, $table] = self::MAP[$jenis];
        $data = $request->validate([
            'kode' => ['required', 'max:30', 'regex:/^[A-Za-z0-9.\-]+$/', Rule::unique($table, 'kode')],
            'keterangan' => ['required', 'max:255'],
        ]);
        $data['kode'] = strtoupper($data['kode']);
        if ($model::where('kode', $data['kode'])->exists()) {
            return back()->withInput()->withErrors(['kode' => 'Kode sudah ada.']);
        }
        $model::create($data);

        return back()->with('success', 'Kode berhasil ditambahkan.');
    }

    public function update(Request $request, int $jenis, int $id): RedirectResponse
    {
        [$model] = self::MAP[$jenis];
        $model::findOrFail($id)->update($request->validate(['keterangan' => ['required', 'max:255']]));

        return back()->with('success', 'Keterangan berhasil diperbarui.');
    }

    public function destroy(int $jenis, int $id): RedirectResponse
    {
        [$model, , $kolom] = self::MAP[$jenis];
        $kode = $model::findOrFail($id);
        if (Surat::where($kolom, $kode->kode)->exists()) {
            return back()->withErrors(['kode' => 'Kode masih dipakai oleh surat, tidak bisa dihapus.']);
        }
        $kode->delete();

        return back()->with('success', 'Kode berhasil dihapus.');
    }
}
