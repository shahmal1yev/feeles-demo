@extends('admin.master')

@section('title')
    {{ __('text.productStock', ['name' => $product->name]) }}
@endsection

@section('content')

    <div id='wrapper'>
        
        @include('admin.template.layouts.sidebar')

        <div id='content-wrapper' class='d-dflex flex-column'>
            <div id='content'>

                @include('admin.template.layouts.topbar')

                <div class='container-fluid'>
                    
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            {{ __("Product Stock") }}
                        </h1>
                        <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            {{ __("New") }}
                        </a>
                    </div>

                    <div class='card shadow mb-4'>
                        <div class='card-header'>
                            <h6 class='m-0 font-weight-bold text-primary'>
                                {{ $product->name }}
                            </h6>
                        </div>
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
                                                        <th>
                                                            {{ __("Color") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Size") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Class Group") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Fabric") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Stock") }}
                                                        </th>
                                                        <th>
                                                            {{ __("Operation") }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($product->details as $index => $productDetail)

                                                        <tr class='product-detail-row' data-row-id="{{ $product->id }}">
                                                            <td>
                                                                {{ $index + 1 }}
                                                            </td>
                                                            <td>
                                                                <select class='form-control form-control-sm'>
                                                                    @foreach($colors as $color)
                                                                        @if($color->id == $productDetail->colorId)
                                                                            <option selected value='{{ $color->id }}'>
                                                                                {{ $color->name }}
                                                                            </option>
                                                                        @else
                                                                            <option value='{{ $color->id }}'>
                                                                                {{ $color->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class='form-control form-control-sm'>
                                                                    @foreach($sizes as $size)
                                                                        @if($size->id == $productDetail->sizeId)
                                                                            <option selected value='{{ $size->id }}'>
                                                                                {{ $size->label }}
                                                                            </option>
                                                                        @else
                                                                            <option value='{{ $size->id }}'>
                                                                                {{ $size->label }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class='form-control form-control-sm'>
                                                                    @foreach($classGroups as $classGroup)
                                                                        @if($classGroup->id == $productDetail->classGroupId)
                                                                            <option selected value="{{ $classGroup->id }}">
                                                                                {{ $classGroup->name }}
                                                                            </option>
                                                                        @else
                                                                            <option value="{{ $classGroup->id }}">
                                                                                {{ $classGroup->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class='form-control form-control-sm'>
                                                                    @foreach($fabrics as $fabric)
                                                                        @if($fabric->id == $productDetail->fabricId)
                                                                            <option selected value="{{ $fabric->id }}">
                                                                                {{ $fabric->name }}
                                                                            </option>
                                                                        @else
                                                                            <option value="{{ $fabric->id }}">
                                                                                {{ $fabric->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    class='form-control form-control-sm' 
                                                                    type='number' 
                                                                    required 
                                                                    min='0' 
                                                                    value="{{ $productDetail->stock }}"
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

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

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

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.template.layouts.logoutModal')

@endsection