<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
{
    $subjects = [
        ['code' => 'CAP102', 'title' => 'Capstone Ptoject 2',     'units' => 3],
        ['code' => 'ITP1333', 'title' => 'Information Assurance and Security',     'units' => 2],
        ['code' => 'ITP1441', 'title' => 'System Administration and Maintenance',     'units' => 2],
        ['code' => 'ITRACKB4', 'title' => 'Web System and Technologies: Web Programming 2',     'units' => 2],
        ['code' => 'ITP1031', 'title' => 'System Analysis and Design',     'units' => 3],
        
    ];
 
    return view('subject.index', ['subjects' => $subjects]);
}

}
