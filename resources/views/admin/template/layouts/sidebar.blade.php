        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __("Main") }}
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColors"
                    aria-expanded="true" aria-controls="collapseColors">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Colors") }}</span> 
                </a>
                <div id="collapseColors" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class='collapse-item' href='{{ route('admin.colors.index') }}'>
                            {{ __("All") }}
                        </a>
                        <a class='collapse-item' href='{{ route('admin.colors.new') }}'>
                            {{ __("New") }}
                        </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSizes"
                    aria-expanded="true" aria-controls="collapseSizes">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Sizes") }}</span>
                </a>
                <div id="collapseSizes" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class='collapse-item' href='{{ route('admin.sizes.index') }}'>
                            {{ __("All") }}
                        </a>
                        <a class='collapse-item' href='{{ route('admin.sizes.new') }}'>
                            {{ __("New") }}
                        </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFabrics"
                    aria-expanded="true" aria-controls="collapseFabrics">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Fabrics") }}</span>
                </a>
                <div id="collapseFabrics" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route("admin.fabrics.index") }}">
                            {{ __("All") }}
                        </a>
                        <a class='collapse-item' href="{{ route("admin.fabrics.new") }}">
                            {{ __("New") }}
                        </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClassGroups"
                    aria-expanded="true" aria-controls="collapseClassGroups">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Class") }}</span>
                </a>
                <div id="collapseClassGroups" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">


                        <a class='collapse-item' href='{{ route('admin.class.index') }}'>
                            {{ __("All") }}
                        </a>

                        <a class='collapse-item' href='{{ route('admin.class.new') }}'>
                            {{ __("New") }}
                        </a>

                    </div>
                </div>
            </li>

            <hr class='sidebar-divider' />
            <div class="sidebar-heading">
                {{ __("Promotion") }}
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanners"
                    aria-expanded="true" aria-controls="collapseBanners">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Banners") }}</span>
                </a>
                <div id="collapseBanners" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">


                        <a class='collapse-item' href='{{ route('admin.banners.index') }}'>
                            {{ __("All") }}
                        </a>
                        
                        <a class='collapse-item' href='{{ route('admin.banners.new') }}'>
                            {{ __("New") }}
                        </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubbanners"
                    aria-expanded="true" aria-controls="collapseSubbanners">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Subbanners") }}</span>
                </a>
                <div id="collapseSubbanners" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{ route('admin.subbanners.index') }}">
                            {{ __("All") }}
                        </a>

                        <a class='collapse-item' href='{{ route('admin.subbanners.new') }}'>
                            {{ __("New") }}
                        </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHashtags"
                    aria-expanded="true" aria-controls="collapseHashtags">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Hashtags") }}</span>
                </a>
                <div id="collapseHashtags" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class='collapse-item' href='{{ route('admin.hashtags.index') }}'>
                            {{ __("All") }}
                        </a>

                        <a class='collapse-item' href='{{ route('admin.hashtags.new') }}'>
                            {{ __("New") }}
                        </a>

                    </div>
                </div>
            </li>

            <hr class='sidebar-divider' />
            <div class="sidebar-heading">
                {{ __("Products") }}
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __("Products") }}</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route("admin.products.index") }}">
                            {{ __("All") }}
                        </a>

                        <a class="collapse-item" href="{{ route("admin.products.new") }}">
                            {{ __("New") }}
                        </a>
                        
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->