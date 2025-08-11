<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan Authenticatable
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;  // Agar notifikasi Laravel bekerja (opsional)

    protected $table = 'teachers';  // Pastikan tabelnya sesuai
    protected $fillable = ['name', 'email', 'nip', 'password']; // Kolom yang bisa diisi
    protected $hidden = ['password', 'remember_token']; // Pastikan password dan token tidak terlihat
    protected $casts = [
        'email_verified_at' => 'datetime', // Jika menggunakan email verification
    ];

    // Relasi (Jika ada, contohnya jika ada hasil ujian untuk guru)
    // public function testResults()
    // {
    //     return $this->hasMany(TestResult::class);
    // }
}
