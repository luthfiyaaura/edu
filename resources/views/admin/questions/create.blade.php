{{-- @extends('layouts.app')

@section('title', 'Tambah Pertanyaan')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-blue-700 mb-4"> </h2>

    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="question_text" class="block text-gray-700">Teks Pertanyaan</label>
            <input type="text" name="question_text" id="question_text" class="w-full p-2 border rounded" required>
        </div>


        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan Pertanyaan</button>
    </form>
</div>
@endsection --}}
@extends('layouts.app')

@section('title', 'Tambah Pertanyaan')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
   
    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf
        
        <!-- Teks Pertanyaan -->
        <div class="mb-4">
            <label for="question" class="block text-gray-700">Teks Pertanyaan</label>
            <input type="text" name="question" id="question" class="w-full p-2 border rounded @error('question') border-red-500 @enderror" value="{{ old('question') }}" placeholder="Masukkan teks pertanyaan" required>
            
            @error('question')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tipe Soal -->
        <div class="mb-4">
            <label for="type" class="block text-gray-700">Tipe Soal</label>
            <select name="type" id="type" class="w-full p-2 border rounded @error('type') border-red-500 @enderror" required>
                <option value="realistic" {{ old('type') == 'realistic' ? 'selected' : '' }}>Realistic</option>
                <option value="investigative" {{ old('type') == 'investigative' ? 'selected' : '' }}>Investigative</option>
                <option value="artistic" {{ old('type') == 'artistic' ? 'selected' : '' }}>Artistic</option>
                <option value="social" {{ old('type') == 'social' ? 'selected' : '' }}>Social</option>
                <option value="enterprising" {{ old('type') == 'enterprising' ? 'selected' : '' }}>Enterprising</option>
                <option value="conventional" {{ old('type') == 'conventional' ? 'selected' : '' }}>Conventional</option>
            </select>

            @error('type')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Simpan Pertanyaan</button>
    </form>
</div>
@endsection
