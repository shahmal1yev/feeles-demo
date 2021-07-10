import * as Helper from './helpers.js';
import * as Constant from './constants.js';
import * as Constructor from './constructors.js';

Array.prototype.remove = function(index) {
	if (this[index]) {
		this.splice(index, 1);
	}

	return this;
};

(function() {
	if (!Helper.getElement('filterSidebar')) {
		return;
	}

	new Constructor.Filter();

	// [
	// 	['minPrice', '#filterMinPrice', Constructor.NumberInput, [0, null, 10000]],
	// 	['maxPrice', '#filterMaxPrice', Constructor.NumberInput, [0, null, 10000]],
	// 	['color', '#filterColorChooser', Constructor.ColorChooser, 'active', ['1', '2', '3', '4']],
	// 	['size', '#filterSizeChooser', Constructor.SizeChooser, 'active', ['1', '3', '5']],
	// 	['category', '#filterCategoryChooser', Constructor.CheckboxGroup, 'active'],
	// 	['class', '#filterClassChooser', Constructor.CheckboxGroup, 'active', ['1', '2', '3']],
	// 	['fabric', '#filterFabricChooser', Constructor.CheckboxGroup, 'active']
	// ]
})();

(function() {

	$('.product-card').each(function() {
		new Constructor.ProductCard(this);
	});

})();

{
	let element;
	
	if (element = Helper.getElement('productLightSlider'))
	{
		let id = element.id;

		$(element).lightSlider({
			gallery: true,
			item: 2,
			loop:true,
			slideMargin: 0,
			thumbItem: 9,
			enableDrag: false,
			onSliderLoad: function(element) {
				element.lightGallery({
					selector: `#${id} .image-slide-item`
				});
			}
		});
	}
}

(function() {
	
	$('.fl-dropdown-item').hover(function(){
		$('.fl-menu-shadow').addClass('active');
		// Helper.turnOffScrolling();
	}, function(){
		$('.fl-menu-shadow').removeClass('active');
		// Helper.turnOnScrolling();
	});
	
})();

(function() {
	let navbar, orderSummary;
	if (navbar = Helper.getElement('navbarSection'))
	{
		if (orderSummary = Helper.getElement('orderSummary'))
		{
			$(orderSummary).css('top', ''.concat(parseInt($(navbar).css('height')) + 20, 'px'));
		}
	}
})();

(function() {
	
	// let navbarSectionHeight = $('#navbarSection').css('height');

	// $('#filterSidebar').css('top', navbarSectionHeight);

	new Constructor.ScrollToTarget(Helper.getElement('scrollToFilter'), true, {
		target: Helper.getElement('filterSidebar'),
		area: Helper.getElement('filterMain'),
		color: '#e5e5e5',
		// tonsil: +navbarSectionHeight.replace(/\D/g,'')
	});

})();



let bestSellerSwiper = new Swiper('.swiper-best-seller-container', Constant.swiperProductsOption);
let mostViewedSwiper = new Swiper('.swiper-most-popular-container', Constant.swiperProductsOption);

new Constructor.Sidebar(
	'menuSidebar',
	'menuSidebarOpener',
	'menuSidebarCloser',
	'active'
);

new Constructor.Sidebar(
	'filterSidebar',
	'filterSidebarOpener',
	'filterSidebarCloser',
	'active'
);