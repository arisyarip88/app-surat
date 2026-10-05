<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nomor_surat', 'kode1', 'kode2', 'kode', 'tahun', 'urutan', 'tanggal', 'perihal', 'tujuan', 'keterangan'])]
class Surat extends Model
{
    protected function casts(): array
    {
        return ['tanggal' => 'date'];
    }

    // Format: urut/kode1/kode2/kode3/bulan romawi/tahun (kode3 disimpan di kolom "kode")
    public static function generateNomor(string $kode1, string $kode2, string $kode3, \DateTimeInterface $tanggal): array
    {
        $tahun = (int) $tanggal->format('Y');
        $terakhir = (int) static::where('tahun', $tahun)->max('urutan');
        $setting = (int) SettingNomor::where('tahun', $tahun)->value('nomor_terakhir');
        $urutan = max($terakhir, $setting) + 1;
        $romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $bulan = $romawi[(int) $tanggal->format('n')];

        return [
            'urutan' => $urutan,
            'tahun' => $tahun,
            'nomor_surat' => sprintf('%03d/%s/%s/%s/%s/%d', $urutan, $kode1, $kode2, $kode3, $bulan, $tahun),
        ];
    }
}
