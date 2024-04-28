<html>
<head>
    <title>Сайт по машинам</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('components.common.header')
    <div class="container mx-auto">
        @yield('content')
    </div>
    @include('components.common.footer')

</body>
</html>
