@extends('admin.master')

@section('title')
    {{ __('Bannerlər') }}
@endsection

@section('content')

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

                    <div class='row'>

                        @foreach($banners['data'] as $index => $banner)

                            <div id="{{ $banner['id'] }}" class='banner-item col col-md-6 col-lg-4'>    
                                <div class="banner-card card shadow mb-4">
                                    <div class="card-body">
                                        <div class='border overflow-auto p-0 mb-4 m-0'>
                                            <a href='{{ $banner["source"] }}' target="_blank">
                                                <img src="{{ $banner['source'] }}" class='img-fluid w-100' />
                                            </a>
                                        </div>
                                        <table class='table'>
                                            <tr>
                                                <td colspan='2'>
                                                    <div class='input-group'>
                                                        <input maxlength='255' type='text' class='form-control form-control-sm banner-link-input' value="{{ $banner['link'] }}" />
                                                        <div class='input-group-append'>
                                                            <button class='btn btn-sm btn-primary banner-save-button'>
                                                                <i class='fas fa-save'></i>
                                                            </button>
                                                            <a href='{{ url($banner["link"]) }}' target="_blank" class='btn btn-sm btn-primary'>
                                                                <i class='fas fa-eye'></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Əməliyyat</th>
                                                <td class='text-right'><button class='btn btn-sm btn-danger banner-delete-button'><i class='fas fa-trash'></i></button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div class='row mt-4'>

                        <div class='col'>
                            <div class='text-center'>

                                <nav class='d-inline-block'>
                                    <ul class="pagination p-0 m-0">

                                        @foreach($banners['links'] as $link)
                                        
                                            <li class="page-item {{ is_null($link['url']) ? 'disabled' : false }} {{ $link['active'] ? 'active' : false }}">
                                                <a class="page-link" href="{{ $link['url'] }}">
                                                    {!! $link['label'] !!}
                                                </a>
                                            </li>

                                        @endforeach
                                    </ul>
                                </nav>

                            </div>
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