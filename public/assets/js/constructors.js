import * as Helper from './helpers.js';

let bookmarks = {};

function Filter(
	filter = '#filterSidebar', 

	filterArguments = {
		section: '#filterResultSection',
		container: '#filterResult',
		stopper: '#filterStopper',
	}
) {
	this.filter = $(filter);
	this.resultSection  = $(filterArguments.section);
	this.resultContainer = $(filterArguments.container);
	this.filterStopper   = $(filterArguments.stopper);

	if (!this.filter.length || !this.resultSection.length) {
		throw 'Constructor.Filter: Filter or result container is not available. Execution has been aborted.';
	}

	this.queryObject   	  = new URLSearchParams();

	this.loadingStatus 	  = false;
	this.stopFilter       = false;
	this.loadPermission   = true;
	this.data 			  = [];

	this.requestPage      = 1;
	this.lengthOfData 	  = 20;

	this.pageKey = 'page';
	this.lengthOfDataKey = 'dataLength';

	this.queryStringBuilder = function() {

		if (this.queryObject.toString())
		{
			this.queryObject.set(this.pageKey, this.requestPage);
			this.queryObject.set(this.lengthOfDataKey, this.lengthOfData);
		}

		return this.queryObject.toString();
	};

	this.reset = function() {
		this.filterStopper.removeClass('d-none');

		$(document)
		.scrollTop(this.resultSection.offset().top)
		.find(this.resultContainer)
		.scrollTop(0);

		this.resultContainer.empty();

		this.data = [];
		this.requestPage = 1;
	};

	this.callback = function(key, values) {
		this.reset();

		this.queryPiece = [key, values];
		this.loading = true;
	};

	Object.defineProperty(this, 'queryPiece', {
		set(piece) {
			let [key, value] = piece;

			value = value || "";

			if (value.toString()) {
				if (Array.isArray(value))
				{
					this.queryObject.delete(key);

					for(let arrayItem of value)
					{
						this.queryObject.append(key, arrayItem)
					}
				}
				else
				{
					this.queryObject.set(key, value);
				}
			} else {
				this.queryObject.delete(key);
			}
		}
	});

	Object.defineProperty(this, 'loading', {
		set(bool) {
			this.loadingStatus = bool;
			
			this.showStatus();
			this.setInfiniteScroll();

			if (this.loadingStatus) {
				this.loadData();
			}
		}
	});

	this.showStatus = function() {
		if (this.loadingStatus) {
			this.resultSection
			.find('#filterLoading')
			.addClass('active')
		} else {
			this.resultSection
			.find('#filterHeader, #filterResult')
			.removeClass('d-none')
			.siblings('#filterLoading')
			.removeClass('active');
		}
	}

	this.setInfiniteScroll = function() {
		$(window).scroll(() => {

			let windowScrolled = $(window).scrollTop();
			let sectionEnd     = $(this.resultContainer).offset().top + $(this.resultContainer).height();

			let displayHeight  = $(window).height();

			if ( (sectionEnd - windowScrolled) <= displayHeight ) {
				
				if (!this.loadingStatus && this.loadPermission && !this.stopFilter){
					this.loading = true;
				}

			}

		});
	}

	this.changeLoadPermission = function() {
		if (this.lengthOfData > this.data.length) {
			this.loadPermission = false;
		} else {
			this.loadPermission = true;
		}

		return this;
	}

	this.showProducts = function(){
		for (let product of this.data) {
			new ProductCard(null, {
				data: product,
				container: this.resultContainer
			});
		}		

		return this;
	}

	Object.defineProperty(this, 'setData', {
		set(data) {
			this.data = data;
			this.showProducts();
		}
	});

	this.updateAddressBar = function() {
		window.history.pushState(
			{},
			'',
			location.pathname.concat(this.queryString)
		);
	}

	this.loadData = function() {
		if (this.loadPermission) {
			axios({
				method: 'GET',
				baseURL: 'https://my-json-server.typicode.com/shahmal1yev/feeles',
				url: '/products',
			})
			.then(response => {
				this.setData = response.data;
			})
			.catch(error => {
				console.log(error);
				console.log('unknown error occured...');
			})
			.finally(() => {
				this.changeLoadPermission();
				this.updateAddressBar();
				this.loading = false;
				this.requestPage++;
			});
		}
	}

	Object.defineProperty(this, 'queryString', {
		get() {
			return '?'.concat(this.queryStringBuilder())
		}
	});

	this.filterStopper.click(function() {
		if (this.stopFilter) {
			this.stopFilter = false;
			this.loading = true;

			this.filterStopper
			.removeClass('lock-icon')
			.addClass('unlock-icon');
		} else {
			this.stopFilter = true;

			this.filterStopper
			.removeClass('unlock-icon')
			.addClass('lock-icon');
		}
	}.bind(this));


	(() => {

		let params = new URLSearchParams(window.location.search);

		let assets = {
			minPrice: {
				key: 'minPrice',
				hash: '#filterMinPrice',
			},
			maxPrice: {
				key: 'maxPrice',
				hash: '#filterMaxPrice'
			},
			colorChooser: {
				key: 'color[]',
				hash: '#filterColorChooser'
			},
			sizeChooser: {
				key: 'size[]',
				hash: '#filterSizeChooser'
			},
			classChooser: {
				key: 'class[]',
				hash: '#filterClassChooser'
			},
			fabricChooser: {
				key: 'fabric[]',
				hash: '#filterFabricChooser'
			},
			categoryChooser: {
				key: 'category[]',
				hash: '#filterCategoryChooser'
			}
		}

		new NumberInput(
			assets.minPrice.hash, 
			this.callback.bind(this, assets.minPrice.key), 
			[0, params.get(assets.minPrice.key), 10000]
		);

		this.queryPiece = [assets.minPrice.key, params.get(assets.minPrice.key)];

		new NumberInput(
			assets.maxPrice.hash, 
			this.callback.bind(this, assets.maxPrice.key), 
			[0, params.get(assets.maxPrice.key), 10000]
		);

		this.queryPiece = [assets.maxPrice.key, params.get(assets.maxPrice.key)];

		new ColorChooser(
			assets.colorChooser.hash,
			this.callback.bind(this, assets.colorChooser.key),
			'active',
			params.getAll(assets.colorChooser.key)
		);

		this.queryPiece = [assets.colorChooser.key, params.getAll(assets.colorChooser.key)];

		new SizeChooser(
			assets.sizeChooser.hash,
			this.callback.bind(this, assets.sizeChooser.key),
			'active',
			params.getAll(assets.sizeChooser.key)
		);

		this.queryPiece = [assets.sizeChooser.key, params.getAll(assets.sizeChooser.key)];

		new CheckboxGroup(
			assets.classChooser.hash,
			this.callback.bind(this, assets.classChooser.key),
			'active',
			params.getAll(assets.classChooser.key)
		);

		this.queryPiece = [assets.classChooser.key, params.getAll(assets.classChooser.key)];

		new CheckboxGroup(
			assets.categoryChooser.hash,
			this.callback.bind(this, assets.categoryChooser.key),
			'active',
			params.getAll(assets.categoryChooser.key)
		);

		this.queryPiece = [assets.categoryChooser.key, params.getAll(assets.categoryChooser.key)];

		new CheckboxGroup(
			assets.fabricChooser.hash,
			this.callback.bind(this, assets.fabricChooser.key),
			'active',
			params.getAll(assets.fabricChooser.key)
		);

		this.queryPiece = [assets.fabricChooser.key, params.getAll(assets.fabricChooser.key)];


		if (params.has(this.pageKey))
		{
			this.requestPage = (parseInt(params.get(this.pageKey)) > 0) ? params.get(this.pageKey) : 1;
		}

		if (this.queryObject.toString())
		{	

			this.resultSection
			.find('#filterLoading')
			.addClass('active')

			Helper.turnOffScrolling();
			$('#loadingSpinnerContainer').removeClass('invisible');

			this.setInfiniteScroll();

			axios({
				method: 'GET',
				baseURL: 'https://my-json-server.typicode.com/shahmal1yev/feeles/products',
			})
			.then((response) => {

				this.setData = response.data;
			})
			.catch(error => {
				console.error(error);
			})
			.finally(() => {
				this.loadingStatus = false;
				
				this.changeLoadPermission();
					
				Helper.turnOnScrolling();
				$('#loadingSpinnerContainer').addClass('invisible');

				this.requestPage++;

				$(document)
				.scrollTop(this.resultSection.offset().top)
				.find(this.resultContainer)
				.scrollTop(0);

				this.filterStopper.removeClass('d-none');

				this.resultSection
				.find('#filterHeader, #filterResult')
				.removeClass('d-none')
				.siblings('#filterLoading')
				.removeClass('active');
			});
		}


	})();
}

function NumberInput(
	input = '#numberInput',
	callback = () => {},
	args = []
) {
	this.input = $(input);
	this.callback = callback;

	this.min 	= args[0] || 0;
	this.value 	= args[1] || null;
	this.max 	= args[2] || null;

	this.oldValue = null;
	this.currentval = () => this.input.val();

	this.show = value => this.input.val(value);

	Object.defineProperty(this, 'inputValue', {
		set(value) {
			this.value = value;
			this.callback(value);
		}
	});

	this.input
	.click(e => e.preventDefault())
	.focus(() => this.oldValue = this.value)
	.change(() => {

		if (!this.currentval() == '') {
			if (!isFinite(+this.currentval())) {
				this.show(this.oldValue);

				return;
			}

			if (+this.currentval() < this.min) {
				this.show(this.oldValue);

				return;
			}

			if (this.max) {
				if (+this.currentval() > this.max) {
					this.show(this.oldValue);

					return;
				}
			}

			this.inputValue = +this.currentval();

			return;
		}

		this.inputValue = null;
	});

	for(let event of ['input', 'keyup', 'keydown']) {
		this.input[0]
		.addEventListener(event, function(e) {
			if (/^\d*\.?\d*$/.test(e.target.value)) {
				this.oldValue = e.target.value;
			} else if ('oldValue' in this) {
				this.value = this.oldValue
			} else {
				this.value = '';
			}
		});
	}

	this.show(this.value);
}

function ColorChooser(
	container = '#colorChooser',
	callback = () => {},
	activeClass = 'active',
	actives = '',
	multiple = true
) {
	this.activeClass = activeClass || 'active';
	this.callback = callback;
	this.multiple = multiple;
	this.actives = actives;

	this.selectedValues = this.multiple ? new Set : null;

	this.availableValues = new Map(
		Array.from($(container).children())
		.map(element => [element.dataset.color, element])
	);

	this.isAvailable = function(key) {
		return this.availableValues.has(key);
	}

	this.isSelected = function(key) {
		if (this.multiple) {
			return this.selectedValues.has(key);
		}
	}

	this.select = function(key) {
		if (this.isAvailable(key)) {
			if (this.multiple) {
				this.selectedValues.add(key);
			} else {
				this.selectedValues = key;
			}

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.remove = function(key) {
		if (this.multiple) {
			this.selectedValues.delete(key);

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.markFalse = function(key) {
		
		if (this.isAvailable(key)) {

			$(this.availableValues.get(key))
			.removeClass(this.activeClass);

		} else {

			$(this.elements)
			.removeClass(this.activeClass);

		}

		return this;
	}

	this.mark = function(key) {
		if (this.isAvailable(key)) {
			
			$(this.availableValues.get(key))
			.addClass(this.activeClass);
		}

		return this;
	}

	Object.defineProperty(this, 'elements', {
		get() {
			return Array.from(this.availableValues.values());
		}
	});

	Object.defineProperty(this, 'values', {
		get() {
			if (this.selectedValues instanceof Set) {
				return Array.from(this.selectedValues.values());
			}

			return this.selectedValues;
		}
	});

	for (let item of this.availableValues) {
		let [key, element] = item;

		console.log(item);

		$(element).click(e => {
			e.preventDefault();

			
			if (this.multiple) {
				if (this.isSelected(key)) {
					this.remove(key);
					this.markFalse(key);
				} else {
					this.select(key);
					this.mark(key);
				}
			} else {
				this.select(key);
				this.markFalse();
				this.mark(key);
			}
		});

		if ($(element).hasClass('active')) {
			this.select(key);
			this.mark(key);
		}
	}

	if (Array.isArray(this.actives))
	{
		for (let key of this.actives)
		{
			if (this.isAvailable(key))
			{
				this.selectedValues.add(key);
				this.mark(key);
			}
		}
	}
	else
	{
		if (this.isAvailable(this.actives))
		{
			this.selectedValues = this.actives;
			this.mark(this.actives)			
		}
	}
}

function SizeChooser(
	container = '#sizeChooser',
	callback = () => {},
	activeClass = 'active',
	actives = '',
	multiple = true
) {
	this.activeClass = activeClass || 'active';
	this.callback = callback;
	this.multiple = multiple;
	this.actives = actives;

	this.selectedValues = this.multiple ? new Set : null;

	this.availableValues = new Map(
		Array.from($(container).children())
		.map(element => [element.dataset.size, element])
	);

	this.isAvailable = function(key) {
		return this.availableValues.has(key);
	}

	this.isSelected = function(key) {
		if (this.multiple) {
			return this.selectedValues.has(key);
		}
	}

	this.select = function(key) {
		if (this.isAvailable(key)) {
			if (this.multiple) {
				this.selectedValues.add(key);
			} else {
				this.selectedValues = key;
			}

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.remove = function(key) {
		if (this.multiple) {
			this.selectedValues.delete(key);

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.markFalse = function(key) {
		
		if (this.isAvailable(key)) {

			$(this.availableValues.get(key))
			.children()
			.removeClass(this.activeClass);

		} else {

			$(this.elements)
			.children()
			.removeClass(this.activeClass);

		}

		return this;
	}

	this.mark = function(key) {
		if (this.isAvailable(key)) {
			
			$(this.availableValues.get(key))
			.children()
			.addClass(this.activeClass);
		}

		return this;
	}

	Object.defineProperty(this, 'elements', {
		get() {
			return Array.from(this.availableValues.values());
		}
	});

	Object.defineProperty(this, 'values', {
		get() {
			if (this.selectedValues instanceof Set) {
				return Array.from(this.selectedValues.values());
			}

			return this.selectedValues;
		}
	});

	for (let item of this.availableValues) {
		let [key, element] = item;

		$(element).click(e => {
			e.preventDefault();

			if (this.multiple) {
				if (this.isSelected(key)) {
					this.remove(key);
					this.markFalse(key);
				} else {
					this.select(key);
					this.mark(key);
				}
			} else {
				this.select(key);
				this.markFalse();
				this.mark(key);
			}
		});

		if ($(element).children().hasClass('active')) {
			this.select(key);
			this.mark(key);
		}
	}

	if (Array.isArray(this.actives))
	{
		for (let key of this.actives)
		{
			if (this.isAvailable(key))
			{
				this.selectedValues.add(key);
				this.mark(key);
			}
		}
	}
	else
	{
		if (this.isAvailable(this.actives))
		{
			this.selectedValues = this.actives;
			this.mark(this.actives)			
		}
	}
}

function CheckboxGroup(
	container = '#checkboxGroup',
	callback = () => {},
	activeClass = 'active',
	actives = '',
	multiple = true
) {

	this.activeClass = activeClass;
	this.callback = callback;
	this.multiple = multiple;
	this.actives = actives;

	this.selectedValues = this.multiple ? new Set : null;

	this.availableValues = new Map(Array.from($(container).children()).map(element => [element.dataset.id, element]));

	this.isAvailable = function(key) {
		if (this.multiple) {
			if (this.availableValues.has(key)) {
				return true;
			}
		}

		return false;
	}

	this.isSelected = function(key) {
		if (this.multiple) {
			if (this.selectedValues.has(key)) {
				return true;
			}
		} else {
			if (this.selectedValues == key) {
				return true;
			}
		}

		return false;
	}

	this.select = function(key) {
		if (this.isAvailable(key)) {
			if (this.multiple) {
				this.selectedValues.add(key);
			} else {
				this.selectedValues = key;
			}

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.remove = function(key) {
		if (this.multiple) {
			this.selectedValues.delete(key);

			this.callback(this.values.length ? this.values : null);
		}

		return this;
	}

	this.markFalse = function(key) {
		if (this.isAvailable(key)) {
			$(this.availableValues.get(key)).removeClass(this.activeClass);
		} else {
			$(this.elements).removeClass(this.activeClass);
		}

		return this;
	}

	this.mark = function(key) {
		if (this.isAvailable(key)) {
			$(this.availableValues.get(key)).addClass(this.activeClass);
		}

		return this;
	}

	Object.defineProperty(this, 'elements', {
		get() {
			return Array.from(this.availableValues.values());
		}
	});

	Object.defineProperty(this, 'values', {
		get() {
			if (this.selectedValues instanceof Set) {
				return Array.from(this.selectedValues.values());
			}

			return this.selectedValues;
		}
	});


	for(let item of this.availableValues) {
		let [key, element] = item;

		$(element).click(e => {
			e.preventDefault();

			if (this.multiple) {
				if (this.isSelected(key)) {
					this.markFalse(key).remove(key);
				} else {
					this.mark(key).select(key);
				}
			} else {
				this.markFalse().mark(key).select(key);
			}
		});

		if ($(element).hasClass(this.activeClass)) {
			if (this.multiple) {
				this.mark(key).select(key);
			} else {
				this.markFalse().mark(key).select(key);
			}
		}
	}

	if (Array.isArray(this.actives))
	{
		for (let key of this.actives)
		{
			if (this.isAvailable(key))
			{
				this.selectedValues.add(key);
				this.mark(key);
			}
		}
	}
	else
	{
		if (this.isAvailable(this.actives))
		{
			this.selectedValues = this.actives;
			this.mark(this.actives)			
		}
	}
}

function ProductCard(card, obj = null) {
	if ( obj ) {

		this.card = $(tmpl('productCard', obj.data)).appendTo(obj.container);
		this.productID = obj.data.id;

	} else {

		this.card = $(card);
		this.productID = this.card.data().id;
		
	}

	this.bookmark = new BookmarkTrigger(this.productID, this.card.find('.bookmark-button'), 'data-id', 'bookmark-button');
}

function BookmarkTrigger(productID, trigger, productCardIDAttr, bookmarkBtnClassName) {
	this.productID = productID;
	this.trigger = $(trigger);
	this.activeClass = 'active';
	
	this.productCardsSelector = ''.concat("[", productCardIDAttr, "='", this.productID, "'", "]");
	this.bookmarkBtnSelector = '.'.concat(bookmarkBtnClassName);

	this.__proto__ = new BookmarkController(this.productID);

	this.activate = function() {
		$(this.productCardsSelector).find(this.bookmarkBtnSelector).addClass(this.activeClass);
	};

	this.deactivate = function label() {
		$(this.productCardsSelector).find(this.bookmarkBtnSelector).removeClass(this.activeClass);
	};

	this.trigger.bind('click', {self: this}, function label(s) {
		let self;

		if (this == null) {
			self = s;
		} else {
			self = s.data.self;
			s.preventDefault();
		}

		if (self.isAvailable()) {
			if (this == null)
				self.activate();
			else
				self.remove(self.deactivate.bind(self));
		} else {
			if (this == null)
				self.deactivate();
			else
				self.add(self.activate.bind(self));
		}

		return label;
	}.call(null, this));
}

function BookmarkController(id, counterClassName = '.bookmark-counter') {
	this.productID = id;
	this.cookieArrayKey = 'bookmarks';
	this.cookieKey = this.cookieArrayKey.concat('[', this.productID, ']');
	this.cookieExpirationDays = 90;

	this.countShower = $(counterClassName);

	this.isAvailable = function() { 
		if (Helper.getCookie(this.cookieKey)) {
			return true;
		}

		return false;
	}

	this.add = function(callback = () => {}) {
		Helper.setCookie(
			this.cookieKey,
			this.productID,
			this.cookieExpirationDays
		);
		callback();
		this.counter();
	}

	this.remove = function(callback = () => {}) {
		Helper.removeCookie(
			this.cookieKey
		);
		callback();
		this.counter();
	}

	this.counter = function() {
		this.countShower.text(Helper.getCookie('bookmarks', true).length);
	}

	this.counter();
}

function ScrollToTarget(trigger, mark = false, markOptions = {})
{
	this.trigger = trigger;
	
	this.mark = {
		request: mark,
		assets: markOptions
	}

	if (!$(this.mark.assets.target).length)
	{
		throw 'Target element is not available';
	}

	this.toMark = () => {
		let defaultBackground = $(this.mark.assets.area).css('background-color');

		$(this.mark.assets.area).css('background-color', this.mark.assets.color);

		setTimeout(() => {
			$(this.mark.assets.area).css('background-color', defaultBackground);
			$(window).unbind('scroll.scrollToTarget');
		}, 300);
	}

	let func;

	$(this.trigger).click((func = (e) => {
		
		if (e)
			if (e.type == 'click')
				e.preventDefault();

		if ($(window).scrollTop() == this.mark.assets.target.offsetTop)
		{
			this.toMark();
		}

		$(window).bind('scroll.scrollToTarget', () => {
			if (this.mark.request)
			{
				if ($(window).scrollTop() == this.mark.assets.target.offsetTop)
				{
					this.toMark();
				}
			}
			else
			{
				$(window).unbind('scroll.scrollToTarget');
			}
		})

		if (e)
			$(window).scrollTop(this.mark.assets.target.offsetTop);

		return func;
	})());
}

function Sidebar(sidebarID, openerID, closerID, activeClass) {
	this.sidebarSelector = '#'.concat(sidebarID);
	this.openerSelector  = '#'.concat(openerID);
	this.closerSelector  = '#'.concat(closerID);

	this.sidebar = $(this.sidebarSelector);
	this.opener = $(this.openerSelector);
	this.closer = $(this.closerSelector);
	this.activeClass = activeClass;

	this.open = function() {
		Helper.turnOffScrolling();
		this.sidebar.addClass(this.activeClass);
	}

	this.close = function() {
		Helper.turnOnScrolling();
		this.sidebar.removeClass(this.activeClass);
	}

	this.isActive = function() {
		if (this.sidebar.hasClass(this.activeClass)) {
			return true;
		}
			
		return false;
	}

	this.clickInSidebar = function(e) {
		if ( e.target.matches(''.concat(this.sidebarSelector, ' *')) ) {
			return true;
		}

		return false;
	}

	this.isCloser = function(e) {
		if ( e.target.matches(''.concat(this.closerSelector, ', ', this.closerSelector, ' *')) ) {
			return true;
		}

		return false;
	}

	this.isOpener = function(e) {
		if ( e.target.matches(''.concat(this.openerSelector, ', ', this.openerSelector, ' *')) ) {
			return true;
		}

		return false;
	}

	$(document)
	.click((function(e) {

		if (this.isActive()) {
			if ( !this.clickInSidebar(e) || this.isCloser(e) ) {
				this.close();
			}
		} else {
			if ( this.isOpener(e) ) {
				e.preventDefault();
				this.open();
			}
		}

	}).bind(this))
	
	.keyup(function(e) {
		
		if (!this.isActive()) {
			return;	
		}

		if (e.keyCode === 27) {
			this.close();
		}

	}.bind(this));
}

export {
	Filter,
	NumberInput,
	SizeChooser,
	ColorChooser,
	CheckboxGroup,
	ScrollToTarget,
	ProductCard,
	Sidebar
}