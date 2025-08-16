<ul class="p-4 space-y-2 text-sm">
    <li>
        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-200 font-bold' : '' }}">
            Dashboard
        </a>
    </li>

    <li>
        <a href="{{ route('admin.student.index') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('siswa') ? 'bg-blue-200 font-bold' : '' }}">
            Kelola Siswa
        </a>
    </li>
    
    <li>
        <a href="{{ route('admin.teacher.index') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->routeIs('admin.teacher.index') ? 'bg-blue-200 font-bold' : '' }}">
            Kelola Guru
        </a>
    </li>

    <li>
        <a href="{{ route('admin.schoolyear.index') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('admin.schoolyear.index') ? 'bg-blue-200 font-bold' : '' }}">
            Kelola Tahun Ajaran
        </a>
    </li>

    <li>
        <a href="{{ route('admin.majors.index') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('admin/majors*') ? 'bg-blue-200 font-bold' : '' }}">
            Kelola Jurusan
        </a>
    </li>

    <li>
        <a href="{{ route('admin.classes.index') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('admin/classes*') ? 'bg-blue-200 font-bold' : '' }}">
            Kelola Kelas
        </a>
    </li>

    <li>
        <a href="{{ route('admin.questions.index') }}" class="block py-2 px-4 rounded hover:bg-blue-600">
            Kelola Soal
        </a>
    </li>

    <li>
        <a href="{{ route('admin.test_result.index') }}" class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('admin.test_result.index') ? 'bg-blue-200 font-bold' : '' }}">
            Hasil Tes
        </a>
    </li>
</ul>
