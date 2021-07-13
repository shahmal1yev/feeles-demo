@extends('admin.master')

@section('title')
    {{ __('New Product Detail') }}
@endsection

@section('content')

    <div id='wrapper'>
        
        @include('admin.template.layouts.sidebar')

        <div id='content-wrapper' class='d-flex flex-column'>
            <div class='content'>

                @include('admin.template.layouts.topbar')

                <div class='container-fluid'>
                    <div class='row'>

                        <div class='card shadow mb-4'>
                            <div class='card-body overflow-auto'>
                                <div class='row p-0 m-0'>

                                    <div class='col-12 col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection