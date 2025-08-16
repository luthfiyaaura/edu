@extends('layouts.app')

@section('title', 'Kelola Soal')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-700">Daftar Pertanyaan</h2>
        <div class="space-x-4">
            <a href="{{ route('admin.question.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Pertanyaan</a>
            <a href="{{ route('admin.question.import') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Kirim Excel</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-gray-800">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Pertanyaan</th>
                    <th class="px-4 py-2 text-left">Skor</th>
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
                        <a href="{{ route('admin.question.edit', $question->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
