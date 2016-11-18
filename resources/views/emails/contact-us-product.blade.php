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
            <td>Telepon</td><td>: {{ $telephone }}</td>
        </tr>
        <tr>
            <td>{{ trans('global.city') }}</td><td>: {{ $city }}</td>
        </tr>
        <tr>
            <td>{{ trans('global.product') }}</td><td>: {{ $productName }}</td>
        </tr>
        <tr>
            <td>{{ trans('global.message') }}</td><td>: {{ $msg }}</td>
        </tr>
    </table>
</body>
</html>