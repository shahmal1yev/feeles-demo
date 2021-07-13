import * as Helper from '../../js/helpers.js';
import * as Constructor from './constructor.js';
import * as Constant from '../../js/constants.js';
import '../../js/reboot.js';

new Constructor.Banners();
new Constructor.Hashtags();
new Constructor.Subbanners();
new Constructor.NewProduct();
new Constructor.EditProduct();
new Constructor.EditProductDetail();
new Constructor.NewProductDetail();

(function() {

	$('.product-item').each(function() {
		new Constructor.ProductCard(this);
	});

})();