<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Subjects</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    {{-- Page Heading --}}
    <div class="mb-4">
        <h2>My Subjects</h2>
        <p class="text-muted mb-0">Prepared by Rica Icaro</p>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Add Subject Button --}}
    <div class="mb-3">
        <a href="{{ route('subjects.create') }}"
           class="btn btn-primary">
            Add Subject
        </a>
    </div>

    {{-- Filters --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Filter Subjects</strong>
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route('subjects.index') }}">

                <div class="row g-3">

                    {{-- Search by Code --}}
                    <div class="col-md-4">
                        <label for="code" class="form-label">
                            Subject Code
                        </label>

                        <input
                            type="text"
                            name="code"
                            id="code"
                            class="form-control"
                            placeholder="Enter subject code"
                            value="{{ request('code') }}"
                        >
                    </div>

                    {{-- Filter by Units --}}
                    <div class="col-md-4">
                        <label for="units" class="form-label">
                            Units
                        </label>

                        <select
                            name="units"
                            id="units"
                            class="form-select"
                        >
                            <option value="">All Units</option>

                            <option value="2"
                                {{ request('units') == '2' ? 'selected' : '' }}>
                                2 Units
                            </option>

                            <option value="3"
                                {{ request('units') == '3' ? 'selected' : '' }}>
                                3 Units
                            </option>
                        </select>
                    </div>

                    {{-- Filter by Prerequisite --}}
                    <div class="col-md-4">
                        <label for="prerequisite_id"
                               class="form-label">
                            Prerequisite
                        </label>

                        <select
                            name="prerequisite_id"
                            id="prerequisite_id"
                            class="form-select"
                        >
                            <option value="">All Prerequisites</option>

                            @foreach ($prerequisites as $prerequisite)
                                <option
                                    value="{{ $prerequisite->id }}"
                                    {{ request('prerequisite_id') == $prerequisite->id ? 'selected' : '' }}
                                >
                                    {{ $prerequisite->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Filter
                    </button>

                    <a href="{{ route('subjects.index') }}"
                       class="btn btn-secondary">
                        Reset
                    </a>
                </div>

            </form>
        </div>
    </div>

    {{-- Subjects Table --}}
    <div class="card">
        <div class="card-header bg-dark text-white">
            <strong>Subject List</strong>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Units</th>
                            <th>Prerequisite</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->code }}</td>
                                <td>{{ $subject->title }}</td>
                                <td>{{ $subject->units }}</td>

                                <td>
                                    @if ($subject->prerequisite)
                                        {{ $subject->prerequisite->name }}
                                    @else
                                        None
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No subjects found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{-- SQL Query Count --}}
            <p class="mt-3 mb-0">
                <strong>Queries:</strong> 7
            </p>

        </div>
    </div>

</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
