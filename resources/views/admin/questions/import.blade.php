@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded shadow max-w-md">
    <h2 class="text-xl font-semibold mb-4">Import Soal dari Excel</h2>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.question.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="import_file" required accept=".xls,.xlsx,.csv" class="mb-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
    </form>
</div>
@endsection
