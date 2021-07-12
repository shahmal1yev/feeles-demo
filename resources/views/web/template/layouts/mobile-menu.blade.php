<div id='menuSidebar' class='d-md-none sidebar-menu'>
	<div class='content'>

		<header class='sb-header main-navbar justify-content-end d-md-none px-3 p-2 bg-dark-blue'>
	
			<div class='navbar-right p-0 m-0'>
				<div id='menuSidebarCloser' class='close-icon text-white'></div>
			</div>

		</header>

		<main id='menuMain' class='p-0 m-0 accordion-navbar'>

			<div class="accordion accordion-flush">

                @foreach($menu as $menuItem)

                    @if($menuItem->dropdown)
                        @php
                            $dropdownID = uniqid();
                            $dropdownID = "dropdown-$dropdownID";
                        @endphp

                        <div class='accordion-item'>
                            <h2 class='accordion-header'>
                                <a 
                                    class='accordion-button collapsed'
                                    data-bs-toggle='collapse'
                                    data-bs-target='#{{ $dropdownID }}'
                                    href="{{ $menuItem->link }}"
                                >
                                    {{ $menuItem->label }}
                                </a>
                            </h2>
                            <div id='{{ $dropdownID }}' class='accordion-collapse collapse'>
                                <div class='accordion-body'>
                                    <ul class='list-group list-group-flush'>

                                        @foreach($menuItem->dropdownItems as $dropdownItem)

                                            <li class='list-group-item'>
                                                <a class='link' href='{{ $dropdownItem->link }}'>
                                                    {{ $dropdownItem->label }}
                                                </a>
                                            </li>

                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class='accordion-item'>
                            <h2 class='accordion-header'>
                                <a class='accordion-button link collapsed' href='{{ $menuItem->link }}'>
                                    {{ $menuItem->label }}
                                </a>
                            </h2>
                        </div>
                    @endif

                @endforeach

			</div>

		</main>

	</div>

</div>