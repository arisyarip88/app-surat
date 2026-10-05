<?php

namespace Database\Seeders;

use App\Models\KodeSurat;
use Illuminate\Database\Seeder;

class KodeSuratSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['UM' => 'Surat Umum', 'SK' => 'Surat Keputusan', 'KEP' => 'Surat Kepegawaian', 'UND' => 'Surat Undangan', 'ST' => 'Surat Tugas'] as $kode => $ket) {
            KodeSurat::firstOrCreate(['kode' => $kode], ['keterangan' => $ket]);
        }
    }
}
