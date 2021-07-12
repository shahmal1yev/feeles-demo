<div class='filter-container p-0 mb-4 m-0'>
	

	<div class='filter-item'>
		
		<h6 class='header'>
			{{ __("Price") }}
		</h6>

		<div class='filter-content'>
			<div class='py-2 px-4 p-0 m-0'>

				<div class="input-group">
					<span class="input-group-text manat-icon bg-white rounded-0"></span>
					<input id='filterMinPrice' type="text" placeholder="min" class="form-control shadow-none rounded-0" />
				</div>

			</div>
			<div class='py-2 px-4 p-0 m-0'>

				<div class="input-group">
					<span class="input-group-text manat-icon bg-white rounded-0"></span>
					<input id='filterMaxPrice' type="text" placeholder="max" class="form-control shadow-none rounded-0" />
				</div>

			</div>
		</div>

	</div>

	<div class='filter-item'>
		<h6 class='header'>
			{{ __("Class") }}
		</h6>

		<div class='filter-content'>

			<div id='filterClassChooser' class='choose-option mt-4'>
				
				@foreach($classGroups as $classGroup)
					<div class='d-block m-2 custom-checkbox' data-id='{{ $classGroup->id }}'>
						<div class='content'>
							<span class='label'>{{ $classGroup->name }}</span>
							<span class='badge'>{{ $classGroup->products->count() }}</span>
						</div>
						<span class='checkmark'></span>
					</div>
				@endforeach

			</div>
		</div>

	</div>

	<div class='filter-item'>
		<h6 class='header'>
			{{ __("Category") }}
		</h6>

		<div class='filter-content'>
			<div id='filterCategoryChooser' class='choose-option mt-4'>

				@foreach($categories as $category)

					<div class='d-block m-2 custom-checkbox' data-id='{{ $category->id }}'>
						<div class='content'>
							<span class='label'>{{ $category->name }}</span>
							<span class='badge'>{{ $category->products->count() }}</span>
						</div>
						<span class='checkmark'></span>
					</div>

				@endforeach

			</div>
		</div>

	</div>

	<div class='filter-item'>
		<h6 class='header'>
			{{ __("Fabric") }}
		</h6>


		<div class='filter-content'>
			<div id='filterFabricChooser' class='choose-option mt-4'>


				@foreach($fabrics as $fabric)
					<div class='d-block m-2 custom-checkbox' data-id="{{ $fabric->id }}">
						<div class='content'>
							<span class='label'>{{ $fabric->name }}</span>
							<span class='badge'>{{ $fabric->products->count() }}</span>
						</div>
						<span class='checkmark'></span>
					</div>
				@endforeach

			</div>
		</div>

	</div>

	

	<div class='filter-item'>
		
		<h6 class='header'>
			{{ __("Size") }}
		</h6>

		<div class='filter-content'>

			<div id='filterSizeChooser' class='choose-size mt-2'>

				@foreach($sizes as $size)
					<div class='size-option' data-size="{{ $size->id }}">
						<div 
							class='content' 
							data-size-text='{{ $size->label }}'
							data-bs-toggle='tooltip'
							title='{{ $size->number }}'
						>
						</div>
					</div>
				@endforeach

			</div>

		</div>

	</div>

	<div class='filter-item'>

		<h6 class='header'>
			{{ __("Color") }}
		</h6>
		
		<div class='filter-content'>

			<div id='filterColorChooser' class='choose-color mt-2'>

				@foreach($colors as $color)
					<div 
						class='color-option'
						data-color='{{ $color->id }}'
						data-bs-toggle='tooltip'
						title='{{ $color->name }}'
					>
						<div
							class='content'
							style='background-color: {{ $color->hex }}'
						>
						</div>
					</div>
				@endforeach

			</div>

		</div>

	</div>

</div>