<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | EduMajor</title>
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
<body class="min-h-screen flex text-gray-800">

    <!-- Sidebar Kiri -->
    <div class="w-1/2 bg-blue-600 text-white p-10 flex flex-col justify-center">
        <div class="max-w-md mx-auto text-center">
            <img src="{{ asset('logo.png') }}" class="h-24 mx-auto mb-6" alt="Logo Sekolah">
            <h1 class="text-3xl font-bold mb-2">Login Admin</h1>
            {{-- <p class="text-sm">Halaman login untuk admin dalam mengelola data siswa, guru, dan hasil tes rekomendasi jurusan di SMKN 14 Jakarta.</p> --}}
        </div>
    </div>

    <!-- Panel Login -->
    <div class="w-1/2 relative flex items-center justify-center p-10 bg-silhouette">
        <div class="absolute inset-0 bg-white bg-opacity-70"></div>
        <div class="relative z-10 max-w-md w-full">
            <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Masuk Sebagai Admin</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="person_id" class="block font-semibold mb-1">Nama</label>
                    <input type="text" name="person_id" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block font-semibold mb-1">Password</label>
                    <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded">
                    Login
                </button>
            </form>
        </div>
    </div>

</body>
</html>
