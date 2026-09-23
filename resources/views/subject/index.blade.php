@extends('layouts.app')

@section('title')
My Subject List
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <h2 class="mb-3">My Subject List</h2>

        {{-- Active Filters --}}
        @if ($units || $code)

            <div class="alert alert-info">
                <strong>Active Filters:</strong>

                @if ($units)
                    Units: {{ $units }}
                @endif

                @if ($units && $code)
                    |
                @endif

                @if ($code)
                    Code: {{ $code }}
                @endif
            </div>

        @endif

        <div class="mb-3">

            <strong>Filter by Units:</strong>

            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['units' => 2, 'code' => $code]) }}"
            >2 Units</a>

            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['units' => 3, 'code' => $code]) }}"
            >3 Units</a>

        </div>

        <div class="mb-3">

            <strong>Filter by Code:</strong>

            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['code' => 'CAP102', 'units' => $units]) }}"
            >CAP102</a>
            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['code' => 'ITP133', 'units' => $units]) }}"
            >ITP133</a>
            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['code' => 'ITP1441', 'units' => $units]) }}"
            >
                ITP1441
            </a>
            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['code' => 'ITRACKB4', 'units' => $units]) }}"
            >
                ITRACKB4
            </a>
            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['code' => 'ITP1031', 'units' => $units]) }}"
            >
                ITP1031
            </a>

            <a
                class="btn btn-sm btn-secondary"
                href="{{ route('subjects.index', ['code' => 'ITP1132', 'units' => $units]) }}"
            >
                ITP1132
            </a>

        </div>

        <div class="mb-4">

            <a
                class="btn btn-danger"
                href="{{ route('subjects.index') }}"
            >
                Clear All Filters
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-striped table-bordered">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Units</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $subject['id'] }}</td>

                            <td><a href="{{ route('subjects.show', $subject['id']) }}">
                                    {{ $subject['code'] }}
                                </a></td>
                            <td>{{ $subject['title'] }}</td>
                            <td>{{ $subject['units'] }}</td>
                            <td>
                                @if ($subject['units'] >= 3)
                                    <span class="badge bg-success">
                                        Major Subject
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Regular Subject
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">
                                No subjects are available at the moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">
    <a
        class="btn btn-primary"
        href="{{ route('subjects.featured') }}"
    >
        View Featured Subject
    </a>
</div>
@endsection