<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    // Menjaga keamanan model
    protected $guarded = [];

    // Relasi ke tabel StudentClass
    public function studentClasses()
    {
        return $this->hasMany(StudentClass::class);
    }

    // Relasi ke tabel SchoolYear
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'tahun_ajaran_id');  // 'tahun_ajaran_id' adalah foreign key
    }
}
