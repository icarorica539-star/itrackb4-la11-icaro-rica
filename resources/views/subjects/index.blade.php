
@extends('layouts.app')

@section('title', 'My Subjects List')

@section('content')
    <h1>My Subjects List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('subjects.create') }}"
       class="btn btn-success mb-3">
        + Add Subject
    </a>

    <form method="GET"
          action="{{ route('subjects.index') }}"
          class="mb-3">

        <div class="row">
            <div class="col-md-4">
                <label for="code">Filter by code</label>
                <input
                    type="text"
                    name="code"
                    id="code"
                    class="form-control"
                    value="{{ request('code') }}"
                    placeholder="Enter subject code"
                >
            </div>

            <div class="col-md-4">
                <label for="units">Filter by units</label>
                <select name="units"
                        id="units"
                        class="form-control">

                    <option value="">All units</option>

                    <option value="2"
                        {{ request('units') == '2' ? 'selected' : '' }}>
                        2 units
                    </option>

                    <option value="3"
                        {{ request('units') == '3' ? 'selected' : '' }}>
                        3 units
                    </option>
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button type="submit"
                        class="btn btn-primary me-2">
                    Filter
                </button>

                <a href="{{ route('subjects.index') }}"
                   class="btn btn-secondary">
                    Clear
                </a>
            </div>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Units</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($subjects as $subject)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subject['id'] }}</td>

                    <td>
                        <a href="{{ route('subjects.show', $subject['id']) }}">
                            {{ $subject['code'] }}
                        </a>
                    </td>

                    <td>{{ $subject['name'] }}</td>

                    <td>
                        @if ($subject['units'] >= 3)
                            <strong>{{ $subject['units'] }}</strong>
                        @else
                            {{ $subject['units'] }}
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
@endsection
