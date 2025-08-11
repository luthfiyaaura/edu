<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTahunAjaranIdFromMajorsTable extends Migration
{
    public function up()
    {
        Schema::table('majors', function (Blueprint $table) {
            // Menghapus kolom yang sudah ada
            $table->dropColumn('tahun_ajaran_id');
        });
    }

    public function down()
    {
        Schema::table('majors', function (Blueprint $table) {
            // Menambahkan kembali kolom tahun_ajaran_id jika rollback
            $table->foreignId('tahun_ajaran_id')->constrained('school_years')->onDelete('cascade');
        });
    }
}
