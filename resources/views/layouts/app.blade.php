<html>
<head>
    <title>@yield('title') | Сайт по машинам</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('components.common.header')
    @if (session('alert-error'))
        <div class="alert alert-danger" style="color: red">
            {{ session('alert-error') }}
        </div>
    @endif
    @if (session('alert-cart'))
        <div class="alert alert-success" style="color: green">
            {{ session('alert-cart') }}
        </div>
    @endif
    <div class="container mx-auto">
        @yield('content')
    </div>

    @include('components.common.footer')
</body>
</html>
