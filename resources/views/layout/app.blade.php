<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Website') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .navbar-brand { 
            font-weight: 600;
        }

        .ujian-box {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .08);
        }

        footer {
            font-size: 13px;
            color: #777;
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- 🔝 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand">
                Sistem Publish Comment Management
            </span>

            <div class="ms-auto">

                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <span class="fw-semibold">
                            {{ Auth::user()->nama }}
                        </span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow">

                        <li class="px-3 py-2">
                            <div class="fw-semibold">
                                {{ Auth::user()->nama }}
                            </div>
                            <small class="text-muted">
                                NIP: {{ Auth::user()->nip }}
                            </small>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    </ul>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>

            </div>
        </div>
    </nav>

    <!-- 📦 Konten -->
    <main class="container my-4">
        <div class="ujian-box">
            @yield('content')
        </div>
    </main>

    <!-- 🔻 Footer -->
    <footer class="text-center py-3">
        &copy; {{ date('Y') }} {{ config('app.name', 'Website') }}
        <br>
        <small>Kementerian Agama Kabupaten Kulon Progo</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
