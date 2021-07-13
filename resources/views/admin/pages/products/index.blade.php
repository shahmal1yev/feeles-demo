@extends('admin.master')

@section('title')
    {{ __('Məhsullar') }}
@endsection

@section('css')
    <!-- CSS FILE(S) OF LIGHT GALLERY -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/css/lightgallery.min.css" integrity="sha512-gk6oCFFexhboh5r/6fov3zqTCA2plJ+uIoUx941tQSFg6TNYahuvh1esZVV0kkK+i5Kl74jPmNJTTaHAovWIhw==" crossorigin="anonymous" />
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

                        @foreach($products as $product)

                            <div id="{{ $product->id }}" class='product-item col col-md-6 col-lg-4'>

                                <div class='product-card card shadow mb-4'>
                                    
                                    <div class='card mb-4'>
                                        <div class='card-header'>
                                            <span class='product-name-az text-truncate d-block'>{{ $product->translate(app()->getLocale())->name }}</span>
                                        </div>
                                        <div class='card-body overflow-auto'>
                                            <ul class='product-image-list list-unstyled row flex-nowrap'>
                                                @foreach($product->images as $image)
                                                    <li class='col-6 col-sm-4 col-xl-3 p-1 m-0' data-src='{{ $image->source }}'>
                                                        <img src='{{ $image->source }}' class='img-fluid img-fluid-small rounded' />
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class='card-body'>
                                            <table class='table table-sm'>
                                                <tr>
                                                    <th>{{ __("Baxış sayı") }}</th>
                                                    <td class='text-right'>{{ $product->viewCount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __("Satış sayı") }}</th>
                                                    <td class='text-right'>{{ $product->saleCount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __("Status") }}</th>
                                                    <td class='text-right'>{{ $product->online ? __("Aktivdir") : __("Deaktivdir") }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __("Kateqoriya") }}</th>
                                                    <td class='text-right'>{{ $product->category->translate(app()->getLocale())->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __("Qiymət") }}</th>
                                                    <td class='text-right'>{{ $product->price }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class='card-footer'>
                                            <div class='text-right'>
                                                <a
                                                    class='stock-product-btn btn btn-sm btn-primary plus-icon p-2'
                                                    href='{{ route('admin.products.stock', ['product' => $product->id]) }}'
                                                >
                                                </a>
                                                <a
                                                    class='edit-product-btn btn btn-sm btn-primary edit-icon p-2' 
                                                    href='{{ route('admin.products.edit', ['product' => $product->id]) }}'>
                                                </a>
                                                <a
                                                    class='delete-product-btn btn btn-sm btn-danger trash-icon p-2' 
                                                    href='{{ route('admin.products.remove', ['product' => $product->id]) }}'>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        @endforeach

                        
                    </div>


                    {{ $products->links('admin.template.layouts.pagination') }}
                    

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




@section('javascript')

    <!-- JAVASCRIPT FILE(S) OF LIGHT GALLERY -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>

@endsection