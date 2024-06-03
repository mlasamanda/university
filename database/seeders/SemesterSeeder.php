<?php

namespace Database\Seeders;

use App\Models\Master\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semseter = [
            [
                'name' => 'semester 1',
                'yOfStudy' => '2023/2024',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'semester 2',
                'yOfStudy' => '2023/2024',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        Semester::insert($semseter);
    }
}
