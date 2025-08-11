<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestResultController extends Controller
{
     // Admin dan Guru bisa melihat semua hasil tes
    public function index()
    {
        // Ambil semua hasil tes jika user adalah admin atau guru
         $testResults = TestResult::with('student')->get();
        return view('admin.test_results.index', compact('testResults'));
    }

    // Siswa hanya bisa melihat hasil tes dirinya sendiri
    public function show($id)
    {
        // Cek jika user adalah siswa dan hanya bisa melihat hasil tes diri sendiri
        //if (Auth::user()->role == 'student' && Auth::id() != $id) {
          //  abort(403, 'Unauthorized');
        //}

        //$testResult = TestResult::where('user_id', $id)->firstOrFail();
        //return view('student.test_result.show', compact('testResult'));
    
        $testResult = TestResult::findOrFail($id);

        return view('admin.test_results.show', compact('testResult'));
    
    }

    // app/Http/Controllers/admin/TestResultController.php
public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'result_type' => 'required|in:Tidak Setuju,Kurang Setuju,Ragu,Setuju,Sangat Setuju',
    ]);

    // Simpan data hasil tes
    TestResult::create([
        'result_type' => $request->result_type,
        'student_id' => $request->student_id, // Pastikan ada student_id jika dibutuhkan
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.test_result.index')->with('success', 'Hasil tes berhasil disimpan');
}

}
