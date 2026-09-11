@extends('layouts.app')

@section('title')
My Subject List
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <h2 class="mb-3">My Subject List</h2>

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
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $subject['id'] }}
                            </td>

                            <td>
                                <a href="{{ route('subjects.show', $subject['id']) }}">
                                    {{ $subject['code'] }}
                                </a>
                            </td>

                            <td>
                                {{ $subject['title'] }}
                            </td>

                            <td>
                                {{ $subject['units'] }}
                            </td>

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

                        <tr>
                            <td colspan="6" class="text-center">
                                No subjects are available at the moment.
                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

<div class="mt-3">
    <a class="btn btn-primary" href="{{ route('subjects.featured') }}">
        View Featured Subject
    </a>
</div>


@endsection
