<section id='navbarSection' class='fl-nav-section bg-white shadow-sm py-2 py-lg-0' data-aos='fade-up'>
				
    <div class='container-fluid'>

        <div class='navbar-grid'>
            <div class='navbar-grid-item'>
                <div class='mx-2 d-flex align-items-center'>
                    <div id='menuSidebarOpener' class='d-inline-block d-lg-none menu-bar me-2'>
                        <div class='item'></div>
                        <div class='item'></div>
                        <div class='item'></div>
                    </div>
                    <a class="p-0 m-0" href='#'>
                        <img src="{{ asset('/assets/logo/logo-black.png') }}" class='align-middle' height="30">
                    </a>
                </div>
            </div>
            <div class='navbar-grid-item d-none d-lg-block'>
                @include('web.template.layouts.navbar')
            </div>
            <div class='navbar-grid-item text-end'>
                <ul class="navbar-nav flex-row align-items-center justify-content-end w-100">

                      <li class="nav-item mx-3">
                      <a href='#filterSidebar' class="nav-link p-0">
                          <span class='heart-icon'></span>
                        <span class='badge bg-danger rounded-circle bookmark-counter'>0</span>
                      </a>
                    </li>
                    <li class="nav-item mx-3">
                      <a href='#filterSidebar' class="nav-link p-0">
                          <span class='basket-icon'></span>
                          <span class='badge bg-danger rounded-circle'>0</span>
                      </a>
                    </li>
                    <li class="nav-item d-none d-md-block mx-3">
                      <a title='Filter' href='/mehsullar' id='scrollToFilter' class="nav-link p-0">
                          <span class='search-icon'></span>
                      </a>
                    </li>
                    <li class="nav-item d-block d-md-none mx-3">
                      <a href='/mehsullar' id='filterSidebarOpener' class="nav-link p-0">
                          <span class='search-icon'></span>
                      </a>
                    </li>
                    <li class="d-none d-sm-block nav-item mx-0 dropdown p-0 m-0">
                      <div class="dropdown">
                          <a class="btn dropdown-toggle shadow-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class='globe-icon'></span>
                          </a>

                          <ul style='min-width: 0; max-width: 4rem;' class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src='/assets/flags/azerbaijan.png' width='24px' />
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src='/assets/flags/russia.png' width='24px' />
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src='/assets/flags/united-kingdom.png' width='24px' />
                                </a>
                            </li>
                          </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</section>