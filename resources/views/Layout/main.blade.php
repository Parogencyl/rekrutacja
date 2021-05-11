<!DOCTYPE html>
<html>

<head>
    <title> Rekrutacja </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="bg-dark mb-5">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('get.post.create') }}"> Dodaj post </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('get.category.create') }}"> Dodaj kategorię </a>
            </li>
        </ul>
    </nav>
    <section class="container">
        @yield('content')
    </section>
</body>

</html>