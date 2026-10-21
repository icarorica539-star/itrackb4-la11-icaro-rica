<?php

namespace Database\Seeders;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        // Lookup rows first, each held in a variable
        $none = Prerequisite::create(['name' => 'None']);
        $pf   = Prerequisite::create(['name' => 'Programming Fundamentals']);
        $wst  = Prerequisite::create(['name' => 'Web Systems and Technologies']);

        Subject::create([
            'code' => 'ITP1031', 'title' => 'Programming Fundamentals',
            'units' => 3, 'is_active' => 1, 'prerequisite_id' => $none->id,
        ]);

        Subject::create([
            'code' => 'ITP133', 'title' => 'Object-Oriented Programming',
            'units' => 2, 'is_active' => 1, 'prerequisite_id' => $pf->id,
        ]);

        Subject::create([
            'code' => 'ITP1441', 'title' => 'Web Systems and Technologies',
            'units' => 2, 'is_active' => 1, 'prerequisite_id' => $none->id,
        ]);

        Subject::create([
            'code' => 'ITRACKB4', 'title' => 'Web Programming 2',
            'units' => 2, 'is_active' => 1, 'prerequisite_id' => $wst->id,
        ]);

        Subject::create([
            'code' => 'CAP102', 'title' => 'Capstone Project',
            'units' => 3, 'is_active' => 1, 'prerequisite_id' => $pf->id,
        ]);

        Subject::create([
            'code' => 'CC106', 'title' => 'Application Development and Emerging Technologies',
            'units' => 3, 'is_active' => 1, 'prerequisite_id' => $wst->id,
        ]);
    }
}