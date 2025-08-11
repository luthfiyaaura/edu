<ul class="p-4 space-y-2 text-sm">
    <li>
        <a href="{{ route('teacher.dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->routeIs('teacher.dashboard') ? 'bg-blue-200 font-bold' : '' }}">
            Dashboard
        </a>
    </li>


    <li>
        <a href="{{ route('teacher.test.index') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('teacher/test-results') ? 'bg-blue-200 font-bold' : '' }}">
    Hasil Tes
</a>

   
</ul>
