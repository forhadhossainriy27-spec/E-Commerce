<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta + Vite --}}
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    @include('admin.partials.sidebar')

    <div class="flex-1 flex flex-col">

        @include('admin.partials.navbar')

        <main class="p-6">
            @yield('content')
        </main>

        @include('admin.partials.footer')

    </div>

</div>

</body>
</html>