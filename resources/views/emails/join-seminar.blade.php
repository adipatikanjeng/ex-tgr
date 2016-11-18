
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
    <table>
        <tr>
            <td>{{ trans('global.name') }}</td><td>: {{ $name }}</td>
        </tr>
        <tr>
        <td>Email</td><td>: {{ $email }}</td>
        </tr>
          <tr>
            <td>{{ trans('global.telephone') }}</td><td>: {{ $telephone }}</td>
        </tr>
        <tr>
            <td>{{ trans('global.place') }}</td><td>: {{ $place }}</td>
        </tr>
        <tr>
            <td>Event</td><td>: {{ $event }}</td>
        </tr>
    </table>
</body>
</html>