<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sample Index</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <table>
                    @foreach ($calendar as $row)
                    <tr>
                        @foreach ($row as $day)
                        <td>
                            {{ $day->date }} ({{ $day->weekDay }})
                        </td>
                        @endforeach
                    </tr>
                </table>
                <div>
                </div>
                @endforeach
                <br>
            </div>
        </div>
    </body>
</html>
