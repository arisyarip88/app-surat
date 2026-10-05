<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->string('kode', 20);
            $table->unsignedSmallInteger('tahun');
            $table->unsignedInteger('urutan');
            $table->date('tanggal');
            $table->string('perihal');
            $table->string('tujuan');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->unique(['kode', 'tahun', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
