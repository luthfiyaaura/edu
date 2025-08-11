<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Menyimpan soal
    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string',
        ]);

        // Menyimpan soal ke dalam tabel
        Question::create([
            'question_text' => $request->question_text,
        ]);

        return redirect()->back()->with('success', 'Soal berhasil ditambahkan!');
    }

    // Menampilkan daftar soal
    public function index()
    {
        $questions = Question::all(); // Mengambil semua soal dari database
        return view('admin.questions.index', compact('questions'));
    }
}
