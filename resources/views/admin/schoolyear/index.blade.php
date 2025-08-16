@extends('layouts.app')

@section('title', 'Kelola Tahun Ajaran')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-700">Daftar Tahun Ajaran</h2>
        <a href="{{ route('admin.schoolyear.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Tahun Ajaran</a>
    </div>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Daftar Tahun Ajaran -->
    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-gray-800">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Tahun Ajaran</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($schoolYears as $index => $schoolYear)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $schoolYear->year }}</td>
                    <td class="px-4 py-2">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.schoolyear.edit', $schoolYear->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('admin.schoolyear.destroy', $schoolYear->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tahun ajaran ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginasi -->
    <div class="mt-4">
        {{ $schoolYears->links() }} <!-- Menampilkan navigasi halaman -->
    </div>
</div>
@endsection
