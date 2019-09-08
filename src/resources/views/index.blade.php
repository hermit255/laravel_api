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
                <ul>
                    <li>
                        <a href="prefectures/list">prefectures_list</a>
                        source: <a href="api/prefectures">api_prefectures_list</a>
                    </li>
                    <li>
                        <a href="calendar?format=d">calendar</a>
                        source: <a href="api/calendar?format=y-m-d">api_calendar</a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
