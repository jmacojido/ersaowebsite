<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf=8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"/>

	<?php
		if ( isset($meta) == TRUE ){
			echo '<meta property="og:title" content="'.htmlspecialchars($meta['title']).'"/>';
			echo '<meta property="og:site_name" content="'.htmlspecialchars($meta['site']).'"/>';
			echo '<meta property="og:url" content="'.htmlspecialchars($meta['url']).'"/>';
			echo '<meta property="og:description" content="'.htmlspecialchars($meta['description']).'"/>';
			echo '<meta property="og:image" content="'.htmlspecialchars($meta['image']).'"/>';
			echo '<meta name="twitter:card" content="summary"/>';
		}
	?>

	<title><?php echo htmlspecialchars($pageTitle); ?></title>

	<?php

		if ( isset($angular) == TRUE && $angular == TRUE){
			echo '<script src="'.JS_URL.'angular.js"></script>';
		}

	?>

	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,700,700i,900&amp;subset=latin-ext" rel="stylesheet">  -->
	<link href="https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>lg-transitions.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>lightgallery.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>owl.carousel.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>angularjs-datetime-picker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>animate.min.css"/>

	<link rel="stylesheet" href="<?php echo CSS_URL; ?>bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>ersao.fonts.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>ersao.css"/>
	<script src="<?php echo JS_URL ?>jquery-1.12.4.min.js"></script>
	<script src="<?php echo JS_URL; ?>popper.min.js"></script>
	<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
	<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?php echo GOOGLE_API_KEY ?>'></script>
	<script src="<?php echo JS_URL; ?>gmaps.js"></script>
</head>
<body ng-app="ersao">
<div class="navigation">
	<div id="quick-box" class="quick-box">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-12 col-sm-8">
					<div class="d-inline-block">Call | 632 355 40 21</div> • <div class="d-inline-block">Email | inquiry@ersao.com.ph</div>
				</div>
				<div class="d-none d-sm-block col-4 social">
					<span>Follow Us</span>
					<?php
						$social = unserialize(SOCIAL);

						foreach( $social AS $name => $url ){
							echo '<a href="'.$url.'">';
							echo '<img src="'.IMG_URL.'social_'.$name.'.png"/>';
							echo '</a>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="main-nav <?php if($this->uri->segment(1) == ''){ echo 'd-none';}?>" id="all_nav">
		<div class="container-fluid">
			<div class="row align-items-center" id="unscrolled" >
				<div class="col-auto">
					<a href="<?php echo BASE_URL; ?>"><img src="<?php echo IMG_URL; ?>ersao_logo_header.png"/></a>
				</div>
				<div class=" col-auto ml-auto nav-links">
					<div class="d-block d-md-none mobile-menu">
						<?php

						if ( $pageId == 'menu' ){
							echo '<a href="#" class="btn btn-olive" data-toggle="modal" data-target="#cart-modal"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>';
						}

						?>
						<a href="#" class="btn btn-olive burger-toggle" data-toggle="modal" data-target="#burger-modal"><i class="fa fa-bars" aria-hidden="true"></i></a>
					</div>
					<div class="d-none d-md-block">
						<a href="<?php echo BASE_URL; ?>events/reservation" class="btn btn-danger btn-md btn-bold" style="width:300px !important;">Party with us! Book here!</a>
						<?php

						if ( $pageId == 'menu' ){
							echo '<a href="#" class="btn btn-gray btn-md btn-bold" data-toggle="modal" data-target="#cart-modal">Open Cart</a>';
						}
						else{
							echo '<a href="'.BASE_URL.'order/menu" class="btn btn-danger btn-md btn-bold toggle-verification" style="width:300px !important;">For the hungry and thirsty, click here!</a>';
						}

						?>

					</div>
				</div>
			</div>
			<div class="row align-items-center d-none" id="scrolled">
				<div class="col-auto">
					<a href="<?php echo BASE_URL; ?>"><img src="<?php echo IMG_URL; ?>ersao_logo_header_2.png"/></a>
				</div>
				<div class="col-auto ml-auto nav-links">
					<div class="d-block d-md-none mobile-menu">
						<a href="#" class="btn btn-olive" data-toggle="modal" data-target="#cart-modal"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
						<a href="#" class="btn btn-olive burger-toggle" data-toggle="modal" data-target="#burger-modal"><i class="fa fa-bars" aria-hidden="true"></i></a>
					</div>
					<div class="d-none d-md-block">
						<?php

						$menu = unserialize(MENU);

						foreach( $menu AS $id => $page ){
							if ( $pageId == $id ){
								echo '<a class="btn btn-border active" href="'.$page[1].'">';
							}
							else{
								echo '<a class="btn btn-border" href="'.$page[1].'">';
							}

							echo $page[0];
							echo '</a>';
						}

						?>

					</div>
				</div>
			</div>
			<div class="row navigation-order align-items-center bg-white divided-2" id="navigation-order" style="display:none">
				<div class="col ml-auto mr-auto">
					<form>
						<div class="row align-items-center justify-content-center">
							<div class="col-auto">
								<h1 class="heading-2 text-up">
									<span class="serif text-low text-olive">Delivery</span> Verification
								</h1>
							</div>
							<div class="col-auto">
								<select class="custom-select">
									<option>asdasd</option>
									<option>asdasd</option>
									<option>asdasd</option>
									<option>asdasd</option>
									<option>asdasd</option>
								</select>
							</div>
							<div class="col-auto">
								<select class="custom-select">
									<option>Quezon City</option>
									<option>San Juan</option>
								</select>
							</div>
							<div class="col-auto">
								<select class="custom-select">
									<option>Metro Manila</option>
								</select>
							</div>
							<div class="col-auto">
								<input class="form-control" type="text" placeholder="Zip Code">
							</div>
							<div class="col-auto">
								<button class="btn btn-olive">Verify Location</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="widget hidden" id="widget" style="display:none;">
	<div id="widget-open">
		<a href="#" class="btn btn-danger btn-block toggle-verification">Quench It!<br><span class="text-up">Click</span> here to <span class="text-up">order</span>!</a>
		<a href="#" class="btn btn-danger btn-block"><span class="text-up">Book</span> your <span class="text-up">party</span>!</a>
		<a href="#" class="btn btn-danger btn-block widget-toggle-close"><span class="text-up">Close Menu</span></a>
		<a href="#" class="btn btn-danger btn-block"><span class="text-up">Back to Top</span></a>
	</div>
	<div id="widget-close" style="display:none">
		<a href="#" class="btn btn-danger btn-block widget-toggle-open"><span class="text-up">Open Menu</span></a>
	</div>
</div>
<div class="navigation-filler"></div>
<!-- Modal -->
<div class="modal fade burger-modal" id="burger-modal" tabindex="-1" role="dialog" aria-labelledby="burger-modal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<a href="#"  data-dismiss="modal">Close Menu</a>
			<ul>
				<?php
					$menu = unserialize(MENU);

					foreach( $menu AS $id => $page ){
						echo '<li>';

						if ( $pageId == $id ){
							echo '<a class="active" href="'.$page[1].'">';
						}
						else{
							echo '<a href="'.$page[1].'">';
						}

						echo $page[0];
						echo '</a>';
						echo '</li>';
					}
				?>
			</ul>
		</div>
	</div>
</div>
<script>
<?php if($this->uri->segment(1) == ""){?>
	var map;
	$(document).ready(function(){
		var $deliveryVerification = $('#navigation-order');
		var $toggleVerification = $('.toggle-verification');
		var $quickBox = $('#quick-box');
		var $navUnscroll = $('#unscrolled');
		var $navScroll = $('#scrolled');
		var $widget = $('#widget');
		var $widgetOpen = $('#widget-open');
		var $widgetClose = $('#widget-close');
		var $widgetToggleClose = $('.widget-toggle-close');
		var $widgetToggleOpen = $('.widget-toggle-open');
		var $allNav = $('#all_nav');



		$(window).scroll(menu);
		$(window).scroll(show_nav);
		$toggleVerification.click(toggleVerification);
		$widgetToggleOpen.click(widgetOpen);
		$widgetToggleClose.click(widgetClose);


		function toggleVerification(){
			$deliveryVerification.stop().slideToggle();
			return false;
		}

		function widgetClose(){
			$widgetOpen.fadeOut(200, function(){
				$widgetClose
				.stop()
				.fadeIn();

				$widget
				.css({
			        'margin-top' : -$widget.outerHeight()/2
			    });
			});
			return false;
		}

		function widgetOpen(){
			$widgetClose.fadeOut(200, function(){
				$widgetOpen
				.stop()
				.fadeIn();

				$widget
				.css({
			        'margin-top' : -$widget.outerHeight()/2
			    });
			});
			return false;
		}

		function menu(){
			var top = $(window).scrollTop(),
				width = $(window).width();

			if ( top > 700 ){
				if ( $navUnscroll.hasClass('d-none') == false ){
					$navUnscroll
					.addClass('d-none');

				}

				if ( $navScroll.hasClass('d-none') == true ){
					$navScroll
					.removeClass('d-none');
				}

				if ( $widget.hasClass('hidden') == true ){
					$widget
					.removeClass('hidden')
					.stop()
					.fadeIn()
					.css({
				        'margin-top' : -$widget.outerHeight()/2
				    });
				}
			}
			else{
				if ( $navUnscroll.hasClass('d-none') == true ){
					$navUnscroll
					.removeClass('d-none');

				}

				if ( $navScroll.hasClass('d-none') == false ){
					$navScroll
					.addClass('d-none');
				}

				if ( $widget.hasClass('hidden') == false ){
					$widget
					.addClass('hidden')
					.stop()
					.fadeOut();
				}
			}
		}
		function show_nav(){
			var top = $(window).scrollTop(),
				width = $(window).width();
			if ( top > 600 ){
				$allNav.removeClass('d-none');

			}else{
				$allNav.addClass('d-none');

			}
		}
		show_nav();
		menu();

		$('#more_review').click(function(){
			if($('.home-comments').height() <= 380){
				$('.home-comments').css('height', 'auto');
				$("#more_review").text("MINIMIZE REVIEWS");
			}
			else{
				$('.home-comments').css('height', '380');
				$("#more_review").text("LOAD MORE REVIEWS");
			}

		});
	});
<?php }
else if($this->uri->segment(1) == "promos" || $this->uri->segment(1) == "events" || $this->uri->segment(1) == "order"){ ?>
	var map;
	$(document).ready(function(){
		var $deliveryVerification = $('#navigation-order');
		var $toggleVerification = $('.toggle-verification');
		var $quickBox = $('#quick-box');
		var $navUnscroll = $('#unscrolled');
		var $navScroll = $('#scrolled');
		var $widget = $('#widget');
		var $widgetOpen = $('#widget-open');
		var $widgetClose = $('#widget-close');
		var $widgetToggleClose = $('.widget-toggle-close');
		var $widgetToggleOpen = $('.widget-toggle-open');



		$(window).scroll(menu);
		$toggleVerification.click(toggleVerification);
		$widgetToggleOpen.click(widgetOpen);
		$widgetToggleClose.click(widgetClose);


		function toggleVerification(){
			$deliveryVerification.stop().slideToggle();
			return false;
		}

		function widgetClose(){
			$widgetOpen.fadeOut(200, function(){
				$widgetClose
				.stop()
				.fadeIn();

				$widget
				.css({
			        'margin-top' : -$widget.outerHeight()/2
			    });
			});
			return false;
		}

		function widgetOpen(){
			$widgetClose.fadeOut(200, function(){
				$widgetOpen
				.stop()
				.fadeIn();

				$widget
				.css({
			        'margin-top' : -$widget.outerHeight()/2
			    });
			});
			return false;
		}

		function menu(){
			var top = $(window).scrollTop(),
				width = $(window).width();

			if ( top > 100 ){
				if ( $navUnscroll.hasClass('d-none') == false ){
					$navUnscroll
					.addClass('d-none');


				}

				if ( $navScroll.hasClass('d-none') == true ){
					$navScroll
					.removeClass('d-none');
				}

				if ( $widget.hasClass('hidden') == true ){
					$widget
					.removeClass('hidden')
					.stop()
					.fadeIn()
					.css({
				        'margin-top' : -$widget.outerHeight()/2
				    });
				}
			}
			else{
				if ( $navUnscroll.hasClass('d-none') == true ){
					$navUnscroll
					.removeClass('d-none');

				}

				if ( $navScroll.hasClass('d-none') == false ){
					$navScroll
					.addClass('d-none');
				}

				if ( $widget.hasClass('hidden') == false ){
					$widget
					.addClass('hidden')
					.stop()
					.fadeOut();
				}
			}
		}

		menu();

		$('#more_review').click(function(){
			if($('.home-comments').height() <= 380){
				$('.home-comments').css('height', 'auto');
				$(".home-comments-rev h6").text("MINIMIZE REVIEWS");
			}
			else{
				$('.home-comments').css('height', '380');
				$(".home-comments-rev h6").text("READ MORE REVIEWS");
			}

		});

	});
<?php } ?>
</script>
