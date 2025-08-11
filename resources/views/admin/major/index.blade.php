@extends('layouts.app')

@section('title', 'Kelola Jurusan')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">Daftar Jurusan</h2>
        <a href="{{ route('admin.majors.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           + Tambah Jurusan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Kode</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Tahun Ajaran</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($majors as $index => $major)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $major->code }}</td>
                    <td class="px-4 py-2">{{ $major->desc }}</td>
                    <td class="px-4 py-2">{{ $major->schoolYear ? $major->schoolYear->year : 'N/A' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.majors.edit', $major->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                        <form action="{{ route('admin.majors.destroy', $major->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination Links --}}
    <div class="mt-4">
        {{ $majors->links() }}  <!-- Menampilkan link pagination -->
    </div>
</div>
@endsection
