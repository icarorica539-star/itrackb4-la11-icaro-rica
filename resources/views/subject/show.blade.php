<!DOCTYPE html>
<html>
<head>
    <title>Subject Details</title>
</head>
<body>
    <h1>Subject Details</h1>
    <p>Prepared by: Rica Icaro</p>
    <p><strong>ID:</strong> {{ $subject['id'] }}</p>
    <p><strong>Code:</strong> {{ $subject['code'] }}</p>
    <p><strong>Title:</strong> {{ $subject['title'] }}</p>
    <p><strong>Units:</strong> {{ $subject['units'] }}</p>
    <p>
        <a href="{{ route('subjects.index') }}">
            Back to Subject List
        </a>
    </p>
</body>
</html>