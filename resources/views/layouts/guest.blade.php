<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - EduMajor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-lg">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16 w-16">
        </div>
        {{ $slot }}
    </div>
</body>
</html>
