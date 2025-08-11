<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow border-l-4 border-blue-500">
        <h2 class="text-lg font-semibold">Jumlah Siswa</h2>
        <p class="text-3xl mt-2 text-blue-700 font-bold">{{ $jumlahSiswa }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow border-l-4 border-green-500">
        <h2 class="text-lg font-semibold">Jumlah Guru</h2>
        <p class="text-3xl mt-2 text-green-700 font-bold">{{ $jumlahGuru }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow border-l-4 border-purple-500">
        <h2 class="text-lg font-semibold">Hasil Tes</h2>
        <p class="text-3xl mt-2 text-purple-700 font-bold">{{ $jumlahHasilTes }}</p>
    </div>
</div> 


@endsection
