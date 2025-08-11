<?php

namespace App\Http\Controllers\admin;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\TestResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Student::count();
        $jumlahGuru = Teacher::count();
        $jumlahHasilTes = TestResult::count();

        return view('admin.dashboard', compact('jumlahSiswa', 'jumlahGuru', 'jumlahHasilTes'));
    }
}
