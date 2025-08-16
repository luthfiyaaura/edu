@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <form action="{{ route('admin.classes.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nama Kelas</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="school_year_id" class="block font-semibold mb-1">Tahun Ajaran</label>
            <select name="school_year_id" class="w-full border rounded p-2" required>
                <option value="">Pilih Tahun Ajaran</option>
                @foreach($schoolYears as $schoolYear)
                    <option value="{{ $schoolYear->id }}">{{ $schoolYear->year }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="major_id" class="block font-semibold mb-1">Jurusan</label>
            <select name="major_id" class="w-full border rounded p-2" required>
                <option value="">Pilih Jurusan</option>
                @foreach($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->desc }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
@endsection
