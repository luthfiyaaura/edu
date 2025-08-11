@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Hasil Tes RIASEC Kamu</h2>

        <div class="mb-4">
            <p class="text-lg font-semibold">Tipe dominan kamu: <span
                    class="text-green-600">{{ strtoupper($tipeTerkuat) }}</span></p>
            <p class="mt-2">
                {{ $penjelasan[$tipeTerkuat] ?? 'Penjelasan tidak tersedia.' }}
            </p>
        </div>

        <div class="mt-6">
            <h4 class="font-semibold mb-2">Skor Semua Tipe:</h4>
            <ul class="grid grid-cols-2 gap-2">
                @foreach ($skorAkhir as $tipe => $skor)
                    <li>{{ ucfirst($tipe) }}: {{ number_format($skor, 2) }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <h4 class="font-semibold mb-2">Rekomendasi Jurusan Berdasarkan SMART:</h4>
            <div>
                <p><strong>{{ $bestRecommendation['nama'] }}</strong> (skor: {{ $bestRecommendation['skor'] }})</p>
            </div>
        </div>
    </div>
@endsection
