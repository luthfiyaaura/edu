@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Guru</h2>

    <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Guru -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Guru</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <!-- NIP (Nomor Induk Pegawai) -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">NIP</label>
            <input type="text" name="nip" class="w-full border rounded p-2" required>
        </div>

        <!-- Email Guru -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <!-- Phone Guru -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Phone</label>
            <input type="text" name="phone" class="w-full border rounded p-2" required>
        </div>

        <!-- Email Guru -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Password</label>
            <input type="text" name="password" class="w-full border rounded p-2" required>
        </div>



        
        <!-- Tombol Simpan -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
