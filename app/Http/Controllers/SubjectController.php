<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private function subjects()
    {
        return [
            1 => ['id' => 1,'code' => 'CAP102','title' => 'Capstone Project 2','units' => 3,],
            2 => ['id' => 2,'code' => 'ITP133','title' => 'Information Assurance and Security','units' => 2,],
            3 => ['id' => 3,'code' => 'ITP1441','title' => 'System Administration and Maintenance','units' => 2,],
            4 => ['id' => 4,'code' => 'ITRACKB4','title' => 'Web Systems and Technologies: Web Programming 2','units' => 2,],
            5 => ['id' => 5,'code' => 'ITP1031','title' => 'System Analysis and Design','units' => 3,],
            6 => ['id' => 6,'code' => 'ITP1132','title' => 'Social and Professional Issues','units' => 3,],
        ];
    }
   
    public function index()
    {
        $subjects = $this->subjects();

        return view('subject.index', [
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $subjects = $this->subjects();

        if (!isset($subjects[$id])) {
            abort(404);
        }

        return view('subject.show', [
            'subject' => $subjects[$id]
        ]);
    }
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function featured()
    {
        $subjects = $this->subjects();

        return view('subject.show', [
            'subject' => $subjects[4]
        ]);
    }

    public function filter($units = null)
    {
        $subjects = $this->subjects();

        if ($units === null) {
            return view('subject.filter', [
                'subjects' => $subjects,
                'units' => null
            ]);
        }

        $filtered = [];

        foreach ($subjects as $subject) {
            if ($subject['units'] == $units) {
                $filtered[] = $subject;
            }
        }

        return view('subject.filter', [
            'subjects' => $filtered,
            'units' => $units
        ]);
    }
}
