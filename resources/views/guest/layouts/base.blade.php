<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
    <title>Booltrains</title>
</head>
<body>
    @include('guest.partials.header')
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    @include('guest.partials.footer')
</body>
</html>
