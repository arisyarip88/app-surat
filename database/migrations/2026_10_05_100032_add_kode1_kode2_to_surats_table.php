<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->string('kode1', 30)->default('')->after('urutan');
            $table->string('kode2', 30)->default('')->after('kode1');
        });

        DB::table('surats')->update(['kode1' => 'D.10', 'kode2' => 'LBU']);
        $now = now();
        DB::table('kode1s')->insertOrIgnore(['kode' => 'D.10', 'keterangan' => 'Kode 1 D.10', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('kode2s')->insertOrIgnore(['kode' => 'LBU', 'keterangan' => 'Kode 2 LBU', 'created_at' => $now, 'updated_at' => $now]);
    }

    public function down(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->dropColumn(['kode1', 'kode2']);
        });
    }
};
