<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolYearIdToClassesTable extends Migration
{
    /**
     * Menjalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            // Menambahkan kolom foreign key untuk relasi ke tabel school_years
            $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            // Menghapus kolom foreign key dan kolom itu sendiri
            $table->dropForeign(['school_year_id']);
            $table->dropColumn('school_year_id');
        });
    }
}
