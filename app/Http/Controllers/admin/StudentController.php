<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SchoolYear;
use App\Models\Major;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Menampilkan daftar siswa beserta relasi tahun ajaran dan kelas
    public function index()
    {
        // Load relasi schoolYear dan studentClass (kelas)
        $students = Student::with(['schoolYear', 'studentClass'])->get();
        return view('admin.student.index', compact('students'));
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        $schoolYears = SchoolYear::all(); // semua tahun ajaran
        $majors = Major::all();           // semua jurusan (untuk dropdown jurusan)
        $classes = ClassModel::all();// kelas akan di-load via AJAX berdasarkan jurusan

        return view('admin.student.create', compact('schoolYears', 'majors', 'classes'));
    }

    // Simpan data siswa baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|unique:students,nis',
            'student_class_id' => 'required|exists:student_classes,id',
            'tahun_ajaran_id' => 'required|exists:school_years,id',
            'password' => 'required',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->nis = $request->nis;
        $student->student_class_id = $request->student_class_id;
        $student->tahun_ajaran_id = $request->tahun_ajaran_id;
        $student->password = Hash::make($request->password);  // bisa juga Hash::make($request->nis) sesuai kebutuhan
        $student->save();

        return redirect()->route('admin.student.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    // Menampilkan form edit data siswa
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $schoolYears = SchoolYear::all();
        $majors = Major::all();

        // Ambil jurusan dari kelas siswa supaya bisa load kelas sesuai jurusan
        $selectedMajorId = $student->studentClass->major_id ?? null;
        $classes = StudentClass::where('major_id', $selectedMajorId)->get();

        return view('admin.student.edit', compact('student', 'schoolYears', 'majors', 'classes', 'selectedMajorId'));
    }

    // Memperbarui data siswa
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|unique:students,nis,' . $id,
            'student_class_id' => 'required|exists:student_classes,id',
            'tahun_ajaran_id' => 'required|exists:school_years,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'student_class_id' => $request->student_class_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Siswa berhasil diperbarui');
    }

    // Menghapus siswa
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.student.index')->with('success', 'Siswa berhasil dihapus');
    }

    // AJAX: ambil jurusan berdasarkan tahun ajaran
    public function getMajors($schoolYearId)
    {
        $majors = Major::where('school_year_id', $schoolYearId)->get(['id', 'name as desc']);
        return response()->json($majors);
    }

    // AJAX: ambil kelas berdasarkan jurusan
    public function getClasses($majorId)
    {
        $classes = StudentClass::where('major_id', $majorId)->get(['id', 'name as desc']);
        return response()->json($classes);
    }
}
