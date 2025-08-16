<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $guarded = [];

    /**
     * Relasi ke Jurusan
     */
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    /**
     * Relasi ke Tahun Ajaran
     */
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }

    /**
     * Relasi ke Siswa
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'student_class_id');
    }
}
