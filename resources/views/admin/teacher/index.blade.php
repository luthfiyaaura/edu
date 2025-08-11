@extends('layouts.app')

@section('title', 'Kelola Guru')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-700">Daftar Guru</h2>
        <a href="{{ route('admin.teacher.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Guru</a>
    </div>

    @if(session('success'))
    <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-gray-800">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">NIP</th>  <!-- Added NIP column -->
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($teachers as $index => $teacher)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $teacher->name }}</td>
                    <td class="px-4 py-2">{{ $teacher->nip }}</td> <!-- Display NIP -->
                    <td class="px-4 py-2">{{ $teacher->email }}</td>
                    <td class="px-4 py-2">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus guru ini?');">
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

    <!-- Pagination -->
    <div class="mt-4">
        {{ $teachers->links() }}  <!-- Pagination links -->
    </div>

</div>
@endsection
