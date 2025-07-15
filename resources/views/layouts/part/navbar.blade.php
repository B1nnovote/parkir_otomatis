<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/style.css') }}">
</head>

<body>

    <nav>
        <a href="#" class="nav-link"></a>
        <form action="#">
            <div class="form-input">
            </div>
        </form>
        <a href="#" class="notification">
        </a>
        <a href="#" class="profile">
            @if (Auth::user()->foto)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profil" width="50"
                    class="rounded-circle">
            @else
                <img src="{{ asset('assets\backend\img\profile.png')}}" alt="Default" width="50" class="rounded-circle">
            @endif
        </a>
    </nav>



    <script src="{{ asset('assets/backend/script.js') }}"></script>
</body>

</html>
