{{-- @extends('layouts.app')

@section('title', 'Daftar Soal')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-700"> </h2>
        <!-- Tombol Tambah Soal -->
        <div>
            <a href="{{ route('admin.questions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Soal</a>
            <!-- Tombol Impor Excel -->
            <a href="{{ route('admin.questions.import') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 ml-2">Impor Soal (Excel)</a>
        </div>
    </div>

    <!-- Tabel Daftar Soal -->
    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-gray-800">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Soal</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($questions as $index => $question)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $question->question_text }}</td>
                    <td class="px-4 py-2">{{ $question->score }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.questions.edit', $question->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Kelola Soal')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-700">Daftar Soal</h2>
        <!-- Tombol Tambah Soal -->
        <div>
            <a href="{{ route('admin.questions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Soal</a>
        </div>
    </div>

    <!-- Tabel Daftar Soal -->
    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-gray-800">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Soal</th>
                    <th class="px-4 py-2 text-left">Tipe</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($questions as $index => $question)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $question->question }}</td>
                    <td class="px-4 py-2">{{ ucfirst($question->type) }}</td>
                    <td class="px-4 py-2">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.questions.edit', $question->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                        
                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
