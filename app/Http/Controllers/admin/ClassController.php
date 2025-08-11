<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel; // Menggunakan ClassModel
use App\Models\SchoolYear; // Menggunakan SchoolYear
use App\Models\Major; // Menggunakan Major
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // Menampilkan semua kelas
    public function index()
    {
        $classes = ClassModel::with(['schoolYear', 'major'])->get(); // Mengambil data kelas beserta tahun ajaran dan jurusan
        return view('admin.class.index', compact('classes'));
    }

    // Menampilkan form untuk menambah kelas
    public function create()
    {
        $schoolYears = SchoolYear::all(); // Mengambil data tahun ajaran
        $majors = Major::all(); // Mengambil data jurusan
        return view('admin.class.create', compact('schoolYears', 'majors'));
    }

    // Menyimpan kelas baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'school_year_id' => 'required|exists:school_years,id',
            'major_id' => 'required|exists:majors,id',
        ]);

        // Menyimpan kelas baru
        ClassModel::create([
            'name' => $request->name,
            'school_year_id' => $request->school_year_id,
            'major_id' => $request->major_id,
        ]);

        return redirect()->route('admin.classes.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kelas
    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        $schoolYears = SchoolYear::all();
        $majors = Major::all(); // Ambil semua jurusan
        return view('admin.class.edit', compact('class', 'schoolYears', 'majors'));
    }

    // Menyimpan perubahan kelas
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'school_year_id' => 'required|exists:school_years,id',
            'major_id' => 'required|exists:majors,id',
        ]);

        $class = ClassModel::findOrFail($id);
        $class->update([
            'name' => $request->name,
            'school_year_id' => $request->school_year_id,
            'major_id' => $request->major_id,
        ]);

        return redirect()->route('admin.classes.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    // Menghapus kelas
    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()->route('admin.classes.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
