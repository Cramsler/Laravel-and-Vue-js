<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="overflow: hidden;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if (\Illuminate\Support\Facades\Auth::check())
            <meta name="user_id" content="{{ \Illuminate\Support\Facades\Auth::user()->id }}" />
        @endif
        <title>Laravel</title>

    </head>
    <body>
        <div id="app">
            <base-app />
        </div>

        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
