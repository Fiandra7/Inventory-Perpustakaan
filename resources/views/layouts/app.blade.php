<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Inventaris Perpustakaan')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .nav-link.active {
            font-weight: 600;
        }

        .content-wrapper {
            padding-top: 30px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="bi bi-book"></i>
                Inventaris Perpustakaan
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                            <i class="bi bi-house"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('buku.*') ? 'active' : '' }}"
                           href="{{ route('buku.index') }}">
                            <i class="bi bi-book"></i>
                            Data Buku
                        </a>
                    </li>

                </ul>

                @auth
                    <div class="dropdown">

                        <button class="btn btn-light dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown">

                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <span class="dropdown-item-text">
                                    {{ Auth::user()->email }}
                                </span>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item text-danger">

                                        <i class="bi bi-box-arrow-right"></i>
                                        Logout

                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>
                @endauth

            </div>
        </div>
    </nav>


    <main class="container content-wrapper">

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>