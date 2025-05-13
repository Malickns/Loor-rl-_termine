<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administrateur')</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
     <!-- Favicon -->
    <link href="admin/assets/img/favicon.ico" rel="icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.min.js"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="admin/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="admin/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Template Stylesheet -->
   
<script src="{{ asset('admin/assets/js/script.js') }}" defer></script>

</head>
<body>

    @include('admin.partials.menuGauche')

    <div class="content">
    
        <!-- Inclure le header -->
        @include('admin.partials.header')


        
        <!-- Contenu dynamique -->
        <main>
            @yield('content')
        </main>

        <!-- Inclure le footer -->
        @include('admin.partials.footer')

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/lib/chart/chart.min.js"></script>
    <script src="admin/assets/lib/easing/easing.min.js"></script>
    <script src="admin/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="admin/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="admin/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="admin/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="admin/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="admin/assets/js/main.js"></script>
</body>
</html>
