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

    @include('web.template.footer')

@endsection

@section('cdnJavascript')
    <!-- SWIPER 6.4.15 -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection