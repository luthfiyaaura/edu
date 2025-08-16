<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Excel;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Menampilkan daftar soal
    public function index()
    {
        $questions = Question::all(); // Ambil semua soal
        return view('admin.questions.index', compact('questions'));
    }

    // Menampilkan form tambah soal
    public function create()
    {
        return view('admin.questions.create');
    }

    // Menyimpan soal baru
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:realistic,investigative,artistic,social,enterprising,conventional',
        ]);

        // Simpan soal baru
        Question::create([
            'question' => $request->input('question'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil ditambahkan');
    }

    // Menampilkan form edit soal
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.edit', compact('question'));
    }

    // Menyimpan perubahan soal
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:realistic,investigative,artistic,social,enterprising,conventional',
        ]);

        // Update soal
        $question = Question::findOrFail($id);
        $question->update([
            'question' => $request->input('question'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil diperbarui');
    }

    // Menghapus soal
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil dihapus');
    }

        
}
