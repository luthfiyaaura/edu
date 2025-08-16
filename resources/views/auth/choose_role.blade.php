<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilih Role | EduMajor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-silhouette {
            background-image: url('{{ asset('smk.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="min-h-screen flex bg-gray-100 text-gray-800">

    <!-- Sidebar Kiri -->
    <div class="w-1/2 bg-blue-600 text-white p-10 flex flex-col justify-center">
        <div class="max-w-md mx-auto text-center">
            <img src="{{ asset('logo.png') }}" class="h-24 mx-auto mb-6" alt="Logo Sekolah">
            <h1 class="text-4xl font-bold mb-2">EduMajor</h1>
            <p class="text-lg mb-4">Sistem Pendukung Keputusan Rekomendasi Program Studi</p>
            <p class="text-sm mb-4">SMKN 14 JAKARTA</p>
            {{-- <div class="mt-6 text-sm text-blue-100">
                Aplikasi ini membantu siswa dalam memilih jurusan/program studi yang sesuai berdasarkan hasil tes minat dan bakat menggunakan metode SMART dan RIASEC.
            </div> --}}
        </div>
    </div>

    <!-- Panel Pilih Role dengan Siluet Gedung -->
    <div class="w-1/2 relative flex items-center justify-center p-10 bg-silhouette">
        <div class="absolute inset-0 bg-white bg-opacity-70"></div> {{-- Semi transparan overlay --}}
        <div class="relative z-10 max-w-md w-full">
            <h2 class="text-2xl font-semibold mb-8 text-center text-gray-800">Login Sebagai</h2>
            <div class="space-y-4">
                <a href="{{ route('admin.login')}}" class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg shadow text-center">
                    👤 Admin
                </a>
                <a href="{{ route('teacher.login') }}" class="block w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg shadow text-center">
                    👨‍🏫 Guru
                </a>
                <a href="{{ route('student.login') }}" class="block w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-lg shadow text-center">
                    🎓 Siswa
                </a>
            </div>
        </div>
    </div>

</body>
</html>
