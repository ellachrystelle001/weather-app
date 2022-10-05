<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

        <title> Weather App </title>
        @vite(['resources/js/app.js'])
        <script src="https://kit.fontawesome.com/12b46f35db.js" crossorigin="anonymous"></script>
    </head>
   <body>
        <div id="app">
            <app/>
        </div>
    </body>
</html>
