const toastifyOptions = {
    position: 'right',
    gravity: 'bottom',
    duration: 3000,
    className: 'shadow',
    backgroundColor: '#198754',
}

const swiperProductsOption = {
	pagination: {
		el: '.swiper-custom-pagination',
		type: 'bullets',
		clickable: true
	},
	autoplay: {
		delay: 1500,
		disableOnInteraction: false,
	},
	slidesPerView: 4,
	spaceBetween: 0,
	breakpoints: {
		1200: {
			slidesPerView: 5
		},

		992: {
			slidesPerView: 4
		},

		768: {
			slidesPerView: 3
		},

		576: {
			slidesPerView: 2
		},

		0: {
			slidesPerView: 2
		}
	}
};

export {
    toastifyOptions,
    swiperProductsOption
}