<!-- resources/views/admin/test_results/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Hasil Tes')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-blue-700"> </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-gray-800">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Siswa</th>
                    <th class="px-4 py-2 text-left">Hasil</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($testResults as $index => $testResult)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">
                        @if($testResult->student)  <!-- Cek jika student ada -->
                            {{ $testResult->student->name }}
                        @else
                            Siswa Kelas 10A
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $testResult->score }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.test_result.show', $testResult->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Lihat Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
