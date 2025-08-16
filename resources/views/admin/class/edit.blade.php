@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    
    <form action="{{ route('admin.classes.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nama Kelas</label>
            <input type="text" name="name" value="{{ old('name', $class->name) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
    <label for="school_year_id" class="block font-semibold mb-1">Tahun Ajaran</label>
    <select name="school_year_id" class="w-full border rounded p-2" required>
        <option value="">Pilih Tahun Ajaran</option>
        @foreach($schoolYears as $schoolYear)
            <option value="{{ $schoolYear->id }}" {{ old('school_year_id', $class->school_year_id) == $schoolYear->id ? 'selected' : '' }}>
                {{ $schoolYear->year }}
            </option>
        @endforeach
    </select>
</div>


        <div class="mb-4">
            <label for="major_id" class="block font-semibold mb-1">Jurusan</label>
            <select name="major_id" class="w-full border rounded p-2" required>
                <option value="">Pilih Jurusan</option>
                @foreach($majors as $major)
                    <option value="{{ $major->id }}" {{ old('major_id', $class->major_id) == $major->id ? 'selected' : '' }}>
                        {{ $major->desc }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Kelas</button>
    </form>
</div>
@endsection
