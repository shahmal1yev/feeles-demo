<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ __('İdarəetmə Paneli') }} - @yield('title')</title>

        <!-- Custom fonts for this template-->
        <link href="/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- TOASTIFY -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        {{-- icons --}}
        <link rel='stylesheet' type='text/css' href='/assets/admin/css/style.css' />

        @yield('css')
        
    </head>

    <body id="page-top">


        @yield('content')

        <!-- Bootstrap core JavaScript-->
        <script src="/assets/admin/vendor/jquery/jquery.min.js"></script>
        <script src="/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/assets/admin/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="/assets/admin/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/assets/admin/js/demo/chart-area-demo.js"></script>
        <script src="/assets/admin/js/demo/chart-pie-demo.js"></script>

        <!-- TOASTIFY -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <!-- axios -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @yield('javascript')

        <!-- custom js -->
        <script type='module' src='/assets/admin/js/script.js'></script>

    </body>

</html>