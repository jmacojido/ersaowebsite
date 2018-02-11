<script src="<?php echo JS_URL; ?>ngStorage.min.js"></script>
<script>
angular.module('ersao', ['ngStorage'])
.config(['$localStorageProvider','$sessionStorageProvider', function ($localStorageProvider, $sessionStorageProvider) {
    $localStorageProvider.setKeyPrefix('ersao-');
    $sessionStorageProvider.setKeyPrefix('ersao-');
}])
.controller('MenuController', function(Storage, Menu){
	var c = this;

	c.activeItem = {
		id:0,
		variationId:0,
		name: '',
		nameTaiwan: '',
		type: '',
		size: '',
		price: 0,
		quantity:1,
		types:[],
		sizes:[]
	}

	<?php
		if ( isset($categoryCode) == TRUE ){
			echo "c.category = '".$categoryCode."';";
		}
		else{
			echo "c.category = '';";
		}
	?>

	c.changeCategory = function(){
		window.location = '<?php echo BASE_URL; ?>order/menu/' + $('#category').val();
	}

	c.selectItem = function(id, name, nameTaiwan){
		c.activeItem.id = parseInt(id);
		c.activeItem.name = name;
		c.activeItem.nameTaiwan = nameTaiwan;
		c.activeItem.quantity = 1;

		c.getVariations();

		$('#menu-modal').modal('show');
	}

	c.getVariations = function(){
		var id = c.activeItem.id;

		var variations = Menu.variations.filter(function(variation){
			return (variation.entry_id == id);
		});

		var types = [];

		for ( var ctr = 0; ctr < variations.length; ctr++ ){
			if ( types.indexOf(variations[ctr].type) >= 0 ){
				continue;
			}

			types.push(variations[ctr].type);
		}

		c.activeItem.types = types;
		c.activeItem.type = types[0];


		c.getSizes();
	}


	c.getSizes = function(){
		var id = c.activeItem.id;
		var type = c.activeItem.type;

		var variations = Menu.variations.filter(function(variation){
			return (variation.entry_id == id);
		});

		var variationsType = variations.filter(function(variation){
			return (variation.type == type);
		});

		var sizes = [];

		for ( var ctr = 0; ctr < variationsType.length; ctr++ ){
			sizes.push(variationsType[ctr].size);
		}

		c.activeItem.sizes = sizes;
		c.activeItem.size = sizes[0];

		c.getPrice();
	}

	c.getPrice = function(){
		var id = c.activeItem.id;
		var type = c.activeItem.type;
		var size = c.activeItem.size;

		var variations = Menu.variations.filter(function(variation){
			return (variation.entry_id == id);
		});

		var variationsType = variations.filter(function(variation){
			return (variation.type == type);
		});

		var variationsSize = variationsType.filter(function(variation){
			return (variation.size == size);
		});

		c.activeItem.price = variationsSize[0].price;
		c.activeItem.variationId = variationsSize[0].id;
	}

	c.updateQuantity = function(change){
		c.activeItem.quantity = parseInt(c.activeItem.quantity);
		c.activeItem.quantity += change;

		if ( c.activeItem.quantity < 1 ){
			c.activeItem.quantity = 1;
		}
	}

	c.checkQuantity = function(){
		var change = parseInt(c.activeItem.quantity);

		if ( !change ){
			change = 0;
		}

		c.activeItem.quantity = change;

		if ( c.activeItem.quantity < 0 ){
			c.activeItem.quantity = 0;
		}
	}

	c.updateCart = function(){
		var cartItem = {
			id: c.activeItem.id,
			variationId: c.activeItem.variationId,
			name: c.activeItem.name,
			nameTaiwan: c.activeItem.nameTaiwan,
			quantity: c.activeItem.quantity,
			size: c.activeItem.size,
			type: c.activeItem.type,
			price: c.activeItem.price
		};

		var cartItemIndex = Storage.cartItemIndex(cartItem);

		if ( cartItemIndex < 0 ){
			Storage.addToCartItems(cartItem);
		}
		else{
			Storage.updateCartItem(cartItem, cartItemIndex);
		}
	}

	c.addItem = function(){
		c.updateCart();
	}

	c.addItemCheckout = function(){
		c.updateCart();

		window.location = '<?php echo BASE_URL; ?>order/checkout';
	}
})
.controller('CartController', function(Storage, Menu){
	var c = this;

	c.storage = Storage;

	console.log(c.storage.cart);

	c.updateQuantity = function(cartItem){

		var change =  parseInt(cartItem.quantity);

		if ( !change ){
			change = 0;
		}

		cartItem.quantity = change;

		if ( cartItem.quantity < 0 ){
			cartItem.quantity = 0;
		}

		var cartItemIndex = Storage.cartItemIndex(cartItem);

		Storage.replaceCartItem(cartItem, cartItemIndex);
	}

	c.removeItem = function(cartItem){
		Storage.removeCartItem(cartItem);
	}

	c.emptyCart = function(){
		Storage.reset();
	}
})
.controller('CheckoutController', function(Storage, Customer, Menu){
	var c = this;

	c.customer = Customer;
	c.storage = Storage;
	c.agreed = false;

	c.errors = [];

	c.inName = '';
	c.inEmail = '';
	c.inContact = '';
	c.inBuilding = '';
	c.inStreet = '';
	c.inBarangay = '';
	c.inCity = '';
	c.inProvince = '';
	c.inZip = '';

	c.inPayment = 0;

	c.visAddress = '';

	c.initInputs = function(){
		c.inName = Customer.customer.name;
		c.inEmail = Customer.customer.email;
		c.inContact = Customer.customer.contact;
		c.inBuilding = Customer.customer.building;
		c.inStreet = Customer.customer.street;
		c.inBarangay = Customer.customer.barangay;
		c.inCity = Customer.customer.city;
		c.inProvince = Customer.customer.province;
		c.inZip = Customer.customer.zip;

		c.visAddress = Customer.customer.address;
	}

	c.checkPayment = function(){
		c.errors = [];

		var payment = c.inPayment;

		if ( isNaN(payment) == true ){
			c.errors.push('payFormat');
		}
		else if ( payment < Storage.getCartTotal() ){
			c.errors.push('payAmount');
		}
	}

	c.isEmpty = function(str){
		return ( /^\s*$/.test(str) );
	}

	c.isEmail = function(str){
		 return ( /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(str) );
	}

	c.checkErrors = function(){
		c.errors = [];

		if ( c.isEmpty(c.inName) ){
			c.errors.push('nameLength');
		}

		if ( c.isEmpty(c.inEmail) ){
			c.errors.push('emailLength');
		}

		if ( c.isEmail(c.inEmail) == false ){
			c.errors.push('emailFormat');
		}

		if ( c.isEmpty(c.inContact) ){
			c.errors.push('contactLength');
		}

		if ( c.isEmpty(c.inBuilding) ){
			c.errors.push('buildingLength');
		}

		if ( c.isEmpty(c.inStreet) ){
			c.errors.push('streetLength');
		}

		if ( c.isEmpty(c.inCity) ){
			c.errors.push('cityLength');
		}

		if ( c.isEmpty(c.inProvince) ){
			c.errors.push('provinceLength');
		}

		if ( c.isEmpty(c.inZip) ){
			c.errors.push('zipLength');
		}
	}

	c.checkCheckoutErrors = function(){
		c.errors = [];

		var payment = c.inPayment;

		if ( isNaN(payment) == true ){
			c.errors.push('payFormat');
		}
		else if ( payment < Storage.getCartTotal() ){
			c.errors.push('payAmount');
		}
	}

	c.saveCustomer = function(){
		c.checkErrors();

		if ( c.errors.length != 0 ){
			return false;
		}

		var address = c.inBuilding + ', ' + c.inStreet + ', ';

		if ( c.isEmpty(c.inBarangay) == false ){
			address += ( c.inBarangay + ', ');
		}

		address +=  ( c.inCity + ', ' + c.inProvince + ' ' + c.inZip );

		var customer = {
			name: c.inName,
			email: c.inEmail,
			contact: c.inContact,
			building: c.inBuilding,
			street: c.inStreet,
			barangay: c.inBarangay,
			city: c.inCity,
			province: c.inProvince,
			zip: c.inZip,
			address: address
		};

		Customer.setCustomer(customer);

		window.location = '<?php echo BASE_URL; ?>order/checkout/summary';
	}

	c.agree = function(){
		c.agreed = true;
	}

	c.submit = function($event){
		c.checkErrors();

		if ( c.errors.length != 0 ){
			window.location = '<?php echo BASE_URL; ?>order/checkout';
			$event.preventDefault();
			return false;
		}

		c.checkCheckoutErrors();

		if ( c.errors.length != 0 ){
			$event.preventDefault();
			return false;
		}

		if ( Storage.cart.items.length == 0 ){
			$event.preventDefault();
			return false;
		}

		console.log(c.agreed);

		if ( c.agreed == false ){
			$('#checkout-terms-modal').modal('show');
			$event.preventDefault();
			return false;
		}
	}

	c.checkPayment();
	c.initInputs();
})
.controller('CheckoutCartController', function(Storage, Menu){
	var c = this;

	c.categories = Menu.categories;
	c.variations = Menu.variations;

	c.filteredVariations = [];
	c.entries = [];
	c.types = [];
	c.sizes = [];

	c.selectProduct = null;

	c.getEntriesByCategory = function(){
		c.entries = [];

		c.filteredVariations = c.variations.filter(function(variation){
			if ( variation.category == c.inCategory ){
				return true;
			}

			return false;
		});

		var entryIds = [];

		for ( var ctr = 0; ctr < c.filteredVariations.length; ctr++ ){
			if ( entryIds.indexOf(c.filteredVariations[ctr].entry_id) < 0 ){
				entryIds.push(c.filteredVariations[ctr].entry_id);
				c.entries.push(c.filteredVariations[ctr]);
			}
		}

		c.inEntry = c.entries[0].entry_id;
		c.getTypesByEntry();
	}

	c.getTypesByEntry = function(){
		c.types = [];

		var filtered = c.filteredVariations.filter(function(variation){
			if ( variation.entry_id == c.inEntry ){
				return true;
			}

			return false;
		});

		var types = [];

		for ( var ctr = 0; ctr < filtered.length; ctr++ ){
			if ( types.indexOf(filtered[ctr].type) < 0 ){
				types.push(filtered[ctr].type);
				c.types.push(filtered[ctr]);
			}
		}

		c.inType = c.types[0].type;

		c.getSizesByType();
	}

	c.getSizesByType = function(){
		c.sizes = [];

		var filtered = c.filteredVariations.filter(function(variation){
			if ( variation.entry_id == c.inEntry && variation.type == c.inType){
				return true;
			}

			return false;
		});

		console.log(filtered);

		var sizes = [];

		for ( var ctr = 0; ctr < filtered.length; ctr++ ){
			if ( sizes.indexOf(filtered[ctr].size) < 0 ){
				sizes.push(filtered[ctr].size);
				c.sizes.push(filtered[ctr]);
			}
		}

		c.inSize = c.sizes[0].size;

		c.getProductByFilter();
	}

	c.getProductByFilter = function(){
		var filtered = c.filteredVariations.filter(function(variation){
			if ( variation.category == c.inCategory && variation.entry_id == c.inEntry && variation.type == c.inType && variation.size == c.inSize){
				return true;
			}

			return false;
		});

		c.selectProduct = filtered[0];
	}

	c.updateQuantity = function(change){
		c.inQuantity = parseInt(c.inQuantity);
		c.inQuantity += change;

		if ( c.inQuantity < 0 ){
			c.inQuantity = 0;
		}
	}

	c.checkQuantity = function(){
		var change = parseInt(c.inQuantity);

		if ( !change ){
			change = 0;
		}

		c.inQuantity = change;

		if ( c.inQuantity < 0 ){
			c.inQuantity = 0;
		}
	}

	c.updateCart = function(){
		if ( c.inQuantity < 1 ){
			return false;
		}

		var cartItem = {
			id: c.selectProduct.entry_id,
			variationId: c.selectProduct.id,
			name: c.selectProduct.name,
			nameTaiwan: c.selectProduct.name_taiwan,
			quantity: c.inQuantity,
			size: c.selectProduct.size,
			type: c.selectProduct.type,
			price: c.selectProduct.price
		};

		var cartItemIndex = Storage.cartItemIndex(cartItem);

		if ( cartItemIndex < 0 ){
			Storage.addToCartItems(cartItem);
		}
		else{
			Storage.updateCartItem(cartItem, cartItemIndex);
		}
	}

	c.inCategory = Menu.categories[0].code;
	c.inEntry = null;
	c.inType = null;
	c.inSize = null;
	c.inQuantity = 0;

	c.getEntriesByCategory();
})
.controller('OrderSuccessController', function(Storage, Customer){
	var c = this;

	c.reset = function(){
		Storage.reset();
		Customer.reset();
	}

	c.reset();
})
.factory('Storage', function($localStorage){
	var s = {};

	s.getCart = function(){
		if ( !$localStorage.cart ){
			s.reset();
		}

		return $localStorage.cart;
	}

	s.saveCart = function(cart){
		$localStorage.cart = cart;
	}

	s.getCartTotal = function(){
		var total = 0;

		for ( var ctr = 0; ctr < s.cart.items.length; ctr++ ){
			var item = s.cart.items[ctr];

			total += ( item.quantity * item.price );
		}

		return total;
	}

	s.addToCartItems = function(cartItem){
		s.cart.items.push(cartItem);

		s.saveCart(s.cart);
	}

	s.replaceCartItem = function(cartItem, index){
		s.cart.items[index] = cartItem;

		s.saveCart(s.cart);
	}

	s.updateCartItem = function(cartItem, index){
		var item = s.cart.items[index];

		cartItem.quantity = parseInt(cartItem.quantity) + parseInt(item.quantity);

		s.cart.items[index] = cartItem;

		s.saveCart(s.cart);
	}

	s.removeCartItem = function(cartItem){
		var index = s.cartItemIndex(cartItem);

		s.cart.items.splice(index, 1);

		s.saveCart(s.cart);
	}

	s.getCartItemById = function(id){
		for ( var ctr = 0; ctr < s.cart.items.length; ctr++ ){
			var item = s.cart.items[ctr];

			if ( id == item.id ){
				return item;
			}
		}

		return null;
	}

	s.cartItemIndex = function(cartItem){
		for ( var ctr = 0; ctr < s.cart.items.length; ctr++ ){
			var item = s.cart.items[ctr];

			if ( item.id == cartItem.id && item.variationId == cartItem.variationId ){
				return ctr;
			}
		}

		return -1;
	}

	s.reset = function(){
		$localStorage.cart = {
			items:[]
		};

		s.cart = s.getCart();
	}

	s.cart = s.getCart();

	return s;
})
.factory('Customer', function($sessionStorage){
	var s = this;

	s.getCustomer = function(){
		if ( !$sessionStorage.customer ){
			s.reset();
		}

		return $sessionStorage.customer;
	}

	s.saveCustomer = function(customer){
		$sessionStorage.customer = customer;
	}

	s.setCustomer = function(customer){
		s.customer = customer;

		s.saveCustomer(s.customer);
	}

	s.reset = function(){
		$sessionStorage.customer = {
			name: '',
			email: '',
			contact: '',
			building: '',
			street: '',
			barangay: '',
			city: '',
			province: '',
			zip: '',
			address: ''
		};
	}

	s.customer = s.getCustomer();

	return s;
})
.factory('Menu', function(){
	var s = {};

	<?php

	if ( isset($ngData) == TRUE ){

	?>

	var json = atob("<?php echo $ngData; ?>");

	var jsonObj = JSON.parse(json);

	s.variations = jsonObj.variations;
	s.categories = [];

	if ( jsonObj.categories ){
		s.categories = jsonObj.categories;
	}

	<?php

	}

	?>
	return s;
});
</script>
