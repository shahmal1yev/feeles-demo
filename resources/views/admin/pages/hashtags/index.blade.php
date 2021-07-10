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

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class='table-responsive'>
                                <div class="dataTables_wrapper dt-bootstrap4">
                                    <div class='row'>
                                        <div class='col-12'>
                                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th colspan='3'>Etiket</th>
                                                        <th>Bağlantı</th>
                                                        <th>Əməliyyat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($hashtags['data'] as $index => $hashtag)
                                                        <tr class='hashtag-row' data-row-id='{{ $hashtag['id'] }}'>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                <input 
                                                                    required 
                                                                    type='text' 
                                                                    maxlength='255' 
                                                                    value='{{ $hashtag["translations"]["az"]["label"] }}' 
                                                                    class='form-control form-control-sm' 
                                                                    name='azLabel'
                                                                    placeholder='Azərbaycanca'
                                                                />
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    required 
                                                                    type='text' 
                                                                    maxlength='255' 
                                                                    value='{{ $hashtag["translations"]["ru"]["label"] }}' 
                                                                    class='form-control form-control-sm' 
                                                                    name='ruLabel'
                                                                    placeholder='Rusca'
                                                                />
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    required 
                                                                    type='text' 
                                                                    maxlength='255' 
                                                                    value='{{ $hashtag["translations"]["en"]["label"] }}' 
                                                                    class='form-control form-control-sm' 
                                                                    name='enLabel'
                                                                    placeholder='İngiliscə'
                                                                />
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    required 
                                                                    type='text' 
                                                                    maxlength='255' 
                                                                    value='{{ $hashtag["link"] }}' 
                                                                    class='form-control form-control-sm' 
                                                                    name='link'
                                                                    placeholder='Bağlantı'
                                                                />
                                                            </td>
                                                            <td class='text-center'>
                                                                <button class='btn btn-sm btn-primary hashtag-save-button'>
                                                                    <i class='fas fa-save'></i>
                                                                </button>
                                                                <button class='btn btn-sm btn-danger hashtag-delete-button'>
                                                                    <i class='fas fa-trash'></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class='row justify-content-end my-3'>
                                        <div class='col'>
                                            <div class='text-right'>

                                                <nav class='d-inline-block'>
                                                    <ul class="pagination p-0 m-0">

                                                        @foreach($hashtags['links'] as $link)
                                                        
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

    @include('admin.template.layouts.logoutModal')

@endsection