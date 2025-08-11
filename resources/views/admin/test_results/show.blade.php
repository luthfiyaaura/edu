@extends('layouts.app')

@section('title', 'Detail Hasil Tes')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Detail Hasil Tes</h2>

    <div class="mb-4">
        <strong>Nama Siswa: </strong> {{ $testResult->student->name }}
    </div>
    <div class="mb-4">
        <strong>Nilai: </strong> {{ $testResult->score }}
    </div>

    <div class="mb-4">
        <strong>Tanggal Tes: </strong> {{ $testResult->test_date }}
    </div>

    <a href="{{ route('admin.test_result.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kembali ke Daftar Hasil Tes</a>
</div>
@endsection
