@extends('layouts.app')

@section('title', 'Edit Pertanyaan')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">Edit Pertanyaan</h2>

    <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="question" class="block text-gray-700">Teks Pertanyaan</label>
            <input type="text" name="question" id="question" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('question', $question->question) }}" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700">Tipe Soal</label>
            <select name="type" id="type" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="realistic" {{ old('type', $question->type) == 'realistic' ? 'selected' : '' }}>Realistic</option>
                <option value="investigative" {{ old('type', $question->type) == 'investigative' ? 'selected' : '' }}>Investigative</option>
                <option value="artistic" {{ old('type', $question->type) == 'artistic' ? 'selected' : '' }}>Artistic</option>
                <option value="social" {{ old('type', $question->type) == 'social' ? 'selected' : '' }}>Social</option>
                <option value="enterprising" {{ old('type', $question->type) == 'enterprising' ? 'selected' : '' }}>Enterprising</option>
                <option value="conventional" {{ old('type', $question->type) == 'conventional' ? 'selected' : '' }}>Conventional</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-300">Simpan Perubahan</button>
    </form>
</div>
@endsection
