<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Masukkan users
        DB::table('users')->insert([
            [
                'id' => 1,
                'person_id' => 'admin001',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'person_id' => 'admin002',
                'password' => Hash::make('password456'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'person_id' => 'student001',
                'password' => Hash::make('kelas10A'),
                'role' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'person_id' => 'teacher001',
                'password' => Hash::make('guru123'),
                'role' => 'teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $userId = DB::table('users')->where('person_id', 'student001')->value('id');
        $schoolYearId = DB::table('school_years')->where('isActive', true)->value('id');
        $classId = DB::table('student_classes')->where('code', 'RPL10A')->value('id');

        DB::table('students')->insert([
            'user_id' => $userId,
            'name' => 'Siswa Kelas 10A',
            'address' => 'Jl. Contoh No. 1',
            'school_year_id' => $schoolYearId,
            'student_class_id' => $classId,
            'created_at' => now(),
            'updated_at' => now(),
            'nis' => $userId, 
        ]);
    }
}
