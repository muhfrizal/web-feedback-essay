<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Website') }}</title>

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
            box-shadow: 0 4px 10px rgba(0,0,0,.08);
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
            📝 {{ config('app.name', 'Website') }}
        </span>

        <div class="ms-auto text-white">
            <a href="{{ route('logout') }}"
               class="btn btn-sm btn-light ms-2"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
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