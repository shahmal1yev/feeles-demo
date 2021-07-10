import * as Helper from '../../js/helpers.js';
import * as Constructor from './constructor.js';
import * as Constant from '../../js/constants.js';
import '../../js/reboot.js';

new Constructor.Banners();
new Constructor.Hashtags();
new Constructor.Subbanners();
new Constructor.NewProduct(Helper.getElement('newProductForm'));
new Constructor.EditProduct(Helper.getElement('editProductForm'));

(function() {

	$('.product-item').each(function() {
		new Constructor.ProductCard(this);
	});

})();