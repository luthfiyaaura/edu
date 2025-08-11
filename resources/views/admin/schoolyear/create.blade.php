@extends('layouts.app')

@section('title', 'Tambah Tahun Ajaran')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <!-- Pesan Sukses / Error -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Input Tahun Ajaran -->
    <form action="{{ route('admin.schoolyear.store') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
            <label for="year" class="block text-gray-700">Tahun Ajaran</label>
            <input type="text" id="year" name="year" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ old('year') }}" required>
            
            @error('year')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
@endsection
