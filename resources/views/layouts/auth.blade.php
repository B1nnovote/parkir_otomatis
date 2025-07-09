<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .auth-card {
            max-width: 420px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }
        .brand {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 30px;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
