<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    </head>
    <body>
        <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            @method('POST')
            <input type="text" name="email" placeholder="Email" value="test@example.com">
            <input type="password" name="password" placeholder="Password" value="password">
            <button type="submit">Login</button>
        </form>
    </body>
</html>