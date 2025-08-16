<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Guru')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md flex flex-col justify-between">
        <div>
            <div class="text-center p-4 border-b">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-20 mx-auto mb-2">
                <h2 class="font-bold text-xl text-blue-600">EduMajor</h2>
            </div>

            @auth
                @php
                    $role = auth()->user()->role ?? 'student';
                @endphp
                @includeIf('partials.sidebar-' . $role)
            @endauth
        </div>

        <!-- Logout -->
        @auth
        <div class="p-4 border-t">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left py-2 px-4 text-red-600 hover:bg-red-100 rounded">Logout</button>
            </form>
        </div>
        @endauth
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow px-6 py-3 flex justify-between items-center">
            <div class="text-xl font-semibold text-blue-700">
                @yield('title', 'Dashboard Guru')
            </div>

            @hasSection('tahunAjaran')
            <div class="flex items-center gap-2">
                @yield('tahunAjaran')
            </div>
            @endif
        </nav>

        <!-- Content -->
        <main class="flex-1 px-6 py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
