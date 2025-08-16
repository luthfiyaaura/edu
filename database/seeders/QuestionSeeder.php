<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [

            // ✅ Realistic
            ['question' => 'Saya suka memperbaiki barang seperti kipas angin, sepeda motor, atau alat rumah tangga.', 'type' => 'realistic'],
            ['question' => 'Saya menikmati kegiatan fisik seperti hiking, pramuka, atau kerja bakti.', 'type' => 'realistic'],
            ['question' => 'Saya tertarik mempelajari mesin, peralatan listrik, atau otomotif.', 'type' => 'realistic'],
            ['question' => 'Saya merasa nyaman bekerja dengan alat atau mesin.', 'type' => 'realistic'],

            // ✅ Investigative
            ['question' => 'Saya penasaran tentang cara kerja teknologi atau proses ilmiah.', 'type' => 'investigative'],
            ['question' => 'Saya suka menonton video sains atau eksperimen.', 'type' => 'investigative'],
            ['question' => 'Saya tertantang oleh soal logika atau teka-teki matematika.', 'type' => 'investigative'],
            ['question' => 'Saya sering mencari tahu informasi baru lewat buku atau internet.', 'type' => 'investigative'],

            // ✅ Artistic
            ['question' => 'Saya suka menggambar, membuat desain, atau mengedit video.', 'type' => 'artistic'],
            ['question' => 'Saya mengekspresikan diri lewat seni, tulisan, atau musik.', 'type' => 'artistic'],
            ['question' => 'Saya lebih suka tugas kreatif daripada tugas dengan jawaban pasti.', 'type' => 'artistic'],
            ['question' => 'Saya memiliki selera estetika atau gaya yang khas.', 'type' => 'artistic'],

            // ✅ Social
            ['question' => 'Saya suka membantu teman memahami pelajaran.', 'type' => 'social'],
            ['question' => 'Saya merasa puas saat bisa mendukung orang lain.', 'type' => 'social'],
            ['question' => 'Saya tertarik dengan kegiatan sosial atau menjadi relawan.', 'type' => 'social'],
            ['question' => 'Saya nyaman berbicara dan mendengarkan orang lain.', 'type' => 'social'],

            // ✅ Enterprising
            ['question' => 'Saya percaya diri saat memimpin kelompok.', 'type' => 'enterprising'],
            ['question' => 'Saya pernah ikut OSIS, MPK, atau organisasi lain.', 'type' => 'enterprising'],
            ['question' => 'Saya pernah membuat atau membantu usaha jualan.', 'type' => 'enterprising'],
            ['question' => 'Saya punya ide dan inisiatif dalam merancang acara.', 'type' => 'enterprising'],

            // ✅ Conventional
            ['question' => 'Saya suka pekerjaan administrasi seperti mengelola data atau absen.', 'type' => 'conventional'],
            ['question' => 'Saya senang membuat catatan rapi atau daftar kegiatan.', 'type' => 'conventional'],
            ['question' => 'Saya teliti dan memperhatikan detail saat bekerja.', 'type' => 'conventional'],
            ['question' => 'Saya nyaman dengan pekerjaan yang terstruktur dan teratur.', 'type' => 'conventional'],
        ];

        DB::table('questions')->insert($questions);
    }
}
