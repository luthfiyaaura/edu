<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (request()->is('admin/login')) {
            return view('auth.admin-login');
        }
        if (request()->is('teacher/login')) {
            return view('auth.teacher-login');
        }
        if (request()->is('student/login')) {
            return view('auth.student-login');
        }
        return view('auth.admin-login');
    }


    public function login(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'person_id' => 'required',  // Ganti 'nama' menjadi 'person_id'
            'password' => 'required',
        ]);

        $person_id = $request->person_id;
        $password = $request->password;

        $user = User::where('person_id', $person_id)->first();


        if ($user && Hash::check($password, $user->password)) {
            Auth::guard('web')->login($user);
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'teacher' => redirect()->route('teacher.dashboard'),
                'student' => redirect()->route('student.dashboard'),
                default => abort(403),
            };
        }

        return back()->withErrors(['person_id' => 'Data salah / Tidak ditemukan']); // Ganti 'nama' menjadi 'person_id'
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login-role');
    }
}
