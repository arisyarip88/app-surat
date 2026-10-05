<?php

namespace App\Http\Controllers;

use App\Models\SettingNomor;
use App\Models\Surat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingNomorController extends Controller
{
    public function index(): View
    {
        return view('setting.index', [
            'settings' => SettingNomor::orderByDesc('tahun')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tahun' => ['required', 'integer', 'between:2000,2100'],
            'nomor_terakhir' => ['required', 'integer', 'min:0', 'max:999999'],
        ]);

        $terpakai = (int) Surat::where('tahun', $data['tahun'])->max('urutan');
        if ($data['nomor_terakhir'] < $terpakai) {
            return back()->withInput()->withErrors(['nomor_terakhir' => "Nomor terakhir tidak boleh kurang dari nomor yang sudah dipakai ({$terpakai})."]);
        }

        SettingNomor::updateOrCreate(
            ['tahun' => $data['tahun']],
            ['nomor_terakhir' => $data['nomor_terakhir']]
        );

        return back()->with('success', 'Nomor terakhir disimpan. Nomor berikutnya: '.sprintf('%03d', $data['nomor_terakhir'] + 1));
    }

    public function destroy(SettingNomor $setting): RedirectResponse
    {
        $setting->delete();

        return back()->with('success', 'Setting dihapus.');
    }
}

