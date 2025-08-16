<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    protected $guarded = [];  // Menandakan bahwa kolom apapun bisa diisi massal
    protected $table = 'test_results'; // Sesuaikan dengan nama tabel di database Anda

    // Relasi dengan Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id'); 
    }

    // Relasi ke UserAnswer (jawaban siswa)
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    // Relasi ke Teacher (Jika diperlukan untuk melihat siapa guru yang memberikan tes)
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');  // Pastikan kolom 'teacher_id' ada di tabel 'test_results'
    }
}
