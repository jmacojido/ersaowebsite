<script>
$(document).ready(function(){
	$('#highlight-carousel').owlCarousel({
		items: 4,
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
		dragEndSpeed: 500,
		margin:6,
		stagePadding:6,
		responsive : {
		    // breakpoint from 0 up
		    0 : {
		        items: 2
		    },
		    400:{
		    	items: 3
		    },
		    // breakpoint from 768 up
		    768 : {
		       items: 3
		    },
		    // breakpoint from 768 up
		    992 : {
		       items: 5
		    }
		}
	});
});
</script>
