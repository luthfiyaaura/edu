<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EduMajor | TES RIASEC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    {{-- Header --}}
    <div class="flex justify-between items-center px-6 py-4 bg-white shadow">
        <h1 class="text-xl font-bold uppercase text-blue-600">TES RIASEC</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Logout
            </button>
        </form>
    </div>

    {{-- Konten --}}
    <main class="py-8">
        @yield('content')
    </main>

</body>
</html>
