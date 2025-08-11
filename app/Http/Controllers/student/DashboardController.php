<?php

namespace App\Http\Controllers\student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $student = Student::with(['studentClass.major', 'schoolYear'])
                  ->where('user_id', $user->id)
                  ->first();

        return view('student.dashboard', compact('student'));
    }
}