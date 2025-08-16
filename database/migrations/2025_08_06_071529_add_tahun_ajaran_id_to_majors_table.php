<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('majors', function (Blueprint $table) {
        //     // Menambahkan kolom tahun_ajaran_id dengan foreign key yang mengarah ke tabel school_years
        //     $table->foreignId('tahun_ajaran_id')->constrained('school_years')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('majors', function (Blueprint $table) {
        //     // Menghapus foreign key pada kolom tahun_ajaran_id
        //     $table->dropForeign(['tahun_ajaran_id']);
        //     // Menghapus kolom tahun_ajaran_id
        //     $table->dropColumn('tahun_ajaran_id');
        // });
    }
};
