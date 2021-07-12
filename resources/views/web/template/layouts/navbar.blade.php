<nav class="fl-navigation-navbar navbar navbar-expand-lg navbar-light bg-white p-0">
	<ul class="fl-navigation-list navbar-nav w-100 justify-content-center">
		
		@foreach($menu as $menuItem)
			@if($menuItem->dropdown)
				<li class='nav-item fl-dropdown-item p-0 m-0'>
					<span class='nav-link p-0 m-0' data-text='{{ $menuItem->label }}'>
						{{ $menuItem->label }}
						<div class='divider'></div>
					</span>
					<div class='dropdown-content shadow-sm'>
						<div class='dropdown-grid'>
							@foreach($menuItem->titles as $dropdownGroupTitle)
								<div class='item'>
									<h6 class='fw-bold mb-3'>{{ $dropdownGroupTitle->title }}</h6>
									<ul class='list-group fl-dropdown-list'>
										@foreach($dropdownGroupTitle->group as $dropdownItem)
											<li class='fl-dropdown-list-item'>
												<a class='fl-dropdown-link nav-link p-0 m-0' href='{{ $dropdownItem->link }}'>
													{{ $dropdownItem->label }}
												</a>
											</li>
										@endforeach
									</ul>
								</div>
							@endforeach
						</div>
					</div>
				</li>
			@else
				<li class='nav-item p-0 m-0'>
					<a href='{{ $menuItem->link }}' class='nav-link p-0 m-0' data-text='{{ $menuItem->label }}'>
						{{ $menuItem->label }}
						<div class='divider'></div>
					</a>
				</li>
			@endif
		@endforeach

	</ul>
</nav>