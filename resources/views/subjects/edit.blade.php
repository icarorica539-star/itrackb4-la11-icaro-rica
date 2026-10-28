<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Subject</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            <h2 class="mb-0">Edit Subject</h2>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please correct the following errors:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Code</label>
                    <input
                        type="text"
                        name="code"
                        class="form-control"
                        value="{{ old('code', $subject->code) }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $subject->title) }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Units</label>
                    <input
                        type="number"
                        name="units"
                        class="form-control"
                        value="{{ old('units', $subject->units) }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <select name="is_active" class="form-select">
                        <option value="">Select...</option>

                        <option
                            value="1"
                            @selected((string) old('is_active', (int) $subject->is_active) === '1')
                        >
                            Yes
                        </option>

                        <option
                            value="0"
                            @selected((string) old('is_active', (int) $subject->is_active) === '0')
                        >
                            No
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prerequisite</label>
                    <select name="prerequisite_id" class="form-select">
                        <option value="">None</option>

                        @foreach ($prerequisites as $prerequisite)
                            <option
                                value="{{ $prerequisite->id }}"
                                @selected(old('prerequisite_id', $subject->prerequisite_id) == $prerequisite->id)
                            >
                                {{ $prerequisite->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('subjects.index') }}" class="btn btn-outline-dark">
                    Cancel
                </a>
            </form>

        </div>
    </div>
</div>
</body>
</html>
