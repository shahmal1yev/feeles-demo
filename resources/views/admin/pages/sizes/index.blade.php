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
                            {{ __("Sizes") }}
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

                                <div class='daTables_wrapper dt-bootstrap4'>
                                    <div class='row'>

                                        <div class='col-12'>

                                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                                                
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            {{ __("No") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Label") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Number") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Operation") }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($sizes as $index => $size)

                                                        <tr class='size-row' data-size-id='{{ $size->id }}'>
                                                            <td>
                                                                {{ $index + 1 }}
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type='text'
                                                                    name='{{ $requestAttributes['label'] }}'
                                                                    placeholder='{{ __("Label") }}'
                                                                    class='form-control form-control-sm'
                                                                    value='{{ $size->label }}'
                                                                    maxlength="255"
                                                                    required
                                                                />
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type='number'
                                                                    name='{{ $requestAttributes['number'] }}'
                                                                    placeholder='{{ __("Number") }}'
                                                                    class='form-control form-control-sm'
                                                                    value='{{ $size->number }}'
                                                                    maxlength="255"
                                                                    required
                                                                />
                                                            </td>
                                                            <td class='text-center'>
                                                                <button class='save-button btn btn-sm btn-primary save-icon'></button>
                                                                <button class='delete-button btn btn-sm btn-danger trash-icon'></button>
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    {{ $sizes->links('admin.template.layouts.pagination') }}

                                </div>

                            </div>
                        </div>

                    </div>
                    
                </div>
          
            </div>
        </div>
    </div>