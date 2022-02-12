<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Assignment</title>
        <script src="{{ asset('js/app.js')}}" defer></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div id='app'>
                <index-component></index-component>
            </div>
        </div>
    </div>
    </body>
</html>
