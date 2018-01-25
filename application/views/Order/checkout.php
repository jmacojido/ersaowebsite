<section class="outer-section checkout bg-spring">
	<div class="container">
		<div class="row">
			<div class="cart-menu col-lg-4 ng-cloak" ng-controller="CheckoutCartController as c">
				<div class="checkout-box">
					<h1 class="heading-10 text-up">Menu</h1>
					<div class="form">
						<div class="form-group">
							<label for="category" class="col-form-label">Category</label>
							<select class="custom-select col text-up" ng-model="c.inCategory" ng-change="c.getEntriesByCategory()">
								<option ng-repeat="category in c.categories" value="{{category.code}}">{{category.name}} {{category.name_taiwan}}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="category" class="col-form-label">Item</label>
							<select class="custom-select col text-up" ng-model="c.inEntry" ng-change="c.getTypesByEntry()">
								<option ng-repeat="entry in c.entries" value="{{entry.entry_id}}">{{entry.name + ' ' + entry.name_taiwan}}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="category" class="col-form-label">Type</label>
							<select class="custom-select col text-up" ng-model="c.inType" ng-change="c.getSizesByType()">
								<option ng-repeat="product in c.types" value="{{product.type}}">{{product.type}}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="category" class="col-form-label">Size</label>
							<select class="custom-select col text-up" ng-model="c.inSize" ng-change="c.getProductByFilter()">
								<option ng-repeat="product in c.sizes" value="{{product.size}}">{{product.size}}</option>
							</select>
						</div>
						<div class="form-group quantity">
							<label for="e-qty" class="d-block">Quantity</label>
							<div class="input-group">
								<button class="btn btn-olive input-group-addon" ng-click="c.updateQuantity(-1)"><i class="fa fa-minus linee" aria-hidden="true"></i></button>
								<input type="text" id="e-qty" ng-change="c.checkQuantity()" class="form-control text-center" placeholder="Quantity" ng-model="c.inQuantity">
								<button class="btn btn-olive input-group-addon" ng-click="c.updateQuantity(1)"><i class="fa fa-plus linee" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="form-group controls">
							<button class="btn btn-danger btn-block text-up" ng-click="c.updateCart()">Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col ng-cloak" ng-controller="CartController as c">
				<div class="checkout-box">
					<h1 class="heading-10 text-up">Cart</h1>
					<div class="overflow-box">
						<table class="table cart ng-cloak" ng-show="c.storage.cart.items.length > 0">
							<thead class="thead-default">
								<tr>
									<th>Item</th>
									<th class="quantity">Qty</th>
									<th class="price">Price</th>
									<th class="price">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="item in c.storage.cart.items" ng-if="item.quantity > 0">
									<td>
										<div class="content">
											<div>{{item.name}}</div>
											<div>{{item.nameTaiwan}}</div>
											<div class="sub-info">Type: {{item.type}}</div>
											<div class="sub-info">Size: {{item.size.charAt(0).toUpperCase() + item.size.slice(1)}}</div>
										</div>
									</td>
									<td class="quantity">
										<div class="content">
											{{item.quantity}}
										</div>
									</td>
									<td class="price">
										<div class="content">
											{{item.price}}
										</div>
									</td>
									<td class="price">
										<button class="btn btn-clear" ng-click="c.removeItem(item)"><i class="fa fa-times" aria-hidden="true" ></i></button>
										<div class="content">
											{{ (item.price * item.quantity).toFixed(2) }}
										</div>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td colspan="1" class="price">PHP {{ c.storage.getCartTotal().toFixed(2) }}</td>
								</tr>
							</tfoot>
						</table>
						<div ng-if="c.storage.cart.items.length < 1">There are no items in your cart.</div>
					</div>
				</div>
				<div class="text-right" ng-if="c.storage.cart.items.length > 0">
					<a href="<?php echo BASE_URL; ?>order/summary" class="btn btn-olive text-up">Proceed to Checkout</a>
				</div>
			</div>
		</div>
	</div>
</section>