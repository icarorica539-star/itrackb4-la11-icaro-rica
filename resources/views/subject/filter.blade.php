<!DOCTYPE html>
<html>
<head>
    <title>Subject Filter</title>
</head>
<body>
    <h1>Subject Filter</h1>
    <p>Prepared by: Rica Icaro</p>
    @if ($units === null)
        <p><strong>All subjects are shown.</strong></p>
    @else
        <p>
            <strong>Active filter:</strong>
            {{ $units }} units
        </p>
    @endif
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Title</th>
            <th>Units</th>
        </tr>
        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject['id'] }}</td>
                <td>
                    <a href="{{ route('subjects.show', $subject['id']) }}">
                        {{ $subject['code'] }}
                    </a>
                </td>
                <td>{{ $subject['title'] }}</td>
                <td>{{ $subject['units'] }}</td>
            </tr>
        @endforeach
    </table>
    <p>
        <a href="{{ route('subjects.index') }}">
            Back to Subject List
        </a>
    </p>
</body>
</html>