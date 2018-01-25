<section class="outer-section menu" ng-controller="MenuController as c">
	<div class="container">
		<div class="row align-items-start">
			<div class="d-block d-lg-none col categories divided">
				<div class="form container-fluid">
					<div class="row">
						<div class="col">
							<select id="category" ng-model="c.category" class="form-control custom-select" ng-change="c.changeCategory()">
								<?php

								foreach ( $categories AS $code => $category ){

									if ( $code == $categoryCode ){
										echo '<option selected value="'.$code.'">';
									}
									else{
										echo '<option value="'.$code.'">';
									}

									echo $category;
									echo '</option>';
								}

								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="d-none d-lg-block col-3 categories divided">
				<ul>
					<?php

					foreach ( $categories AS $code => $category ){
						if ( $code == $categoryCode ){
							echo '<li class="active">';
						}
						else{
							echo '<li>';
						}

						echo '<a href="'.BASE_URL.'order/menu/'.$code.'">';
						echo $category;
						echo '</a>';
						echo '</li>';
					}

					?>
				</ul>
			</div>
			<div class="col-lg-9 entries">
				<div class="row">
					<?php

					foreach ( $menu AS $item ){
						echo '<div class="menu-item col-12 col-sm-6 col-md-4">';

						echo '<div class="item-content" style="background-image:url(http://lorempixel.com/300/300/food/'.mt_rand(1,10).')">';

						echo '<div class="controls">';

						echo '<div class="name text-up">';
						echo '<div>'.$item->name.'</div>';
						echo '<div>'.$item->name_taiwan.'</div>';
						echo '</div>';

						echo '<button class="btn btn-danger btn-block text-up" href="#" ng-click="c.selectItem(\''.$item->id.'\', \''.$item->name.'\', \''.$item->name_taiwan.'\')">Add to Cart</button>';

						echo '</div>';

						echo '</div>';

						echo '</div>';
					}

					?>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade menu-modal" id="menu-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Add To Cart</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-4 d-none d-lg-block">
								<div class="image"></div>
							</div>
							<div class="col-12 col-lg-8">
								<h3>{{c.activeItem.name}}</h3>
								<h3>{{c.activeItem.nameTaiwan}}</h3>
								<p>PHP {{c.activeItem.price}}</p>
								<div class="form filters">
									<div class="row">
										<div class="form-group col-md-6">
											<label for="e-type" class="d-block">Type</label>
											<select id="e-type" class="custom-select d-block" ng-model="c.activeItem.type" ng-change="c.getSizes()" placeholder="Select Value">
												<option ng-repeat="type in c.activeItem.types" value="{{type}}">{{type}}</option>
											</select>
									    </div>
									    <div class="form-group col-md-6">
											<label for="e-size" class="d-block">Size</label>
											<select id="e-size" class="custom-select d-block" ng-model="c.activeItem.size" ng-change="c.getPrice()" placeholder="Select Value">
												<option ng-repeat="size in c.activeItem.sizes" value="{{size}}">{{size.charAt(0).toUpperCase() + size.slice(1);}}</option>
											</select>
									    </div>
									</div>
									<div class="row align-items-end">
										<div class="form-group col-md-6 quantity">
											<label for="e-qty" class="d-block">Quantity</label>
											<div class="input-group">
    											<button class="input-group-addon" ng-click="c.updateQuantity(-1)"><i class="fa fa-minus linee" aria-hidden="true"></i></button>
											    <input type="text" id="e-qty" ng-change="c.checkQuantity()" class="form-control" placeholder="Quantity" ng-model="c.activeItem.quantity">
											    <button class="input-group-addon" ng-click="c.updateQuantity(1)"><i class="fa fa-plus linee" aria-hidden="true"></i></button>
  											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="container-fluid">
						<div class="row justify-content-center">
							<div class="col-12 col-sm-auto">
								<button type="button" class="btn btn-olive btn-block text-up" ng-click="c.addItem()" data-dismiss="modal">Add to cart and continue shopping</button>
							</div>
							<div class="col-12 col-sm-auto">
								<button type="button" class="btn btn-danger btn-block text-up" ng-click="c.addItemCheckout()" data-dismiss="modal">Add to cart and check out</button>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
