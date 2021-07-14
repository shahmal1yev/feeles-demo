@extends('admin.master')

@section('title')
    {{ __("Colors") }}
@endsection

@section("content")

    <div id='wrapper'>

        @include('admin.template.layouts.sidebar')

        <div id='content-wrapper' class='d-flex flex-column'>
            <div id='content'>


                @include('admin.template.layouts.topbar')

                <div class='container-fluid'>

                    <div class='d-flex align-item-center justify-content-between mb-4'>
                        <h1 class='h3 mb-0 text-gray-800'>
                            {{ __("Colors") }}
                        </h1>
                        <a 
                            class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            href="{{ route('admin.colors.new') }}"
                        >
                            {{ __("New") }}
                        </a>
                    </div>

                    <div class='card shadow mb-4'>
                        <div class='card-body'>

                            <div class='table-responsive'>
                                
                                <div class='dataTables_wrapper dt-bootstrap4'>

                                    <div class='row'>
                                        <div class='col-12'>

                                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                                            
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            {{ __("No") }}
                                                        </th>
                                                        <th colspan='3'>
                                                            {{ __("Adı") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Hex") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Operation") }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        
                                                    @foreach($colors as $index => $color)

                                                        <tr class='color-row' data-color-id='{{ $color->id }}'>
                                                            <td>
                                                                {{ $index + 1 }}
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    type='text'
                                                                    name="{{ $requestAttributes['azColor'] }}"
                                                                    placeholder='{{ __("English") }}'
                                                                    class='form-control form-control-sm'
                                                                    value="{{ $color->translate('az')->name }}"
                                                                    maxlength="255"
                                                                    required
                                                                />
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    type='text'
                                                                    name="{{ $requestAttributes['ruColor'] }}"
                                                                    placeholder='{{ __("Russian") }}'
                                                                    class='form-control form-control-sm'
                                                                    value="{{ $color->translate('ru')->name }}"
                                                                    maxlength="255"
                                                                    required
                                                                />
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    type='text'
                                                                    name="{{ $requestAttributes['enColor'] }}"
                                                                    placeholder='{{ __("English") }}'
                                                                    class='form-control form-control-sm'
                                                                    value="{{ $color->translate('en')->name }}"
                                                                    maxlength="255"
                                                                    required
                                                                />
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type='color'
                                                                    name="{{ $requestAttributes['hex'] }}"
                                                                    class='form-control form-control-sm'
                                                                    value="{{ $color->hex }}"
                                                                    required
                                                                />
                                                            </td>
                                                            <td class='text-center'>
                                                                <button class='save-button btn btn-sm btn-primary save-icon'>
                                                                </button>
                                                                <button class='delete-button btn btn-sm btn-danger trash-icon'>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                </tbody>

                                            </table>

                                        </div>
                                    </div>

                                    {{ $colors->links('admin.template.layouts.pagination') }}

                                </div>

                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection