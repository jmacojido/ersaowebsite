<section class="outer-section checkout-cart ng-cloak" ng-controller="CheckoutController as c">
	<div class="container">
		<div class="row">
			<div class="col">
				<form class="form" ng-submit="c.submit($event)" method="post" action="<?php echo BASE_URL; ?>order/submit" novalidate>
					<input name="e_name" value="{{c.inName}}" type="hidden">
					<input name="e_email" value="{{c.inEmail}}" type="hidden">
					<input name="e_contact" value="{{c.inContact}}" type="hidden">
					<input name="e_building" value="{{c.inBuilding}}" type="hidden">
					<input name="e_street" value="{{c.inStreet}}" type="hidden">
					<input name="e_barangay" value="{{c.inBarangay}}" type="hidden">
					<input name="e_city" value="{{c.inCity}}" type="hidden">
					<input name="e_province" value="{{c.inProvince}}" type="hidden">
					<input name="e_zip" value="{{c.inZip}}" type="hidden">
					<input name="e_payment" value="{{c.inPayment}}" type="hidden">

					<div class="d-none" ng-repeat="item in c.storage.cart.items">
						<input name="variation_id[]" value="{{item.variationId}}" type="hidden">
						<input name="quantity[]" value="{{item.quantity}}" type="hidden">
					</div>

					<h1 class="heading-10 text-up">Order Summary</h1>
					<div class="customer-information ng-cloak">
						<div class="form-group row">
							<div class="col-sm-4 col-lg-2 label-decoy">
								Name
							</div>
							<div class="col-sm-8 col-lg-10">
								<div>{{c.inName}}</div>
							</div>
						</div>
						<div class="form-group row ng-cloak">
							<div class="col-sm-4 col-lg-2 label-decoy">
								Email Address
							</div>
							<div class="col-sm-8 col-lg-10">
								<div>{{c.inEmail}}</div>
							</div>
						</div>
						<div class="form-group row ng-cloak">
							<div class="col-sm-4 col-lg-2 label-decoy">
								Contact Number
							</div>
							<div class="col-sm-8 col-lg-10">
								<div>{{c.inContact}}</div>
							</div>
						</div>
						<div class="form-group row ng-cloak">
							<div class="col-sm-4 col-lg-2 label-decoy">
								Address
							</div>
							<div class="col-sm-8 col-lg-10">
								<div>{{c.inBuilding}}</div>
								<div>{{c.inStreet}}</div>
								<div>{{c.inBarangay}}</div>
								<div>{{c.inCity}}</div>
								<div>{{c.inProvince}} {{c.inZip}}</div>
							</div>
						</div>
					</div>
					<div ng-show="c.storage.cart.items.length == 0">Your cart is empty.</div>
					<table class="table cart ng-cloak" ng-show="c.storage.cart.items.length > 0">
						<thead class="thead-default">
							<tr>
								<th>Item</th>
								<th class="quantity">Quantity</th>
								<th class="price">Price</th>
								<th class="price">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="item in c.storage.cart.items" ng-if="item.quantity > 0">
								<td>
									<div>{{item.name}}</div>
									<div>{{item.nameTaiwan}}</div>
									<div class="sub-info">Type: {{item.type}}</div>
									<div class="sub-info">Size: {{item.size.charAt(0).toUpperCase() + item.size.slice(1)}}</div>
								</td>
								<td class="quantity">
									{{item.quantity}}
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
					<div class="change-for ng-cloak">
						<div class="row">
							<div class="col-12 col-sm-4 col-md-6"></div>
							<div class="col-12 col-sm-8 col-md-6">
								<div class="form-group row align-items-start">
									<label for="change" class="col-sm-6 col-md-6 col-form-label label-decoy">Bring Change For</label>
									<div class="col-sm-6 col-md-6">
										<input type="text" class="form-control" ng-model="c.inPayment" id="change" ng-change="c.checkPayment()" placeholder="500">
										<div class="form-text text-danger" ng-show="c.errors.indexOf('payAmount') >= 0">* Insufficient amount</div>
										<div class="form-text text-danger" ng-show="c.errors.indexOf('payFormat') >= 0">* Invalid number</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="controls">
						<button class="btn btn-olive text-up btn-bold" type="submit">Submit Order</button>
					</div>
					<!-- Modal -->
					<div class="modal fade menu-modal" id="checkout-terms-modal" tabindex="-1" role="dialog" aria-labelledby="checkout-terms-modal" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h2>Terms and Conditions</h2>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="container-fluid">
										<div class="row">
											<div class="col">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam facilisis sit amet urna quis egestas. Nunc sed erat aliquet, feugiat metus vitae, vulputate metus. Proin tellus magna, semper ut imperdiet ut, porta in arcu. Sed dapibus feugiat placerat. Integer id enim lacus. Vestibulum sit amet odio id augue fermentum pulvinar sed vitae magna. Praesent a posuere odio. Vivamus pulvinar blandit ultrices. Etiam tincidunt pellentesque nisl, porttitor suscipit ligula molestie vitae. Duis eleifend, dui sit amet molestie aliquet, velit nisi fringilla mi, eget efficitur justo velit ac libero. Maecenas eu tortor urna. Etiam venenatis sollicitudin lorem, id venenatis justo scelerisque quis.

												Morbi sagittis lacus id eros sollicitudin suscipit. Duis sed felis in erat sagittis commodo. Praesent accumsan ante nisi, nec congue urna sodales id. Aliquam feugiat lorem vel ultricies pulvinar. Morbi at arcu viverra, sodales urna sed, porta purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras nulla tellus, convallis vel tellus sit amet, volutpat tristique nulla. Curabitur dapibus tortor ante, nec pretium lectus pharetra sed. Integer vitae tincidunt orci. Quisque eleifend augue a nisi aliquet aliquet. Suspendisse in elit nec odio iaculis blandit. Sed eleifend risus neque, eu pulvinar magna tristique non. Phasellus nulla tellus, semper sed molestie ac, tincidunt sit amet urna. Suspendisse efficitur, leo non pretium egestas, ante est facilisis nulla, pellentesque tristique tortor urna eu turpis. Sed condimentum, mauris eget condimentum rhoncus, dolor sapien egestas turpis, ut euismod urna sem consectetur purus. Nunc diam risus, egestas id velit ut, egestas sagittis odio. 
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer" ng-show="c.storage.cart.items.length > 0">
									<div class="container-fluid">
										<div class="row">
											<div class="col-12 col-sm-6">
												<button type="button" data-dismiss="modal" class="btn btn-gray text-up btn-block">Disagree</button>
											</div>
											<div class="col-12 col-sm-6">
												<button class="btn btn-danger text-up btn-block" ng-click="c.agree()" type="submit">Agree and Submit</button>
											</div> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>