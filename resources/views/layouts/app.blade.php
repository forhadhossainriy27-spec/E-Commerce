<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
</head>

<body class="bg-gray-100">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>