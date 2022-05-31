<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- CSS rules to specif --}}
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assetsdashboard/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assetsdashboard/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assetsdashboard/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="/assetsdashboard/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assetsdashboard/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assetsdashboard/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assetsdashboard/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/assetsdashboard/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assetsdashboard/css/style.css">
    <link rel="stylesheet" href="/assetsdashboard/css/components.css">
    <link rel="shortcut icon" href="/img/pmii.png" />
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    @include('layout.nav')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layout.sidebar')
            @yield('section')

            <footer class="main-footer text-center">
                Copyright &copy; PMII CABANG CIPUTAT {{ date('Y',time()) }}
                <P>Developer by <a href="https://instagram.com/wicaksanabimaarya">Programmer Sarungan</a></P>
                <div class="footer-left text-center">

                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="/assetsdashboard/modules/jquery.min.js"></script>
    <script src="/assetsdashboard/modules/popper.js"></script>
    <script src="/assetsdashboard/modules/tooltip.js"></script>
    <script src="/assetsdashboard/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assetsdashboard/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assetsdashboard/modules/moment.min.js"></script>
    <script src="/assetsdashboard/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="/assetsdashboard/modules/datatables/datatables.min.js"></script>
    <script src="/assetsdashboard/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assetsdashboard/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="/assetsdashboard/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assetsdashboard/modules/summernote/summernote-bs4.js"></script>
    <script src="/assetsdashboard/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="/assetsdashboard/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>


    <!-- Page Specific JS File -->
    <script src="/assetsdashboard/js/page/modules-datatables.js"></script>

    <!-- Template JS File -->
    <script src="/assetsdashboard/js/scripts.js"></script>
    <script src="/assetsdashboard/js/custom.js"></script>
    <script src="/js/myscript.js"></script>
    <script>
        $(".custom-file-input").on("change", function () {
    let filename = $(this).val().split("\\").pop();
    $(this).next(".custom-file-label").addClass("selected").html(filename);
});
    </script>
</body>

</html>