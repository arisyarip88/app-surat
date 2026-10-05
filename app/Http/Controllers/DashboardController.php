<?php

namespace App\Http\Controllers;

use App\Models\KodeSurat;
use App\Models\Surat;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $tahun = now()->year;

        return view('dashboard', [
            'tahun' => $tahun,
            'totalTahunIni' => Surat::where('tahun', $tahun)->count(),
            'totalBulanIni' => Surat::whereYear('tanggal', $tahun)->whereMonth('tanggal', now()->month)->count(),
            'totalSemua' => Surat::count(),
            'totalKode' => KodeSurat::count(),
            'terbaru' => Surat::latest('id')->limit(5)->get(),
        ]);
    }
}
