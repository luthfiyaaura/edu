<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    // Menampilkan semua jurusan dengan pagination
    public function index()
    {
        $majors = Major::paginate(10); // Mengambil data jurusan dengan pagination (10 data per halaman)
        return view('admin.major.index', compact('majors'));
    }

    // Menampilkan form untuk menambah jurusan
    public function create()
    {
        $schoolYears = SchoolYear::all(); // Mengambil data tahun ajaran
        return view('admin.major.create', compact('schoolYears'));
    }

    // Menyimpan jurusan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'code' => 'required|string|max:255|unique:majors,code',
            'desc' => 'required|string|max:255',
            'tahun_ajaran_id' => 'required|exists:school_years,id',
        ]);

        // Membuat jurusan baru
        Major::create([
            'code' => $request->code,
            'desc' => $request->desc,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit jurusan
    public function edit($id)
    {
        $major = Major::findOrFail($id); // Mengambil data jurusan berdasarkan ID
        $schoolYears = SchoolYear::all(); // Mengambil data tahun ajaran
        return view('admin.major.edit', compact('major', 'schoolYears'));
    }

    // Menyimpan perubahan jurusan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'code' => 'required|string|max:255|unique:majors,code,' . $id,
            'desc' => 'required|string|max:255',
            'tahun_ajaran_id' => 'required|exists:school_years,id',
        ]);

        $major = Major::findOrFail($id); // Menemukan jurusan berdasarkan ID
        $major->update([
            'code' => $request->code,
            'desc' => $request->desc,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    // Menghapus jurusan
    public function destroy($id)
    {
        $major = Major::findOrFail($id); // Menemukan jurusan berdasarkan ID
        $major->delete(); // Menghapus data jurusan

        // Redirect dengan pesan sukses
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
