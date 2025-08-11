<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class StudentTestController extends Controller
{
    // Menampilkan soal ke-n
    // public function form(Request $request)
    // {
    //     $user = auth()->user();

    //     $sudahTes = \App\Models\TestResult::where('user_id', $user->id)->exists();

    //     if ($sudahTes) {
    //         return redirect()->route('student.result');
    //     }

    //     $semuaSoal = config('soal_riasec');

    //     if (!session()->has('urutan_soal')) {
    //         $urutan = collect($semuaSoal)->shuffle()->values()->toArray();
    //         session(['urutan_soal' => $urutan, 'riasec' => [], 'nomor' => 1]);
    //     } else {
    //         $urutan = session('urutan_soal');
    //     }

    //     $nomor = $request->get('nomor', session('nomor', 1));

    //     if ($nomor > count($urutan)) {
    //         return redirect()->route('student.result');
    //     }

    //     $soal = $urutan[$nomor - 1];

    //     return view('student.test', compact('soal', 'nomor'));
    // }
    public function form(Request $request)
    {
        $user = auth()->user();

        $sudahTes = \App\Models\TestResult::where('user_id', $user->id)->exists();

        if ($sudahTes) {
            return redirect()->route('student.result');
        }

        $questionCount = Question::count();

        // Ambil semua soal dari database, urutkan secara acak
        $semuaSoal = \App\Models\Question::all()->shuffle();

        // Mengecek apakah urutan soal sudah ada di session
        if (!session()->has('urutan_soal')) {
            // Menyimpan urutan soal acak ke session
            $urutan = $semuaSoal->values()->toArray();
            session(['urutan_soal' => $urutan, 'riasec' => [], 'nomor' => 1]);
        } else {
            $urutan = session('urutan_soal');
        }

        // Mendapatkan nomor soal saat ini
        $nomor = $request->get('nomor', session('nomor', 1));

        // Mengecek apakah nomor soal melebihi jumlah soal
        if ($nomor > count($urutan)) {
            return redirect()->route('student.result');
        }

        // Mengambil soal berdasarkan urutan nomor
        $soal = $urutan[$nomor - 1];

        return view('student.test', compact('soal', 'nomor', 'questionCount'));
    }


    // Menyimpan jawaban soal
    // public function submit(Request $request)
    // {
    //     $nomor = $request->input('nomor');
    //     $tipe = $request->input('tipe');
    //     $bobot = $request->input('bobot');
    //     $jawaban = $request->input('jawaban');

    //     $nilai = $jawaban === 'ya' ? (int)$bobot : 0;

    //     $riasec = session('riasec', []);
    //     $riasec[$tipe][] = $nilai;

    //     session(['riasec' => $riasec]);
    //     session(['nomor' => $nomor + 1]);
    //     if ($nomor >= 24) {
    //         return redirect()->route('student.result');
    //     }

    //     return redirect()->route('student.test', ['nomor' => $nomor + 1]);
    // }

    public function submit(Request $request)
    {
        $nomor = $request->input('nomor');
        $tipe = $request->input('tipe');
        $jawaban = $request->input('jawaban');

        // Menghitung skor berdasarkan jawaban
        $nilai = match ($jawaban) {
            '100' => 100,
            '75' => 75,
            '50' => 50,
            '25' => 25,
            '0' => 0,
            default => 0
        };

        // Menyimpan jawaban ke pivot table (user_question)
        $user = auth()->user();
        $question = \App\Models\Question::where('type', $tipe)->first(); // Mengambil soal yang sesuai tipe (misalnya)

        // Membuat atau mengupdate jawaban siswa di pivot table
        \App\Models\UserAnswer::updateOrCreate(
            ['user_id' => $user->id, 'question_id' => $question->id],
            ['score' => $nilai]
        );

        // Simpan jawaban di session
        $riasec = session('riasec', []);
        $riasec[$tipe][] = $nilai;
        session(['riasec' => $riasec]);

        // Perbarui nomor soal di session
        session(['nomor' => $nomor + 1]);

        // Jika sudah selesai semua soal
        if ($nomor >= Question::count()) {
            return redirect()->route('student.result');
        }

        return redirect()->route('student.test', ['nomor' => $nomor + 1]);
    }


    // public function hasil()
    // {
    //     $user = auth()->user();

    //     // Cek apakah user sudah memiliki hasil tes
    //     $existing = \App\Models\TestResult::where('user_id', $user->id)->first();

    //     if ($existing) {
    //         // Jika sudah ada, gunakan data dari DB
    //         $skorAkhir = [
    //             'realistic' => $existing->realistic,
    //             'investigative' => $existing->investigative,
    //             'artistic' => $existing->artistic,
    //             'social' => $existing->social,
    //             'enterprising' => $existing->enterprising,
    //             'conventional' => $existing->conventional,
    //         ];
    //     } else {
    //         $riasec = session()->get('riasec', []);

    //         if (empty($riasec)) {
    //             return redirect()->route('student.test')->with('error', 'Kamu belum mengerjakan tes.');
    //         }

    //         // 1. Hitung total skor RIASEC siswa
    //         $hasil = [];
    //         foreach ($riasec as $tipe => $nilaiArray) {
    //             $hasil[$tipe] = is_array($nilaiArray) ? array_sum($nilaiArray) : 0;
    //         }

    //         // 2. Normalisasi nilai
    //         $max = max($hasil);
    //         $normalisasi = [];
    //         foreach ($hasil as $tipe => $nilai) {
    //             $normalisasi[$tipe] = $max > 0 ? $nilai / $max : 0;
    //         }

    //         // 3. Bobot RIASEC (saat ini semua sama)
    //         $bobot = [
    //             'realistic' => 1,
    //             'investigative' => 1,
    //             'artistic' => 1,
    //             'social' => 1,
    //             'enterprising' => 1,
    //             'conventional' => 1,
    //         ];

    //         // 4. Hitung skor akhir per tipe RIASEC
    //         $skorAkhir = [];
    //         foreach ($normalisasi as $tipe => $nilai) {
    //             $skorAkhir[$tipe] = $nilai * $bobot[$tipe];
    //         }

    //         // Simpan ke database
    //         \App\Models\TestResult::create(array_merge($skorAkhir, [
    //             'user_id' => $user->id,
    //         ]));
    //     }

    //     // 5. Ambil tipe terkuat
    //     $tipeTerkuat = array_keys($skorAkhir, max($skorAkhir))[0];

    //     // 6. Ambil config penjelasan dan rekomendasi berdasarkan 1 tipe
    //     $penjelasan = config('riasec.penjelasan');
    //     $rekomendasi = config('riasec.rekomendasi');

    //     // 7. SMART versi lengkap: ambil semua jurusan dan hitung skor per jurusan
    //     $jurusanList = config('riasec.jurusan');
    //     $ranking = [];
    //     foreach ($jurusanList as $nama => $profil) {
    //         $skor = 0;
    //         foreach ($skorAkhir as $tipe => $nilai) {
    //             $skor += $nilai * ($profil[$tipe] ?? 0);
    //         }
    //         $ranking[] = [
    //             'nama' => $nama,
    //             'skor' => round($skor, 4),
    //         ];
    //     }
    //     usort($ranking, fn($a, $b) => $b['skor'] <=> $a['skor']);

    //     return view('student.test-result', compact(
    //         'skorAkhir',
    //         'tipeTerkuat',
    //         'penjelasan',
    //         'rekomendasi',
    //         'ranking'
    //     ));
    // }

    public function hasil()
    {
        $user = auth()->user();

        // Cek apakah user sudah memiliki hasil tes
        $existing = \App\Models\TestResult::where('user_id', $user->id)->first();

        if ($existing) {
            // Jika sudah ada, gunakan data dari DB
            $skorAkhir = [
                'realistic' => $existing->realistic,
                'investigative' => $existing->investigative,
                'artistic' => $existing->artistic,
                'social' => $existing->social,
                'enterprising' => $existing->enterprising,
                'conventional' => $existing->conventional,
            ];
        } else {
            // Ambil data dari session (jawaban siswa)
            $riasec = session()->get('riasec', []);

            if (empty($riasec)) {
                return redirect()->route('student.test')->with('error', 'Kamu belum mengerjakan tes.');
            }

            // 1. Hitung total skor RIASEC siswa
            $hasil = [];
            foreach ($riasec as $tipe => $nilaiArray) {
                $hasil[$tipe] = is_array($nilaiArray) ? array_sum($nilaiArray) : 0;
            }

            // 2. Normalisasi nilai
            $max = max($hasil);
            $normalisasi = [];
            foreach ($hasil as $tipe => $nilai) {
                $normalisasi[$tipe] = $max > 0 ? $nilai / $max : 0;
            }

            // 3. Bobot RIASEC sesuai jurnal
            $bobot = [
                'realistic' => 1,
                'investigative' => 1,
                'artistic' => 1,
                'social' => 1,
                'enterprising' => 1,
                'conventional' => 1,
            ];

            // 4. Hitung skor akhir per tipe RIASEC (normalisasi * bobot)
            $skorAkhir = [];
            foreach ($normalisasi as $tipe => $nilai) {
                $skorAkhir[$tipe] = $nilai * $bobot[$tipe];
            }

            // 5. Simpan ke database
            \App\Models\TestResult::create(array_merge($skorAkhir, [
                'user_id' => $user->id,
            ]));
        }

        // 6. Ambil tipe terkuat
        $tipeTerkuat = array_keys($skorAkhir, max($skorAkhir))[0];

        // 7. Ambil config penjelasan dan rekomendasi berdasarkan 1 tipe
        $penjelasan = config('riasec.penjelasan');
        $rekomendasi = config('riasec.rekomendasi');

        // 8. SMART versi lengkap: ambil semua jurusan dan hitung skor per jurusan
        $jurusanList = config('riasec.jurusan');
        $ranking = [];
        foreach ($jurusanList as $nama => $profil) {
            $skor = 0;
            foreach ($skorAkhir as $tipe => $nilai) {
                $skor += $nilai * ($profil[$tipe] ?? 0);
            }
            $ranking[] = [
                'nama' => $nama,
                'skor' => round($skor, 4),
            ];
        }

        // Urutkan hasil ranking dan ambil jurusan dengan skor tertinggi
        usort($ranking, fn($a, $b) => $b['skor'] <=> $a['skor']);

        // Ambil hanya satu jurusan terbaik
        $bestRecommendation = $ranking[0];

        return view('student.test-result', compact(
            'skorAkhir',
            'tipeTerkuat',
            'penjelasan',
            'rekomendasi',
            'bestRecommendation' // Hanya satu rekomendasi
        ));
    }
}
