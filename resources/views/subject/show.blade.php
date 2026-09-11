@extends('layouts.app')
@section('title')
Subject Details
@endsection
@section('content')

<div class="card">
    <div class="card-body">

        <h2 class="mb-3">Subject Details</h2>

        <p> <strong>ID:</strong> {{ $subject['id'] }} </p>

        <p> <strong>Code:</strong> {{ $subject['code'] }} </p>

        <p> <strong>Title:</strong> {{ $subject['title'] }} </p>

        <p> <strong>Units:</strong> {{ $subject['units'] }} </p>

        <a class="btn btn-secondary" href="{{ route('subjects.index') }}">
            Back to Subject List
        </a>

    </div>
</div>

@endsection
