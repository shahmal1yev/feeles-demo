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
                                
                                <form class='new-product-form d-block p-0 m-0' id='editProductForm' data-product-id='{{ $product->id }}'>

                                    <div class='card mb-4'>
                                        <div class='card-header'>
                                            <span class='product-name-az text-truncate d-block'>{{ __("New Product") }}</span>
                                        </div>
                                        <div class='card-body overflow-auto'>
                                            <div class='row p-0 m-0'>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['azName'] }}' placeholder='{{ __("Azərbaycanca") }}' value="{{ $product->translate('az')->name }}" />
                                                        <small class='form-text text-muted mx-1'>{{ __("Adı") }}</small>
                                                        <small data-error-reporter='{{ $requestAttributes['azName'] }}' class='form-text text-danger'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['ruName'] }}' placeholder='{{ __("Rusca") }}' value='{{ $product->translate('ru')->name }}' />
                                                        <small class='form-text text-muted mx-1'>{{ __("Adı") }}</small>
                                                        <small data-error-reporter='{{ $requestAttributes['ruName'] }}' class='form-text text-danger'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['enName'] }}' placeholder='{{ __("İngiliscə") }}' value='{{ $product->translate('en')->name }}' />
                                                        <small class='form-text text-muted mx-1'>{{ __("Adı") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['enName'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6'>
                                                    <div class='form-group'>
                                                        <select class='form-control' name='{{ $requestAttributes['category'] }}'>
                                                            @foreach($categories as $category)
                                                                @if ($product->categoryId == $category->id)
                                                                    <option selected value='{{ $category->id }}'>{{ $category->name }}</option>
                                                                @else
                                                                    <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <small class='form-text text-muted'>{{ __("Kateqoriya") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['category'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6'>
                                                    <div class='form-group'>
                                                        <input class='form-control' name='{{ $requestAttributes['price'] }}' placeholder='{{ __("Qiymət") }}' value="{{ $product->price }}" />
                                                        <small class='form-text text-muted'>{{ __("Qiymət") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['price'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <textarea rows='5' class='form-control' name='{{ $requestAttributes['azDesc'] }}' placeholder='{{ __("Azərbaycanca") }}' maxlength='1000'>{{ $product->translate('az')->desc }}</textarea>
                                                        <small class='form-text text-muted'>{{ __("Açıqlama") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['azDesc'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <textarea rows='5' class='form-control' name='{{ $requestAttributes['ruDesc'] }}' placeholder='{{ __("Rusca") }}' maxlength='1000'>{{ $product->translate('ru')->desc }}</textarea>
                                                        <small class='form-text text-muted'>{{ __("Açıqlama") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['ruDesc'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12 col-md-6 col-lg-4'>
                                                    <div class='form-group'>
                                                        <textarea rows='5' class='form-control' name='{{ $requestAttributes['enDesc'] }}' placeholder='{{ __("İngiliscə") }}' maxlength='1000'>{{ $product->translate('en')->desc }}</textarea>
                                                        <small class='form-text text-muted'>{{ __("Açıqlama") }}</small>
                                                        <small class='form-text text-danger' data-error-reporter='{{ $requestAttributes['enDesc'] }}'></small>
                                                    </div>
                                                </div>

                                                <div class='col-12'>
                                                    <div class='row mx-1 my-4 p-0 m-0 product-available-images'>
                                                        @foreach($product->images as $image)
                                                            <div class='col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2 m-0'>
                                                                <div class='position-relative p-0 m-0'>
                                                                    <img class='w-100 img-fluid rounded shadow-sm product-image' src='{{ $image->source }}' />
                                                                    <button 
                                                                        data-href='{{ route('admin.products.images.remove', ['image' => $image->name]) }}'
                                                                        style='bottom: 10px;right: 10px;font-size: 12px;'
                                                                        class='position-absolute btn btn-sm btn-danger trash-icon shadow-sm product-image-deleter' 
                                                                    >
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endforeach
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
                                                <button type='button' class='btn btn-sm btn-primary submit-button'>
                                                    Göndər
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </form>

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