<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\TestResult;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function teacherDashboard()
    {
        //return view('teacher.dashboard');
    // Ambil jumlah siswa dan hasil tes
        $jumlahSiswa = Student::count();  // Ambil jumlah siswa
        $jumlahHasilTes = TestResult::count();  // Ambil jumlah hasil tes

        // Kirim data ke view
        return view('teacher.dashboard', compact('jumlahSiswa', 'jumlahHasilTes'));
    
    }
}
