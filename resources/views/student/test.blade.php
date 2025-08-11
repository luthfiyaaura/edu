
@extends('layouts.tes')

@section('content')

{{-- Box Soal --}}

<div class="max-w-xl mx-auto mt-6 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4 text-center">Soal {{ $nomor }}/{{ $questionCount }}</h2>
    
    <div class="mb-6 text-center">
        <p>{{ $soal['question'] }}</p> 
    </div>

    <form method="POST" action="{{ route('student.test.submit') }}">
        @csrf
        <input type="hidden" name="nomor" value="{{ $nomor }}">
        <input type="hidden" name="tipe" value="{{ $soal['type'] }}">

        <div class="flex justify-center gap-3 mb-6" style="flex-direction: column;">
            {{-- Radio buttons untuk pilihan jawaban menggunakan skala Likert --}}
            <label>
                <input type="radio" name="jawaban" value="100" required>
                Sangat Setuju
            </label>
            <label>
                <input type="radio" name="jawaban" value="75">
                Setuju
            </label>
            <label>
                <input type="radio" name="jawaban" value="50">
                Netral/Ragu-ragu
            </label>
            <label>
                <input type="radio" name="jawaban" value="25">
                Tidak Setuju
            </label>
            <label>
                <input type="radio" name="jawaban" value="0">
                Sangat Tidak Setuju
            </label>
        </div>

        <div class="flex justify-between">
            @if($nomor > 1)
                <a href="{{ route('student.test', ['nomor' => $nomor - 1]) }}" class="px-4 py-2 bg-gray-400 text-white rounded">Sebelumnya</a>
            @else
                <span></span>
            @endif

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                @if($nomor < $questionCount)
                    Soal Berikutnya
                @else
                    Selesai Tes
                @endif
            </button>
        </div>
    </form>
</div>

@endsection
