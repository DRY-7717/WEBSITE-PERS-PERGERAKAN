<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300&family=Macondo&family=Nunito:wght@200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,700;0,800;1,100;1,200;1,300;1,900&display=swap"
        rel="stylesheet">
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/assets/vendors/aos/dist/aos.css/aos.css" />
    <link rel="stylesheet" href="/assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css" />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="/img/pmii.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <!-- endinject -->
</head>

<body>
    @include('partials.nav')
    <div class="container-scroller">
        <div class="main-panel">
            @yield('section')
        </div>
    </div>
    @include('partials.footer')

    <!-- inject:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="/assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="/assets/js/demo.js"></script>
    <!-- End custom js for this page-->
</body>

</html>