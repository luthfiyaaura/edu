<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'classes';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = ['name', 'school_year_id', 'major_id'];

    // Relasi ke tabel school_years
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }

    // Relasi ke tabel majors
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    // Relasi ke tabel StudentClass (jika ada)
    public function studentClasses()
    {
        return $this->hasMany(StudentClass::class, 'class_id');
    }
}
