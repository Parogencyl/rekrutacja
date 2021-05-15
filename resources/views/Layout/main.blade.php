<!DOCTYPE html>
<html>

<head>
    <title> Rekrutacja </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>
    <nav class="bg-dark mb-5">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('post.get.create') }}"> Dodaj post </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('category.get.create') }}"> Dodaj kategorię </a>
            </li>
        </ul>
    </nav>
    <section class="container">
        @yield('content')
    </section>
</body>

</html>