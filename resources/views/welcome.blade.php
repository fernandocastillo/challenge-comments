<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token">
        <meta name="api-base-url" content="{{ url('api') }}/" />
        <title>Challenge Comments</title>

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    </head>
    <body>
        <div id="app">
            <div class="hidden">Loading</div>
            <layout-component></layout-component>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
