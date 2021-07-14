@extends('admin.master')

@section('title')
    {{ __('New Color') }}
@endsection

@section('content')

    <div id='wrapper'>

        @include('admin.template.layouts.sidebar')

        <div id='content-wrapper' class='d-flex flex-column'>
            <div id='content'>

                @include('admin.template.layouts.topbar')

                <div class='container-fluid'>

                    <div class='row'>
                        <div class='col-12'>

                            <div class='card shadow mb-4'>
                                <form class='needs-validation new-color-form d-block p-0 m-0' id='newColorForm'>

                                    <div class='card mb-4'>
                                        <div class='card-header'>
                                            <span class='d-block text-truncate'>
                                                {{ __("New Color") }}
                                            </span>
                                        </div>

                                        <div class='card-body overflow-auto'>
                                            <div class='row p-0 m-0'>
                                                
                                                <div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                                                    <div class='form-group'>
                                                        <input
                                                            type='text'
                                                            name="{{ $requestAttributes['azColor'] }}"
                                                            class='form-control form-control-sm'
                                                            placeholder='{{ __("Azərbaycanca") }}'
                                                            required
                                                            maxlength='255'
                                                        />
                                                        <small class='form-text text-muted'>
                                                            {{ __("Name") }}
                                                        </small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['azColor'] }}'>
                                                        </small>
                                                        
                                                    </div>
                                                </div>

                                                <div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                                                    <div class='form-group'>
                                                        <input
                                                            type='text'
                                                            name="{{ $requestAttributes['ruColor'] }}"
                                                            class='form-control form-control-sm'
                                                            placeholder="{{ __("Rusca") }}"
                                                            required
                                                            maxlength='255'
                                                        />
                                                        <small class='form-text text-muted'>
                                                            {{ __("Name") }}
                                                        </small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['ruColor'] }}'>
                                                        </small>

                                                    </div>
                                                </div>

                                                <div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                                                    <div class='form-group'>
                                                        <input
                                                            type='text'
                                                            name="{{ $requestAttributes['enColor'] }}"
                                                            class='form-control form-control-sm'
                                                            placeholder="{{ __("İngiliscə") }}"
                                                            required
                                                            maxlength='255'
                                                        />
                                                        <small class='form-text text-muted'>
                                                            {{ __("Name") }}
                                                        </small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['enColor'] }}'>
                                                        </small>
                                                        
                                                    </div>
                                                </div>

                                                <div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                                                    <div class='form-group'>
                                                        <input
                                                            type='color'
                                                            name="{{ $requestAttributes['hex'] }}"
                                                            class='form-control form-control-sm'
                                                            placeholder="{{ __("İngiliscə") }}"
                                                            required
                                                            maxlength='255'
                                                        />
                                                        <small class='form-text text-muted'>
                                                            {{ __("Color") }}
                                                        </small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['hex'] }}'>
                                                        </small>
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class='card-footer'>
                                            <div class='text-right'>
                                                <button type='button' class='btn btn-sm btn-primary submit-button'>
                                                    {{ __("Submit") }}
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection