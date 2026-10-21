<?php

namespace App\Http\Controllers;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display the list of subjects.
     */
    public function index(Request $request)
    {
        DB::flushQueryLog();
        DB::enableQueryLog();

        $query = Subject::with('prerequisite')
            ->whereNotIn('id', [6, 7]);

        // Filter by subject code
        if ($request->filled('code')) {
            $query->where(
                'code',
                'like',
                '%' . $request->input('code') . '%'
            );
        }

        // Filter by units
        if ($request->filled('units')) {
            $query->where(
                'units',
                $request->input('units')
            );
        }

        // Filter by prerequisite
        if ($request->filled('prerequisite_id')) {
            $query->where(
                'prerequisite_id',
                $request->input('prerequisite_id')
            );
        }

        // Get subjects and their prerequisites
        $subjects = $query->orderBy('id')->get();

        // Count SQL queries
        $queries = DB::getQueryLog();
        $queryCount = count($queries);

        DB::disableQueryLog();

        // Get prerequisites for the filter dropdown
        $prerequisites = Prerequisite::orderBy('name')->get();

        return view('subjects.index', compact(
            'subjects',
            'prerequisites',
            'queryCount'
        ));
    }

    /**
     * Show the form for creating a subject.
     */
    public function create()
    {
        $prerequisites = Prerequisite::orderBy('name')->get();

        return view('subjects.create', compact('prerequisites'));
    }

    /**
     * Store a newly created subject.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:subjects,code',
            'title' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
            'prerequisite_id' => 'nullable|exists:prerequisites,id',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Subject::create($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added successfully!');
    }

    /**
     * Display the specified subject.
     */
    public function show(Subject $subject)
    {
        $subject->load('prerequisite');

        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing a subject.
     */
    public function edit(Subject $subject)
    {
        $prerequisites = Prerequisite::orderBy('name')->get();

        return view('subjects.edit', compact(
            'subject',
            'prerequisites'
        ));
    }

    /**
     * Update the specified subject.
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:subjects,code,' . $subject->id,
            'title' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
            'prerequisite_id' => 'nullable|exists:prerequisites,id',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $subject->update($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified subject.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject deleted successfully!');
    }
}
