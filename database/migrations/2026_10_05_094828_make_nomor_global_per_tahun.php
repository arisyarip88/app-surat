<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('setting_nomors')->truncate();

        Schema::table('setting_nomors', function (Blueprint $table) {
            $table->dropUnique(['kode', 'tahun']);
            $table->dropColumn('kode');
            $table->unique('tahun');
        });

        Schema::table('surats', function (Blueprint $table) {
            $table->dropUnique(['kode', 'tahun', 'urutan']);
            $table->unique(['tahun', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->dropUnique(['tahun', 'urutan']);
            $table->unique(['kode', 'tahun', 'urutan']);
        });

        Schema::table('setting_nomors', function (Blueprint $table) {
            $table->dropUnique(['tahun']);
            $table->string('kode', 20)->default('');
            $table->unique(['kode', 'tahun']);
        });
    }
};
