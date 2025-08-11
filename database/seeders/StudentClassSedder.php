<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentClassSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_classes')->insert([
            ['major_id' => 1, 'code' => 'RPL10A', 'desc' => 'RPL Kelas 10A', 'created_at' => now(), 'updated_at' => now()],
            ['major_id' => 2, 'code' => 'TKJ11B', 'desc' => 'TKJ Kelas 11B', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
