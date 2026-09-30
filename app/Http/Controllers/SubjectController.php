<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private function subjects()
    {
        $path = storage_path('app/subjects.json');
        return json_decode(file_get_contents($path), true);
    }

    private function saveSubjects(array $subjects)
    {
        $path = storage_path('app/subjects.json');

        $result = file_put_contents(
            $path,
            json_encode($subjects, JSON_PRETTY_PRINT),
            LOCK_EX
        );

        if ($result === false) {
            abort(500, 'Cannot write to ' . $path . '. Check that the file is not read-only.');
        }
    }

    public function index(Request $request)
    {
        $units = $request->query('units', '');
        $code = $request->query('code', '');

        $allSubjects = $this->subjects();
        $subjects = $allSubjects;

        if ($units !== null && $units !== '') {
            $subjects = array_filter($subjects, function ($subject) use ($units) {
                return $subject['units'] == $units;
            });
        }

        if ($code !== null && $code !== '') {
            $codes = preg_split('/\s+/', trim($code));
            $subjects = array_filter($subjects, function ($subject) use ($codes) {
                return in_array($subject['code'], $codes);
            });
        }

        return view('subject.index', [
            'subjects' => $subjects,
            'allSubjects' => $allSubjects,
            'units' => $units,
            'code' => $code,
        ]);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'  => 'required|string|max:20',
            'name'  => 'required|string|max:100',
            'units' => 'required|in:1,2,3',
        ]);

        $subjects = $this->subjects();

        $validated['units'] = (int) $validated['units'];
        $validated['id'] = (collect($subjects)->max('id') ?? 0) + 1;

        $subjects[] = $validated;
        $this->saveSubjects($subjects);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added.');
    }

    public function show($id)
    {
        $subject = collect($this->subjects())->firstWhere('id', (int) $id);

        if (!$subject) {
            abort(404);
        }

        return view('subject.show', [
            'subject' => $subject,
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
        $subject = collect($this->subjects())->firstWhere('id', 5);

        if (!$subject) {
            abort(404);
        }

        return view('subject.show', [
            'subject' => $subject,
        ]);
    }
}