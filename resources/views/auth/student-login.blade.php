<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Siswa | EduMajor</title>
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
    <div class="w-1/2 bg-yellow-500 text-white p-10 flex flex-col justify-center">
        <div class="max-w-md mx-auto text-center">
            <img src="{{ asset('logo.png') }}" class="h-24 mx-auto mb-6" alt="Logo Sekolah">
            <h1 class="text-4xl font-bold mb-2">Login Siswa</h1>
        </div>
    </div>

    <!-- Panel Form Login -->
    <div class="w-1/2 relative flex items-center justify-center p-10 bg-silhouette">
        <div class="absolute inset-0 bg-white bg-opacity-70"></div> {{-- Semi transparan overlay --}}
        <div class="relative z-10 max-w-md w-full">
            <h2 class="text-2xl font-semibold mb-6 text-center">Form Login Siswa</h2>

            @if(session('error'))
                <div class="mb-4 text-red-600 text-sm text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1">Kelas</label>
                    <input type="text" name="person_id" required class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>
                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded shadow">
                    🎓 Login
                </button>
            </form>
        </div>
    </div>

</body>
</html>
