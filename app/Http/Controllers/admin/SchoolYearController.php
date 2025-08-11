<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    // Menampilkan daftar tahun ajaran
    public function index()
    {
        $schoolYears = SchoolYear::paginate(10); // Menampilkan 10 data per halaman
        return view('admin.schoolyear.index', compact('schoolYears'));
    }

    // Menampilkan form tambah tahun ajaran
    public function create()
    {
        return view('admin.schoolyear.create');
    }

    // Menyimpan tahun ajaran baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'year' => 'required|string|max:255|unique:school_years,year',
        ]);

        // Simpan data tahun ajaran
        SchoolYear::create([
            'year' => $request->year,
        ]);

        return redirect()->route('admin.schoolyear.index')->with('success', 'Tahun Ajaran berhasil ditambahkan');
    }

    // Menampilkan form edit tahun ajaran
    public function edit($id)
    {
        $schoolYear = SchoolYear::findOrFail($id);
        return view('admin.schoolyear.edit', compact('schoolYear'));
    }

    // Mengupdate data tahun ajaran
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:255|unique:school_years,year,' . $id,
        ]);

        $schoolYear = SchoolYear::findOrFail($id);
        $schoolYear->update([
            'year' => $request->year,
        ]);

        return redirect()->route('admin.schoolyear.index')->with('success', 'Tahun Ajaran berhasil diperbarui');
    }

    // Menghapus tahun ajaran
    public function destroy($id)
    {
        $schoolYear = SchoolYear::findOrFail($id);
        $schoolYear->delete();

        return redirect()->route('admin.schoolyear.index')->with('success', 'Tahun Ajaran berhasil dihapus');
    }
}
