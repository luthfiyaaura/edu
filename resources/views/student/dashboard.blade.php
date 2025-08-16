<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div class="text-xl font-bold text-blue-600">EduMajor</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                Logout
            </button>
        </form>
    </nav>

    <!-- Content -->
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Hai, {{ $student->name ?? "Null" }} 👋</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Info Siswa -->
            <div class="bg-white p-4 rounded-xl shadow">
                <h2 class="text-lg font-semibold mb-2">Profil Siswa</h2>
                <ul class="text-gray-700 space-y-1">
                    <li><strong>Nama:</strong> {{ $student->name ?? "Null" }}</li>
                    <li><strong>Kelas:</strong> {{ $student->studentClass->desc ?? '-' }}</li>
                    <li><strong>Jurusan:</strong> {{ $student->studentClass->major->desc ?? '-' }}</li>
                    <li><strong>Tahun Ajaran:</strong> {{ $student->schoolYear->year ?? '-' }}</li>
                </ul>

            </div>

            <!-- Status Tes -->
            <div class="bg-white p-4 rounded-xl shadow">
                <h2 class="text-lg font-semibold mb-2">Status Tes RIASEC</h2>
                <p class="text-gray-700">
                    Kamu belum mengerjakan tes. Silakan klik tombol di bawah untuk memulai.
                </p>
                <a href="{{ route('student.test') }}"
                    class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Kerjakan Tes RIASEC
                </a>
            </div>
        </div>
    </div>

</body>

</html>
