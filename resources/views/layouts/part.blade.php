<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('assets/backend/style.css')}}">
</head>
<body>
          <!-- SIDEBAR -->
      @include('layouts.part.sidebar')
      <!-- SIDEBAR -->
  
      <!-- CONTENT -->
      <section id="content">
          <!-- NAVBAR -->
          @include('layouts.part.navbar')
          <!-- NAVBAR -->

          <script src="{{asset('assets/backend/script.js')}}"></script>
</body>
</html>