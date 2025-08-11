<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('school_years')->insert([
            [
                'year' => '2022/2023',
                'isActive' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => '2023/2024',
                'isActive' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => '2024/2025',
                'isActive' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
