<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setting_nomors', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20);
            $table->unsignedSmallInteger('tahun');
            $table->unsignedInteger('nomor_terakhir')->default(0);
            $table->timestamps();

            $table->unique(['kode', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setting_nomors');
    }
};
