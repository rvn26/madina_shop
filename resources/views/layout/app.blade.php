<!DOCTYPE html>
<html lang="en">

<head>
    @include('head.head')

    <title>@yield('title', 'Mobile Page')</title>
</head>

<body class="bg-[#F4F5F1] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm ">
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>
