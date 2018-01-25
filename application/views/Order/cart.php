<!-- Modal -->
<div class="modal fade menu-modal" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="menu-modal" aria-hidden="true" ng-controller="CartController as c">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Cart</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<div ng-show="c.storage.cart.items.length == 0">Your cart is empty.</div>
							<table class="table cart" ng-show="c.storage.cart.items.length > 0">
								<thead class="thead-default">
									<tr>
										<th>Item</th>
										<th class="quantity">Quantity</th>
										<th class="price">Price</th>
										<th class="price">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="item in c.storage.cart.items">
										<td>
											<div>{{item.name}}</div>
											<div>{{item.nameTaiwan}}</div>
											<div class="sub-info">Type: {{item.type}}</div>
											<div class="sub-info">Size: {{item.size.charAt(0).toUpperCase() + item.size.slice(1)}}</div>
										</td>
										<td class="quantity">
											<div>
												<div class="row align-items-center">
													<div class="col-12 col-lg-9 ">
														<input class="form-control form-control-sm" type="text" ng-model="item.quantity" ng-change="c.updateQuantity(item)" placeholder="{{item.quantity}}">
												    </div>
												    <div class="col-12 col-lg-3 remove">
												    	<button class="btn btn-clear btn-xs btn-block" ng-click="c.removeItem(item)"><i class="fa fa-times" aria-hidden="true" ></i></button>
												    </div>
												</div>
											</div>
										</td>
										<td class="price">{{item.price}}</td>
										<td class="price">{{ (item.price * item.quantity).toFixed(2) }}</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="3"></td>
										<td colspan="1" class="price">PHP {{ c.storage.getCartTotal().toFixed(2) }}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer" ng-show="c.storage.cart.items.length > 0">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-12 col-sm-auto">
							<button type="button" class="btn btn-gray text-up btn-block" ng-click="c.emptyCart()">Empty Cart</button>
						</div>
						<div class="col-12 col-sm-auto">
							<a href="<?php echo BASE_URL; ?>order/checkout" class="btn btn-danger text-up btn-block" ng-click="c.addItemCheckout()">Proceed to Checkout</a>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>