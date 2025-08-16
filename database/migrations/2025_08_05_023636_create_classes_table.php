<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('school_year_id') // Menambahkan foreign key untuk tahun ajaran
                  ->constrained('school_years')
                  ->onDelete('cascade');
            $table->foreignId('major_id') // Menambahkan foreign key untuk jurusan
                  ->constrained('majors')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
