<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestResultController extends Controller
{
    // Guru hanya bisa melihat hasil tes yang diajarkan oleh dirinya
    public function index()
    {
        $teacher = Auth::user(); // Mengambil data guru yang login

        // Mengambil hasil tes yang hanya terkait dengan guru yang login
        $testResults = TestResult::with('student')->where('teacher_id', $teacher->id)->get();

        return view('teacher.test_results.index', compact('testResults'));
    }

    // Menampilkan detail hasil tes berdasarkan ID
    public function show($id)
    {
        $testResult = TestResult::with('student')->findOrFail($id);

        // Pastikan guru hanya melihat hasil tes yang mereka ajar
        if ($testResult->teacher_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('teacher.test_results.show', compact('testResult'));
    }
}
