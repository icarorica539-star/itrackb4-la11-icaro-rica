<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create([
            'code' => 'CAP102',
            'title' => 'Capstone Project',
            'units' => 3,
            'is_active' => true,
            'prerequisite' => null,
        ]);

        Subject::create([
            'code' => 'ITP133',
            'title' => 'Object-Oriented Programming',
            'units' => 2,
            'is_active' => true,
            'prerequisite' => 'ITP1031',
        ]);

        Subject::create([
            'code' => 'ITP1441',
            'title' => 'Web Systems and Technologies',
            'units' => 2,
            'is_active' => true,
            'prerequisite' => 'ITP133',
        ]);

        Subject::create([
            'code' => 'ITRACKB4',
            'title' => 'Web Programming 2',
            'units' => 2,
            'is_active' => true,
            'prerequisite' => 'ITP1441',
        ]);

        Subject::create([
            'code' => 'ITP1031',
            'title' => 'Programming Fundamentals',
            'units' => 3,
            'is_active' => true,
            'prerequisite' => null,
        ]);
    }
}
