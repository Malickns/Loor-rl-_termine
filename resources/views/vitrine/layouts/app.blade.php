<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Site Vitrine')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.min.js"></script>
    <!-- Favicon -->
    <link href="vitrine/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Libraries Stylesheet -->
    <link href="vitrine/lib/animate/animate.min.css" rel="stylesheet">
    <link href="vitrine/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="vitrine/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="vitrine/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Template Stylesheet -->
    <link href="vitrine/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vitrine/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vitrine/css/style.css') }}">
<script src="{{ asset('vitrine/js/script.js') }}" defer></script>

</head>
<body>
    <!-- Inclure le header -->
    @include('vitrine.partials.header')

    <!-- Contenu dynamique -->
   
        @yield('content')
  

    <!-- Inclure le footer -->
    @include('vitrine.partials.footer')
    @stack('scripts')
</body>
</html>
