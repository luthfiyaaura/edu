@extends('layouts.app')

@section('title', 'Kelola Siswa')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header dan tombol tambah --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-700">Daftar Siswa</h2>
        <a href="{{ route('admin.student.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Siswa
        </a>
    </div>

    {{-- Tabel daftar siswa --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-gray-800">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">NIS</th>
                    <th class="px-4 py-2 text-left">Kelas</th>
                    <th class="px-4 py-2 text-left">Jurusan</th>
                    <th class="px-4 py-2 text-left">Tahun Ajaran</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($students as $index => $student)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $student->name }}</td>
                        <td class="px-4 py-2">{{ $student->nis }}</td>
                        <td class="px-4 py-2">{{ $student->studentClass?->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $student->major?->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $student->schoolYear?->year ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.student.edit', $student->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                                <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center text-gray-500">Belum ada data siswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
