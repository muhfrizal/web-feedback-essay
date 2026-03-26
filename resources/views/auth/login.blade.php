<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login | {{ config('app.name', 'Website') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            max-width: 420px;
            width: 100%;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h4 class="text-center mb-3"> Feedback Management System</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                NIP atau password salah
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">
                Login
            </button>
        </form>
    </div>

</body>

</html>
