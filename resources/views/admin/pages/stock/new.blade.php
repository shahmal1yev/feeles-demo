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

                        <div class='col-12'>

                            <div class='card shadow mb-4'>
                                <form class='needs-validation new-product-detail-form d-block p-0 m-0' id='newProductDetailForm' data-product-id="{{ $product->id }}">

                                    <div class='card mb-4'>

                                        <div class='card-header'>
                                            <span class='d-block text-truncate'>
                                                {{ __('New Stock') }}
                                            </span>
                                        </div>

                                        <div class='card-body overflow-auto'>
                                            <div class='row p-0 m-0'>

                                                <div class='col-12 col-sm-6 col-md-4'>
                                                    <div class='form-group'>
                                                        <select required class='custom-select' name="{{ $requestAttributes['colorID'] }}">
                                                            @foreach($colors as $color)
                                                                <option value="{{ $color->id }}">
                                                                    {{ $color->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <small class='form-text text-muted'>{{ __("Color") }}</small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['colorID'] }}'></small>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-md-4'>
                                                    <div class='form-group'>
                                                        <select required class='custom-select' name="{{ $requestAttributes['sizeID'] }}">
                                                            @foreach($sizes as $size)
                                                                <option value='{{ $size->id }}'>
                                                                    {{ $size->label }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <small class='form-text text-muted'>{{ __("Size") }}</small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['sizeID'] }}'></small>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-md-4'>
                                                    <div class='form-group'>
                                                        <select required class='custom-select' name='{{ $requestAttributes['classID'] }}'>
                                                            @foreach($classGroups as $classGroup)
                                                                <option value="{{ $classGroup->id }}">
                                                                    {{ $classGroup->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <small class='form-text text-muted'>{{ __("Class") }}</small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['classID'] }}'></small>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-md-4'>
                                                    <div class='form-group'>
                                                        <select required class='custom-select' name="{{ $requestAttributes['fabricID'] }}">
                                                            @foreach($fabrics as $fabric)
                                                                <option value="{{ $fabric->id }}">
                                                                    {{ $fabric->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <small class='form-text text-muted'>{{ __("Fabric") }}</small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['fabricID'] }}'></small>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-md-4'>
                                                    <div class='form-group'>
                                                        <input
                                                            name="{{ $requestAttributes['stock'] }}"
                                                            type="number"
                                                            min="0"
                                                            max="1000000"
                                                            class='form-control'
                                                            placeholder='{{ __('Stock') }}'
                                                            required
                                                        />
                                                        <small class='form-text text-muted'>{{ __("Stock") }}</small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['stock'] }}'></small>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-md-4'>
                                                    <div class='form-group'>
                                                        <div class='input-group'>
                                                            <input
                                                                name="{{ $requestAttributes['discount'] }}"
                                                                class="form-control"
                                                                type="number"
                                                                min="0"
                                                                max="100"
                                                                placeholder="{{ __('Discount') }}"
                                                                required
                                                            />
                                                            <div class='input-group-append'>
                                                                <span class='input-group-text'>%</span>
                                                            </div>
                                                        </div>
                                                        <small class='form-text text-muted'>{{ __("Discount") }}</small>
                                                        <small class='form-text text-muted' data-error-reporter='{{ $requestAttributes['discount'] }}'></small>
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