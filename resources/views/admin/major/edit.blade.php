@extends('layouts.app')

@section('title', 'Edit Jurusan')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Jurusan</h2>

    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.majors.update', $major->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="code" class="block font-semibold mb-1">Kode Jurusan</label>
            <input type="text" name="code" value="{{ old('code', $major->code) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="desc" class="block font-semibold mb-1">Deskripsi Jurusan</label>
            <input type="text" name="desc" value="{{ old('desc', $major->desc) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="tahun_ajaran_id" class="block font-semibold mb-1">Tahun Ajaran</label>
            <select name="tahun_ajaran_id" class="w-full border rounded p-2" required>
                @foreach($schoolYears as $schoolYear)
                    <option value="{{ $schoolYear->id }}" {{ old('tahun_ajaran_id', $major->tahun_ajaran_id) == $schoolYear->id ? 'selected' : '' }}>
                        {{ $schoolYear->year }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
