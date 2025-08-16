<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        // Paginate teachers for better performance if the data is large
        $teachers = Teacher::paginate(10); // Showing 10 teachers per page
        return view('admin.teacher.index', compact('teachers'));
    }

    public function create()
    {
        // Display the form to add a new teacher
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|unique:teachers,nip', // NIP must be unique
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:6',  // Optional: password field
        ], [
            'nip.unique' => 'NIP must be unique for each teacher.',
            'phone.max' => 'Phone number can be a maximum of 15 characters.',
        ]);

        // Save the teacher data
        Teacher::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),  // Optional: Hashing the password
        ]);

        // Redirect with success message
        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Retrieve the teacher's data by ID
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|unique:teachers,nip,' . $id, // NIP must be unique, except for the current record
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:6', // Optional: password field for updating
        ], [
            'nip.unique' => 'NIP must be unique for each teacher.',
            'phone.max' => 'Phone number can be a maximum of 15 characters.',
        ]);

        // Retrieve the teacher's data and update it
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'phone' => $request->phone,
            // Optional: If password is provided, hash and update it
            'password' => $request->password ? bcrypt($request->password) : $teacher->password,
        ]);

        // Redirect with success message
        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Delete the teacher based on ID
        $teacher = Teacher::findOrFail($id);

        // Delete the teacher safely
        $teacher->delete();

        // Redirect with success message
        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil dihapus');
    }
}
