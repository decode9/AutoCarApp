<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>

    <style>
        .header {
            height: 100px;
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        .right-position{
            font-size: 10px;
            text-align: right;
        }

        p,h2,h3{
            margin: 0;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        td {
            text-align: center;
            font-family: 'arial';
            font-size: 8px;
        }

        h2>span {
            font-size: 10px;
            font-style: italic;
        }
    </style>
</head>

<body>
    @include('report.header')
    <table>
        <thead>
            <tr>
                <td>#</td>
                @foreach($keys as $key)
                <td>{{ __($key) }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($records as $key => $record)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                @foreach($keys as $key)
                <td>{{ $record[$key] }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>