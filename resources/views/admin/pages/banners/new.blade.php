@extends('admin.master')

@section('title')
    {{ __('Bannerlər') }}
@endsection

@section('content')

    <style>

        #addNewBannerItem {
            width: 100%;
            height: 100%;
            display: table;
            background-color:  white;
            display: table;
            padding: 10px;
            cursor: pointer;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }

        #addNewBannerItem:after {
            content: '\f067';
            width: 100%;
            height: 100%;
            display: table-cell;
            vertical-align: middle;
            border: 1px solid rgba(0,0,0,.2);
            text-align: center;

            color: rgba(0,0,0,.2);
            font-size: 1.5rem;
            font-weight: 900;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            font-family: "Font Awesome 5 Free";
        }

    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        
        @include('admin.template.layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                @include('admin.template.layouts.topbar')
                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class='row' id='newBanners'>
                        <div class='col col-sm-6 col-lg-4 p-2'>
                            <div id='addNewBannerItem'></div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

@endsection