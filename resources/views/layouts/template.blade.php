<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- leaflet css --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" /> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>
        html,
        body {
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            /* Hide scrollbars */
        }

        nav {
            height: 8%;
        }
    </style>
    @yield('styles')
</head>

<body>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-map"></i> {{ $title }}</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('map') }}"><i
                                class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('table') }}"><i class="fa-solid fa-table"></i> Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-info"></i> Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i>
                            Login</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    {{-- <a href="{{ route('map') }}"></a> --}}

    @yield('content')

    @include('components.toast')

    @yield('script')
</body>

</html>
