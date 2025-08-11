<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'question_id', 'score'];  // Menyesuaikan dengan kolom di database

    // Relasi ke Student (bukan User)
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relasi ke Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
