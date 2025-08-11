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
        Schema::table('students', function (Blueprint $table) {
            // Menambahkan foreign key ke tabel school_years
            $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Menghapus foreign key pada kolom school_year_id
            $table->dropForeign(['school_year_id']);
            // Menghapus kolom school_year_id
            $table->dropColumn('school_year_id');
        });
    }
};
