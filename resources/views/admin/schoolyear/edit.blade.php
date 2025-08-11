@extends('layouts.app')

@section('title', 'Edit Tahun Ajaran')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
 
    <form action="{{ route('admin.schoolyear.update', $schoolYear->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tahun Ajaran -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tahun Ajaran</label>
            <input type="text" name="year" class="w-full border rounded p-2" value="{{ old('year', $schoolYear->year) }}" required>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
@endsection
