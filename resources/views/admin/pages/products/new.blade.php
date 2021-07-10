@extends('admin.master')

@section('title')
    {{ __('Məhsullar') }}
@endsection

@section('css')
    <!-- CSS FILE(S) OF FILEPOND -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
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


                        <div class='product-item col-12'>

                            <div class='product-card card shadow mb-4'>
                                
                                <form class='new-product-form d-block p-0 m-0' id='newProductForm'>

                                    <div class='card mb-4'>
                                        <div class='card-header'>
                                            <span class='product-name-az text-truncate d-block'>{{ __("Yeni məhsul") }}</span>
                                        </div>
                                        <div class='card-body overflow-auto'>
                                            <div class='row p-0 m-0'>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['azName'] }}' placeholder='{{ __("Azərbaycanca") }}' />
                                                        <small class='form-text text-muted mx-1'>{{ __("Adı") }}</small>
                                                        <small data-error-reporter='{{ $requestAttributes['azName'] }}' class='form-text text-danger'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['ruName'] }}' placeholder='{{ __("Rusca") }}' />
                                                        <small class='form-text text-muted mx-1'>{{ __("Adı") }}</small>
                                                        <small data-error-reporter='{{ $requestAttributes['ruName'] }}' class='form-text text-danger'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['enName'] }}' placeholder='{{ __("İngiliscə") }}' />
                                                        <small class='form-text text-muted mx-1'>{{ __("Adı") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['enName'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6'>
                                                    <div class='form-group'>
                                                        <select class='form-control' name='{{ $requestAttributes['category'] }}'>
                                                            @foreach($categories as $category)
                                                                <option value='{{ $category['id'] }}'>{{ $category['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class='form-text text-muted'>{{ __("Kateqoriya") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['category'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['price'] }}' placeholder='{{ __("Qiymət") }}' />
                                                        <small class='form-text text-muted'>{{ __("Qiymət") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['price'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <textarea rows='5' class='form-control' name='{{ $requestAttributes['azDesc'] }}' placeholder='{{ __("Azərbaycanca") }}' maxlength='1000'></textarea>
                                                        <small class='form-text text-muted'>{{ __("Açıqlama") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['azDesc'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <textarea rows='5' class='form-control' name='{{ $requestAttributes['ruDesc'] }}' placeholder='{{ __("Rusca") }}' maxlength='1000'></textarea>
                                                        <small class='form-text text-muted'>{{ __("Açıqlama") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['ruDesc'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <textarea rows='5' class='form-control' name='{{ $requestAttributes['enDesc'] }}' placeholder='{{ __("İngiliscə") }}' maxlength='1000'></textarea>
                                                        <small class='form-text text-muted'>{{ __("Açıqlama") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['enDesc'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12'>
                                                    <div class='form-group'>
                                                        <input type='file' name='{{ $requestAttributes['images'] }}' class='product-image-upload-input' id='productImageUploadInput' multiple />
                                                        <small class='form-text text-muted'>{{ __("Şəkillər") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['images'] }}'></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class='card-footer'>
                                            <div class='text-right'>
                                                <button type='button' class='btn btn-sm btn-primary submit-button' disabled='disabled'>
                                                    Göndər
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </form>

                            </div>

                        </div>

                    </div>
                    <div class='row mt-4'>

                        <div class='col'>
                            <div class='text-center'>

                                <nav class='d-inline-block'>
                                    <ul class="pagination p-0 m-0">

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

    @include('admin.template.layouts.logoutModal')

@endsection

@section('javascript')

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

@endsection