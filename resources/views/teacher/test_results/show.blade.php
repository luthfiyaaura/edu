@extends('layouts.teacher')

@section('title', 'Detail Hasil Tes')

@section('content')
    <div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-blue-700">Detail Hasil Tes</h2>

        <div class="mt-4">
            <p><strong>Nama Siswa:</strong> {{ $testResult->student->name }}</p>
            <p><strong>Nilai:</strong> {{ $testResult->score }}</p>
            <p><strong>Tanggal Tes:</strong> {{ $testResult->test_date }}</p>
        </div>
    </div>
@endsection
