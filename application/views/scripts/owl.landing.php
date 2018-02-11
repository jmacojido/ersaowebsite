<script>
$(document).ready(function(){
	$('#home-carousel').owlCarousel({
		items: 1,
		loop: true,
		nav: true,
		navText:[
			'<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			'<i class="fa fa-chevron-right" aria-hidden="true"></i>'
		],
		autoplay: true,
		autoplayTimeout: 10000,
		autoplaySpeed:700,
		navSpeed: 700,
		dotsSpeed: 700,
		dragEndSpeed: 500
	});

	$('#events-carousel').owlCarousel({
		items: 4,
		loop: false,
		nav: true,
		navText:[
			'<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			'<i class="fa fa-chevron-right" aria-hidden="true"></i>'
		],
		margin:20,
		stagePadding:0,
		autoplay: false,
		autoplayTimeout: 10000,
		autoplaySpeed:700,
		navSpeed: 400,
		dotsSpeed: 400,
		dragEndSpeed: 500,
		responsive : {
		    // breakpoint from 0 up
		    0 : {
		        items: 1
		    },
		    350:{
		    	items: 2
		    },
		    // breakpoint from 768 up
		    768 : {
		       items: 3
		    },
		    // breakpoint from 768 up
		    992 : {
		       items: 4
		    }
		}
	});

	$('#promo-carousel').owlCarousel({
		items: 4,
		loop: false,
		nav: true,
		navText:[
			'<i class="fa fa-chevron-left" aria-hidden="true" style="margin-top:-100px;"></i>',
			'<i class="fa fa-chevron-right" style="margin-top:-100px;" aria-hidden="true"></i>'
		],
		margin:20,
		stagePadding:0,
		autoplay: false,
		autoplayTimeout: 10000,
		autoplaySpeed:700,
		navSpeed: 400,
		dotsSpeed: 400,
		dragEndSpeed: 500,
		responsive : {
		    // breakpoint from 0 up
		    0 : {
		        items: 1
		    },
		    350:{
		    	items: 2
		    },
		    // breakpoint from 768 up
		    768 : {
		       items: 3
		    },
		    // breakpoint from 768 up
		    992 : {
		       items: 4
		    }
		}
	});
});

var $root = $('html, body');

$("a").on('click', function(event) {
  if (this.hash !== "") {
	event.preventDefault();
	var hash = this.hash;
	$('html, body').animate({
	  scrollTop: $(hash).offset().top
	}, 800, function(){
	  window.location.hash = hash;
	});
  }
});

// $(document).ready(function () {
// 	$(document).on('mouseenter', '.home-welcome', function () {
// 		$(this).find(".home-welcome-buttons").show(500);
// 	}).on('mouseleave', '.home-welcome', function () {
// 		$(this).find(".home-welcome-buttons").hide(500);
// 	});
// });
</script>
<script src="<?php echo JS_URL; ?>gmaps.js"></script>
