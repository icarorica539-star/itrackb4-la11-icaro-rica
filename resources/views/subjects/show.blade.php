<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subject Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="container py-4">

    <h1>Subject Details</h1>

    <p><strong>Code:</strong> {{ $subject->code }}</p>
    <p><strong>Title:</strong> {{ $subject->title }}</p>
    <p><strong>Units:</strong> {{ $subject->units }}</p>
    <p><strong>Active:</strong> {{ $subject->is_active ? 'Yes' : 'No' }}</p>
    <p><strong>Prerequisite:</strong> {{ $subject->prerequisite->name }}</p>

    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
        Back
    </a>

</body>
</html>
