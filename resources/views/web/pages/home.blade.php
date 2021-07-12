@extends('web.master')

@section('title')
    {{ __('Online Clothing Store') }}
@endsection

@section('cdnCss')
    <!-- SWIPER 6.4.15 -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')

    @include('web.template.header')

    @include('web.template.layouts.carousel')

    <div class='row p-0 m-0'>
        <div class='col overflow-hidden'>

            @include('web.template.layouts.subbanners')
            @include('web.template.layouts.filter-result')

        </div>
        <div class='col-md-4 col-lg-3 order-2 border-start border-end p-0 m-0'>
            <div id='filterSidebar' class='sidebar-menu right'>

                <div class='content'>

                    <header class='sb-header main-navbar align-items-center justify-content-end d-flex d-md-none px-3 p-2 bg-dark-blue'>
                        <div class='navbar-right p-0 m-0'>
                            <div class='filterSidebarCloser' class='close-icon text-white'></div>
                        </div>
                    </header>

                    <main id='filterMain' class='p-0 m-0'>
                        <div class='p-0 m-0'>
                            @include('web.template.layouts.filter')
                        </div>
                    </main>

                </div>

            </div>
        </div>
    </div>

    @include('web.template.footer')

    @include('web.template.layouts.mobile-menu')

@endsection

@section('cdnJavascript')
    <script type='text/x-tmpl' id='productCardTMPL'>
        <div class='col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 p-2 m-0'>
            <div data-id='{%=o.id%}' class='product-card'>
                <a class='product-link' href='#'>
                    <header class='product-header'>
                        <div class='product-info viewed-info'>
                            <small class='product-info-content'>
                                <span class='product-viewed-info'>
                                    <i class='far fa-eye'></i>102
                                </span>
                            </small>
                        </div>
                        <div class='product-info' style='right:10px;bottom:10px;'>
                            <div class='bookmark-button'></div>
                        </div>
                        <div class='product-image-container'>
                            <img class='product-image' src='{%=o.image%}' />
                        </div>
                    </header>
                    <footer class='product-footer'>
                        <h5 class='product-name'>
                            Product Name
                        </h5>
                        <h5 class='product-price'>
                            <span class='price'>
                                <div class='d-inline-block manat-icon'></div>
                                22.99
                            </span>
                        </h5>
                    </footer>
                </a>
            </div>
        </div>
    </script>

    <!-- SWIPER 6.4.15 -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Blueimp JavaScript Template 3.19.0 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-JavaScript-Templates/3.19.0/js/tmpl.min.js" integrity="sha512-62X328c9VQQkWxrLMccNyRISbwvqQDjvF/HFuvHBMGtZJbNvTG30k1M2O+PYLyWUrcHFKIPvr2OkgmUmcaiccw==" crossorigin="anonymous"></script>
@endsection