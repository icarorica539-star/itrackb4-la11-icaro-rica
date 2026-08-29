<!DOCTYPE html>
<html>
<head>
    <title>My Subject List</title>
</head>
<body>
    <h1>My Subject List</h1>
    <p>Prepared by: Rica Icaro</p>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Title</th>
            <th>Units</th>
        </tr>
        @foreach ($subjects as $subject)
            <tr>
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
            </tr>
        @endforeach
    </table>
    <p>
        <a href="{{ route('subjects.featured') }}">
            View Featured Subject
        </a>
    </p>
    <p>
        <a href="{{ route('subjects.filter') }}">
            
        </a>
    </p>
</body>
</html>