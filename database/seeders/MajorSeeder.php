<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            ['code' => 'RPL', 'desc' => 'Rekayasa Perangkat Lunak', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'TKJ', 'desc' => 'Teknik Komputer dan Jaringan', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'MM', 'desc' => 'Multimedia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
