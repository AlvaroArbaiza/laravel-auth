<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
    @vite('resources/js/app.js')
</head>
<body class="bg-black">

    {{-- header importato con @include --}}
    @include('guest.partials.header')

    <main>
        @yield('content')
    </main>

    {{-- footer importato con @include --}}
    {{-- @include('partials.footer') --}}
    
</body>

</html>

