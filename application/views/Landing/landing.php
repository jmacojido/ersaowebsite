<section class="outer-section home-welcome">
	<div class="row" style="margin-left:0px; margin-right:0px;">
		<div class = "home-welcome-logo"></div>
	</div>
	<div class="row" style="margin-left:0px; margin-right:0px;">
		<div class="col-md-12 center-block">
		 	<div class="home-welcome-buttons"><a href="<?=BASE_URL.'events/reservation'?>" >Events Reservation</a></div>
			<div style="display:inline-block; width: 40%;"></div>
			<div class="home-welcome-buttons"><a href="<?=BASE_URL.'order/menu'?>">Order Delivery</a></div>
		</div>
	</div>
	<div class="row" style="margin-left:0px; margin-right:0px;">
		<div class="col-md-12 home-welcome-buttons-down">
			<div class=""><a href="#start"><i class="fa fa-fw fa-chevron-circle-down"></i></a></div>
		</div>
	</div>
</section>
<section class="bg-home-welcome-line">
</section>

<section class="outer-section divided home-carousel" id="start">
	<div class="slide-box">
		<div id="home-carousel" class="banner-carousel owl-carousel">
			<?php foreach ($image_carousel as $img) { ?>
				<div class="slide" style="background-image:url(<?=BASE_URL."admin/media/view_image_gallery/".$img->id?>)"> Your Content </div>
			<?php } ?>
		</div>
	</div>
</section>
<section class="outer-section home-promos">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading-1">
					<span>WHAT'S NEW</span>
				</h1>
			</div>
		</div>
		<div class="slide-box">
			<div id="promo-carousel" class="item-carousel spring owl-carousel">
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/1)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/2)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/3)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/4)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/5)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/6)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/7)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
				<div class="slide">
					<div class="item-content">
						<a href="#" class="thumb-link" style="background-image:url(http://lorempixel.com/300/300/food/8)"></a>
						<a class="permalink-button" href="#">Click For Details</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="outer-section reservation bg-spring" ng-controller="ReservationController as c">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="progress-marker">
					<h1 class="heading-2 text-up">
						<span class="serif text-olive text-low">Make a</span> Reservation
					</h1>
					<div class="d-none d-lg-block progress-list" ng-cloak>
						<div class="progress-item">
							<div ng-class="{'active':c.step == 1}" class="number text-white">1</div><span>Select a package type to reserve</span>
						</div>
						<div class="progress-item" ng-if="c.inEventType == 1">
							<div ng-class="{'active':c.step == 2}" class="number text-white">2</div><span>Select the venue, date, time, and party package</span>
						</div>
						<div class="progress-item" ng-if="c.inEventType == 2">
							<div ng-class="{'active':c.step == 2}" class="number text-white">2</div><span>Select the venue, date, and time</span>
						</div>
						<div class="progress-item">
							<div ng-class="{'active':c.step == 3}" class="number text-white">3</div><span>Customer information</span>
						</div>
						<div class="progress-item">
							<div ng-class="{'active':c.step == 4}" class="number text-white">4</div><span>Terms and conditions</span>
						</div>
						<div class="progress-item">
							<div ng-class="{'active':c.step == 5}" class="number text-white">5</div><span>Review and submit</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="progress-stage">
					<div class="progress-form" ng-show="c.step == 1">
						<h1 class="heading-9">
							Step 1 <span class="serif">Select package type</span>
						</h1>
						<div class="form">
							<div class="row">
								<div class="form-group col">
									<label class="custom-control custom-radio">
										<input name="package" type="radio" class="custom-control-input" value="1" id="package-party" checked>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Party Booth Package</span>
									</label>
								</div>
							</div>
							<div class="row">
								<div class="form-group col">
									<label class="custom-control custom-radio">
										<input name="package" type="radio" class="custom-control-input" value="2" id="package-event">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Event Space Package</span>
									</label>
								</div>
							</div>
						</div>
						<div class="stage-controls">
							<button class="btn btn-olive" ng-click="c.nextStep()">Next</button>
						</div>
					</div>
					<div class="progress-form" ng-show="c.step == 2" ng-if="c.inEventType == 1" ng-cloak>
						<h1 class="heading-9">
							Step 2 <span class="serif">Select the venue, date, time, and party package</span>
						</h1>
						<div class="form">
							<div class="form-group row">
								<label for="r-address" class="col-sm-4 col-form-label">Venue Address</label>
								<div class="col-sm-8">
									<textarea ng-model="c.inAddress" class="form-control" ng-class="{
									'border-olive':c.errors.indexOf('addressEmpty') >= 0}" id="r-address" placeholder="Some venue address..."></textarea>
									<span class="form-text text-danger" ng-show="c.errors.indexOf('addressEmpty') >= 0">* Indicate your address</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="r-date" class="col-sm-4 col-form-label">Select Date</label>
								<div class="col-sm-8">
									<input id="r-date" class="form-control" ng-model="c.inDate" datetime-picker date-only date-format="yyyy-MM-dd">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Select Time</label>
								<div class="col-sm-8">
									<div class="d-flex align-items-center">
										<select class="custom-select col" ng-model="c.inDateTimeStart">
											<?php

											foreach ( $times AS $code => $time ){
												echo '<option value="'.$code.'">';
												echo $time;
												echo '</option>';
											}

											?>
										</select><span class="col-auto"> to </span><select class="custom-select col" ng-model="c.inDateTimeEnd">
											<?php

											foreach ( $times AS $code => $time ){
												echo '<option value="'.$code.'">';
												echo $time;
												echo '</option>';
											}

											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row checklist-box">
								<label class="col-sm-4 col-form-label" for="r-package">Select Party Package</label>
								<div class="col-sm-8 checklist">
									<div class="row">
										<div class="form-group col">
											<label class="custom-control custom-radio">
												<input name="partypackage" type="radio" class="custom-control-input" value="1" checked>
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">Snacks and Drinks</span>
											</label>
											<div class="field-info">
												Spicy Chicken, Spicy Pork, Spicy Squid, 360 mL Pearl Milk Tea, 360 mL Taro Milk Tea, 360 mL Watermelon Tea
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="custom-control custom-radio">
												<input name="partypackage" type="radio" class="custom-control-input" value="2">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">Snacks Only</span>
											</label>
											<div class="field-info">
												Spicy Chicken, Spicy Pork, Spicy Squid
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="custom-control custom-radio">
												<input name="partypackage" type="radio" class="custom-control-input" value="3">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">Drinks Only</span>
											</label>
											<div class="field-info">
												360 mL Pearl Milk Tea, 360 mL Taro Milk Tea, 360 mL Watermelon Tea
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="stage-controls">
							<button class="btn btn-spring" ng-click="c.previousStep()">Previous</button><button class="btn btn-olive" ng-click="c.nextStep()">Next</button>
						</div>
					</div>
					<div class="progress-form" ng-show="c.step == 2" ng-if="c.inEventType == 2" ng-cloak>
						<h1 class="heading-9">
							Step 2 <span class="serif">Select the venue, date, and time</span>
						</h1>
						<div class="form">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="r-area">Select Area</label>
								<div class="col-sm-8">
									<select id="r-area" class="custom-select" ng-model="c.inArea">
										<?php

										foreach( $areas AS $area ){
											echo '<option value="'.$area['code'].'">';
											echo $area['name'];
											echo '</option>';
										}

										?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="r-branch">Select Branch</label>
								<div class="col-sm-8">
									<select id="r-branch" class="custom-select" ng-model="c.inBranch">
										<?php

										foreach( $branches AS $area => $areaBranches ){
											foreach ( $areaBranches AS $branch ){
												echo '<option value="'.$branch->id.'" ng-if="c.inArea == \''.$area.'\'">';
												echo $branch->name;
												echo '</option>';
											}
										}

										?>
									</select>
									<?php

									foreach( $branches AS $area => $areaBranches ){
										foreach ( $areaBranches AS $branch ){
											echo '<div class="field-info branch" ng-if="c.inBranch == '.$branch->id.'">';
											echo '<div class="header">Branch Address</div>';
											echo '<div id="branch-address">'.$branch->address.'</div>';
											echo '<div id="branch-name" style="display:none">'.$branch->name.'</div>';

											echo '</div>';
										}
									}

									?>
								</div>
							</div>
							<div class="form-group row">
								<label for="r-date" class="col-sm-4 col-form-label">Select Date</label>
								<div class="col-sm-8">
									<input id="r-date" class="form-control" ng-model="c.inDate" datetime-picker date-only date-format="yyyy-MM-dd">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Select Time</label>
								<div class="col-sm-8">
									<div class="d-flex align-items-center">
										<select class="custom-select col" ng-model="c.inDateTimeStart">
											<?php

											foreach ( $times AS $code => $time ){
												echo '<option value="'.$code.'">';
												echo $time;
												echo '</option>';
											}

											?>
										</select><span class="col-auto"> to </span><select class="custom-select col" ng-model="c.inDateTimeEnd">
											<?php

											foreach ( $times AS $code => $time ){
												echo '<option value="'.$code.'">';
												echo $time;
												echo '</option>';
											}

											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="stage-controls">
							<button class="btn btn-spring" ng-click="c.previousStep()">Previous</button><button class="btn btn-olive" ng-click="c.nextStep()">Next</button>
						</div>
					</div>
					<div class="progress-form" ng-show="c.step == 3" ng-cloak>
						<h1 class="heading-9">
							Step 3 <span class="serif">Customer information</span>
						</h1>
						<div class="form">
							<div class="form-group row">
								<label for="r-name" class="col-sm-4 col-form-label">Name</label>
								<div class="col-sm-8">
									<input id="r-name" class="form-control" ng-class="{
									'border-olive':c.errors.indexOf('nameEmpty') >= 0}" ng-model="c.inName" type="text" placeholder="Name">
									<span class="form-text text-danger" ng-show="c.errors.indexOf('nameEmpty') >= 0">* We don't want to call everybody "John"</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="r-email" class="col-sm-4 col-form-label">Email Address</label>
								<div class="col-sm-8">
									<input id="r-email" class="form-control" ng-class="{
									'border-olive':c.errors.indexOf('emailEmpty') >= 0 || c.errors.indexOf('emailFormat') >= 0 }" ng-model="c.inEmail" type="text" placeholder="Email Address">
									<span class="form-text text-danger" ng-show="c.errors.indexOf('emailEmpty') >= 0">* We need this to send your reservation details</span>
									<span class="form-text text-danger" ng-show="c.errors.indexOf('emailFormat') >= 0">* Must be a valid email address</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="r-contact" class="col-sm-4 col-form-label">Contact Number</label>
								<div class="col-sm-8">
									<input id="r-contact" class="form-control" ng-class="{
									'border-olive':c.errors.indexOf('contactEmpty') >= 0}" ng-model="c.inContact" type="text" placeholder="Contact Number">
									<span class="form-text text-danger" ng-show="c.errors.indexOf('contactEmpty') >= 0">* We need this to confirm your reservation</span>
								</div>
							</div>
							<div class="form-group row" ng-if="c.inEventType == 2">
								<label for="r-pax" class="col-sm-4 col-form-label">Number of Guests</label>
								<div class="col-sm-8">
									<input id="r-pax" class="form-control" ng-class="{
									'border-olive':c.errors.indexOf('paxEmpty') >= 0 || c.errors.indexOf('paxInvalid') >= 0}" ng-model="c.inPax" type="text" placeholder="Number of guests">
									<span class="form-text text-danger" ng-show="c.errors.indexOf('paxEmpty') >= 0">* Must not be empty</span>
									<span class="form-text text-danger" ng-show="c.errors.indexOf('paxInvalid') >= 0">* Must be a number</span>
								</div>
							</div>
							<div class="form-group row checklist-box" ng-if="c.inEventType == 1">
								<label class="col-sm-4 col-form-label" for="r-package">Number of Guests</label>
								<div class="col-sm-8 checklist">
									<div class="row">
										<div class="form-group col">
											<label class="custom-control custom-radio">
												<input name="pax" type="radio" class="custom-control-input" value="50" checked>
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">50 Pax</span>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="custom-control custom-radio">
												<input name="pax" type="radio" class="custom-control-input" value="100">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description">100 Pax</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="stage-controls">
							<button class="btn btn-spring" ng-click="c.previousStep()">Previous</button><button class="btn btn-olive" ng-click="c.nextStep()">Next</button>
						</div>
					</div>
					<div class="progress-form" ng-show="c.step == 4" ng-cloak>
						<h1 class="heading-9">
							Step 4 <span class="serif">Terms and conditions</span>
						</h1>
						<div class="form" ng-show="c.inEventType == 1">
							<div class="terms">
								<h5>Party Booth Package</h5>
								<h5 class="notbold" style="margin-bottom: .5rem !important;">TERMS & CONDITIONS</h5>
								<p>1. Booking arrangement must be made five (5) days or earlier prior to the event.</p>
								<p>2. We require 50% down payment for confirmation and 50% balance on the day of the event before it starts. Sorry, we do not allow pencil bookings.</p>
								<p>3. Any payment made is strictly non-refundable. In case of unforeseen events, you may choose to re-schedule the booking within thirty(30) days. Re-scheduling is only allowed 48 hours or earlier prior to the event.</p>
								<p>4. We need minimum of 30 minutes to set up before the event, and 30 minutes minimum to pack up afterwards.</p>
								<p>5. We will be needing power supply (5000watts maximum) for our equipment, kindly provide.</p>
								<p>6. Out of town events have additional charge of gasoline and P2,000.00 out of town surcharge.</p>
								<p>7. There will be minimum of 2 Ersao personnel.</p>
								<p>8. Other than Ersao staff, we do not allow anyone to operate or picture our equipment.</p>
								<p>9. Party Booth will only stay for maximum of 4 hours. Additional charge will be imposed for additional hours.</p>
								<p>10. Price may change without prior notice.</p>
								<p>11 Venue at Malls or Hotel, please make sure there's time and space for our truck to ingress and egress.</p>
								<p>12. Reservations are on a first come, first served basis.</p>
								<p>13. Venue at villages/club house/etc., please make sure admin/security will accommodate our truck.</p>
								<p>14. Some clubhouse charges 6 wheeler trucks, please inform us beforehand so we could add it on the conforme.</p>
								<p>15. For outdoor events, kindly provide tent for our station since the party booth has no roof or covering.</p>
							</div>
						</div>
						<div class="form" ng-show="c.inEventType == 2">
							<div class="terms">
								<h5>Event Space Package</h5>
								<h5 class="notbold" style="margin-bottom: .5rem !important;">TERMS & CONDITIONS</h5>
								<p>1. P3,000.00 consumable for 3 hours. Additional P1,000.00 for every additional hour, also consumable.</p>
								<p>2. Booking arrangement must be made five (5) days or earlier prior to the event.</p>
								<p>3. We require 50% down payment for confirmation (deposit through bank) & 50% balance on the day of the event before it starts.</p>
								<p>4. Any payment made is strictly non-refundable. In case of unforeseen events, you may choose to re-schedule the booking within thirty (30) days. Re-scheduling is only allowed 48 hours or earlier prior to the event.</p>
								<p>5. Ersao Mauban branch will provide minimum of one (1) personal waiter for the event.</p>
								<p>6. Decorations are encourage but not provided by Ersao. Decorations must only be assembled/installation two (2) hours before the event to avoid any loose or damage. Ersao staff can help with the assembling/dismantling of decorations. Decorations must not damage any property/wall painting of store.</p>
								<p>7. Event must be within store hours only (10AM to 12:30PM Monday to Sunday).</p>
								<p>8. Event location: 2nd floor, 213 Banawe St., cor. Mauban St., Brgy. Manresa, Quezon City</p>
							</div>
						</div>
						<div class="stage-controls">
							<label class="custom-control custom-radio pull-left">
								<input id="terms" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">I AGREE</span>
							</label>
							<button class="btn btn-spring" ng-click="c.previousStep()">Previous</button><button id="nextstep" class="btn btn-olive" ng-click="c.nextStep()">Next</button>
						</div>
					</div>
					<div class="progress-form" ng-show="c.step == 5" ng-cloak>
						<h1 class="heading-9">
							Step 5 <span class="serif">Review and submit</span>
						</h1>

						<form class="form summary" id="event-form" action="<?php echo BASE_URL; ?>events/reservation/submit" method="post">
							<div class="terms">
							<input type="hidden" value="{{c.inEventType}}" name="revent">
							<input type="hidden" value="{{c.inDate}}" name="rdate">
							<input type="hidden" value="{{c.inDateTimeStart}}" name="rtimestart">
							<input type="hidden" value="{{c.inDateTimeEnd}}" name="rtimeend">
							<input type="hidden" value="{{c.inName}}" name="rname">
							<input type="hidden" value="{{c.inEmail}}" name="remail">
							<input type="hidden" value="{{c.inContact}}" name="rcontact">
							<input type="hidden" value="{{c.inPax}}" name="rpax">

							<div ng-if="c.inEventType == 1">
								<input type="hidden" value="{{c.inPartyPackage}}" name="rpackage">
								<input type="hidden" value="{{c.inAddress}}" name="raddress">
							</div>
							<div ng-if="c.inEventType == 2">
								<input type="hidden" value="{{c.inBranch}}" name="rbranch">
							</div>

							<div class="form-group form-group-bot row">
								<div class="col-sm-4 label-decoy">
									Reservation Type
								</div>
								<div class="col-sm-8">
									{{ c.visEventType }}
								</div>
							</div>
							<div class="form-group form-group-bot row" ng-show="c.inEventType == 2">
								<div class="col-sm-4 label-decoy">
									Branch
								</div>
								<div class="col-sm-8">
									<div>{{c.visBranchName}}</div>
									<div>{{c.visBranchAddress}}</div>
								</div>
							</div>
							<div class="form-group form-group-bot row" ng-show="c.inEventType == 1">
								<div class="col-sm-4 label-decoy">
									Venue Address
								</div>
								<div class="col-sm-8">
									{{ c.inAddress }}
								</div>
							</div>
							<div class="form-group form-group-bot row">
								<div class="col-sm-4 label-decoy">
									Date
								</div>
								<div class="col-sm-8">
									{{ c.visDate }}
								</div>
							</div>
							<div class="form-group form-group-bot row">
								<div class="col-sm-4 label-decoy">
									Time
								</div>
								<div class="col-sm-8">
									{{ c.visTimeStart }} - {{ c.visTimeEnd }}
								</div>
							</div>
							<div class="form-group form-group-bot row" ng-show="c.inEventType == 1">
								<div class="col-sm-4 label-decoy">
									Party Package
								</div>
								<div class="col-sm-8">
									<span ng-show="c.inPartyPackage == 1">Snacks and Drinks</span>
									<span ng-show="c.inPartyPackage == 2">Snacks Only</span>
									<span ng-show="c.inPartyPackage == 3">Drinks Only</span>
								</div>
							</div>

							<h2 class="text-olive">Customer Information</h2>

							<div class="form-group form-group-bot row">
								<div class="col-sm-4 label-decoy">
									Name
								</div>
								<div class="col-sm-8">
									{{ c.inName }}
								</div>
							</div>
							<div class="form-group form-group-bot row">
								<div class="col-sm-4 label-decoy">
									Email Address
								</div>
								<div class="col-sm-8">
									{{ c.inEmail }}
								</div>
							</div>
							<div class="form-group form-group-bot row">
								<div class="col-sm-4 label-decoy">
									Contact Number
								</div>
								<div class="col-sm-8">
									{{ c.inContact }}
								</div>
							</div>
							<div class="form-group form-group-bot row" ng-show="c.inEventType == 1">
								<div class="col-sm-4 label-decoy">
									Number of Guests
								</div>
								<div class="col-sm-8">
									{{ c.inPax }}
									<div>PHP 100 / pax</div>
								</div>
							</div>
							<div class="form-group form-group-bot row" ng-show="c.inEventType == 2">
								<div class="col-sm-4 label-decoy">
									Number of Guests
								</div>
								<div class="col-sm-8">
									{{ c.inPax }}
								</div>
							</div>
							</div>
						</form>

						<div class="stage-controls">
							<button class="btn btn-spring" ng-click="c.previousStep()">Previous</button><button class="btn btn-olive" ng-click="c.submit()">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="outer-section home-columnar-card bestsellers ">
	<div class="container">
		<div class="row align-items-center">
			<div class="col d-lg-none d-block below" >
				<div class="mobile-card" style="background-image:url(<?php echo IMG_URL; ?>/gallery/home_best_sellers.jpg)"></div>
			</div>
			<div class="col-lg-5 d-none d-lg-block">
				<img src="<?php echo IMG_URL; ?>/gallery/home_best_sellers.jpg" class="left"/>
			</div>
			<div class="col-lg-7 above">
				<div class="column-card menu">
					<h1 class="heading-3 text-up">
						Ersao Bestsellers
					</h1>
					<table>
						<tbody>
							<tr>
								<td>
									<div class="product text-up">Taiwan Black Tea</div>
									<div class="label">Lorem ipsum dolor sit amet, consec</div>
								</td>
								<td>
									<div class="price">P70</div>
									<div class="label text-up">Tea</div>
								</td>
								<td>
									<div class="price">P100</div>
									<div class="label text-up">Milk Tea</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="product text-up">High Mountain Tea</div>
									<div class="label">Lorem ipsum dolor sit amet, consec</div>
								</td>
								<td>
									<div class="price">P75</div>
									<div class="label text-up">Tea</div>
								</td>
								<td>
									<div class="price">P105</div>
									<div class="label text-up">Milk Tea</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="product text-up">Ice Coffee Float</div>
									<div class="label">Lorem ipsum dolor sit amet, consec</div>
								</td>
								<td>
									<div class="price">P110</div>
									<div class="label text-up">700 mL</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td>
									<div class="product text-up">Ripe Mango Float</div>
									<div class="label">Lorem ipsum dolor sit amet, consec</div>
								</td>
								<td>
									<div class="price">P140</div>
									<div class="label text-up">700 mL</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td>
									<div class="product">Spicy Squid</div>
									<div class="label">Lorem ipsum dolor sit amet, consec</div>
								</td>
								<td>
									<div class="price">P85</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td>
									<div class="product">Pork Chao Fan</div>
									<div class="label">Lorem ipsum dolor sit amet, consec</div>
								</td>
								<td>
									<div class="price">P140</div>
								</td>
								<td></td>
							</tr>
						</tbody>
					</table>
					<div class="controls">
						<a href="<?php echo BASE_URL; ?>order/menu" class="btn btn-danger btn-bold btn-wide">We have more here!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="outer-section showcase-stats">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading-4">How much we have served!</h1>
			</div>
		</div>
		<div class="row align-items-center stat-items">
			<div class="col-6 col-md-3 stat-item">
				<img src="<?php echo IMG_URL; ?>stats_tea.png"/>
				<div class="label text-white">Tea &amp; Shake</div>
				<div class="stat text-spring">2342</div>
			</div>
			<div class="col-6 col-md-3 stat-item">
				<img src="<?php echo IMG_URL; ?>stats_dumplings.png"/>
				<div class="label text-white">Dumplings</div>
				<div class="stat text-spring">3452</div>
			</div>
			<div class="col-6 col-md-3 stat-item">
				<img src="<?php echo IMG_URL; ?>stats_noodles.png"/>
				<div class="label text-white">Noodles</div>
				<div class="stat text-spring">234</div>
			</div>
			<div class="col-6 col-md-3 stat-item">
				<img src="<?php echo IMG_URL; ?>stats_rice.png"/>
				<div class="label text-white">Rice</div>
				<div class="stat text-spring">123</div>
			</div>
		</div>
	</div>
</section>
<section class="outer-section home-columnar-card bg-olive" ng-controller="BranchController as c">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7 col-12">
				<div class="map-box" style="width: 610px; height: 440px;">
					<div id="map" style="width: 610px; height: 440px;"></div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="column-card branch-form">
					<h1 class="heading-2 text-up">
						<span class="serif text-olive text-low">Branch</span> Center
					</h1>
					<p>
						Search for branch near you using our locator.
					</p>
					<div class="form">
						<select class="form-control custom-select" id="branch" ng-model="c.inBranchIndex" ng-change="c.selectBranch()">
							<?php

							foreach ( $branches_all AS $index => $branch ){
								echo '<option value="'.$index.'">';
								echo $branch->name;
								echo '</option>';
							}

							?>
						</select>

						<div class="branch-info" ng-show="c.branch">
							<h2>{{c.branch.name}}</h2>
							<input type="hidden" id="lat" value="{{c.branch.latitude}}"/>
							<input type="hidden" id="long" value="{{c.branch.longitude}}"/>
							<div id="address" class="address">{{c.branch.address}}</div>

							<div class="contacts">
								<div ng-repeat="contact in c.branch.contacts">{{contact}}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="outer-section home-columnar-card bg-showcase">
	<div class="container">

		<div class="row">
			<div class="col-lg-7 d-none d-lg-block">
				<div class="contact-image" style="background-image:url(<?php echo IMG_URL; ?>/gallery/home_contact_us.jpg)">
				</div>
			</div>
			<div class="col-lg-5">
				<div class="column-card right-fit">
					<h1 class="heading-5 text-up text-olive">
						Join Us
					</h1>
					<p> FRANCHISE OPPORTUNITIES : <a href="#">*READ MORE</a> </p>
					<p> JOB APPLICATIONS: <a href="#">*APPLY HERE</a> </p>
					<p> <a href="#">Please see attached  les for reference</a> </p>
				</div>
			</div>

		</div>
	</div>
</section>
<section class="outer-section home-columnar-card bg-spring divided ng-cloak" ng-controller="ContactController as c">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="column-card">
					<h1 class="heading-5 text-up text-olive">
						Contact Us
					</h1>
					<p>
						We would like to here from you. Suggestions, comments, compliments, or just to say hello. Email us here and we will be happy to respond.
					</p>
					<form class="contact-form" method="post" action="<?php echo BASE_URL; ?>contact/submit" ng-submit="c.submit($event)">
						<div class="form-row">
							<div class="form-group col-12 col-sm-6">
								<input ng-model="c.inName" type="text" name="e_name" class="form-control" placeholder="Name">
								<div class="form-text text-danger" ng-show="c.errors.indexOf('nameLength') >= 0">
									* Must not be empty
								</div>
							</div>
							<div class="form-group col-12 col-sm-6">
								<input ng-model="c.inEmail" type="text" name="e_email" class="form-control" placeholder="Email Address">
								<div class="form-text text-danger" ng-show="c.errors.indexOf('emailLength') >= 0">
									* Must not be empty
								</div>
								<div class="form-text text-danger" ng-show="c.errors.indexOf('emailFormat') >= 0">
									* Invalid format
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col">
								<textarea ng-model="c.inMessage" class="form-control" name="e_message" placeholder="Your message goes here..."></textarea>
								<div class="form-text text-danger" ng-show="c.errors.indexOf('messageLength') >= 0">
									* Must not be empty
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-olive btn-block btn-bold text-up">Submit Your Thoughts</button>
					</form>
				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div class="right-fit contact-image" style="background-image:url(<?php echo IMG_URL; ?>/gallery/home_contact_us.jpg)">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="outer-section home-comments bg-food">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading-6">
					<span class="serif text-low text-olive">Customer's</span> Reviews
				</h1>
				<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fhazel.luachua%2Fposts%2F10154911590785825%3A0&width=auto&show_text=false&appId=1170824899619381&height=408" width="100%" height="408" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				<iframe src="https://web.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fdianne.regalado%2Fposts%2F1727004407318682%3A0&width=auto" width="100%" height="375" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fgmsntbneeez%2Fposts%2F1480635988658269%3A0&width=auto" width="100%" height="375" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fjojomarcelinopogi%2Fposts%2F10208168299875154%3A0&width=auto" width="100%" height="375" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpeachy.diaz%2Fposts%2F10158208405140430%3A0&width=auto" width="100%" height="375" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			</div>
		</div>
	</div>

</section>
<div class="container-fluid controls">
	<div class="row">
		<button class="btn btn-trans btn-bold btn-block text-up home-comments-rev" id="more_review">Load More Promos</button>
	</div>
</div>
<!-- <section class="home-comments-rev" id="more_review"><h6>READ MORE REVIEWS</h6>
</section> -->
<!-- <div class="container-fluid controls">
	<div class="row">
		<button class="btn btn-trans btn-bold btn-block text-up" id="more_review">Load More Promos</button>
	</div>
</div> -->
