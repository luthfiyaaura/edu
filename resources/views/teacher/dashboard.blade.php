@extends('layouts.teacher')

@section('title', 'Dashboard Guru')

@section('content')

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white border-l-4 border-blue-500 shadow p-4 rounded">
                    <h2 class="text-lg font-semibold text-gray-700">Jumlah Siswa</h2>
                    <p class="text-3xl font-bold text-blue-700 mt-2">{{ $jumlahSiswa }}</p>
                </div>

                <div class="bg-white border-l-4 border-purple-500 shadow p-4 rounded">
                    <h2 class="text-lg font-semibold text-gray-700">Hasil Tes</h2>
                    <p class="text-3xl font-bold text-purple-700 mt-2">{{ $jumlahHasilTes }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
