
<!--Footer Starts-->
  <footer>
	<div class="tm-footer-top">
		<div class="container clearfix">
			<div class="row">
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>	
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="tm-footer-bottom">
		<div class="container clearfix">
		  <div id="copyright">© Copyright 2016 <?php bloginfo('name'); ?> | All Rights Reserved.</div>
		</div>
	</div>
  </footer>
  <?php /*
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('.bxslider').bxSlider({
	  mode: 'horizontal',
	  autoStart: true,
	  infiniteLoop: false
  });


});

jQuery(function($) {

	$('.multi-item-carousel').carousel({
	  interval: false
	});

	// for every slide in carousel, copy the next slide's item in the slide.
	// Do the same for the next, next item.
	$('.multi-item-carousel .item').each(function(){
	  var next = $(this).next();
	  if (!next.length) {
		next = $(this).siblings(':first');
	  }
	  next.children(':first-child').clone().appendTo($(this));
	  
	  if (next.next().length>0) {
		next.next().children(':first-child').clone().appendTo($(this));
	  } else {
		$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
	  }
	});
});

jQuery(function($) {
        $(".trending-list").owlCarousel({
         
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,
         
            //Autoplay
            autoPlay : false,
            goToFirst : true,
            goToFirstSpeed : 1000,
         
            // Navigation
            navigation : true,
            navigationText : ["prev","next"],
            pagination : false,
            paginationNumbers: false,
         
            // Responsive 
            responsive: true,
            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsMobile : [479,1]
         
        });
        $(".collection-list").owlCarousel({
         
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,
			
         
            //Autoplay
            autoPlay : false,
            goToFirst : true,
            goToFirstSpeed : 1000,
         
            // Navigation
            navigation : true,
            navigationText : ["prev","next"],
            pagination : false,
            paginationNumbers: false,
         
            // Responsive 
            responsive: true,
            items : 3,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsMobile : [479,1]
         
        });
        $(".testimonial-carousel").owlCarousel({
         
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,
			
         
            //Autoplay
            autoPlay : false,
            goToFirst : true,
            goToFirstSpeed : 1000,
         
            // Navigation
            navigation : true,
            navigationText : ["prev","next"],
            pagination : false,
            paginationNumbers: false,
         
            // Responsive 
            responsive: true,
            items : 1
         
        });
        $(".blogs-carousel").owlCarousel({
         
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,
			
         
            //Autoplay
            autoPlay : false,
            goToFirst : true,
            goToFirstSpeed : 1000,
         
            // Navigation
            navigation : true,
            navigationText : ["prev","next"],
            pagination : false,
            paginationNumbers: false,
         
            // Responsive 
            responsive: true,
            items : 4
         
        });
});
</script>
<script>
 jQuery(function($) {
function onScrollInit( items, trigger ) {
  items.each( function() {
    var osElement = $(this),
        osAnimationClass = osElement.attr('data-os-animation'),
        osAnimationDelay = osElement.attr('data-os-animation-delay');
      
        osElement.css({
          '-webkit-animation-delay':  osAnimationDelay,
          '-moz-animation-delay':     osAnimationDelay,
          'animation-delay':          osAnimationDelay
        });

        var osTrigger = ( trigger ) ? trigger : osElement;
        
        osTrigger.waypoint(function() {
          osElement.addClass('animated').addClass(osAnimationClass);
          },{
              triggerOnce: true,
              offset: '90%'
        });
  });
}

 onScrollInit( $('.os-animation') );
 onScrollInit( $('.staggered-animation'), $('.staggered-animation-container') );
});

 </script>
 <script>
/*  jQuery(function($) {

	$(".block-tab-products .nav-tab li a").click(function() {
		$(".block-tab-products .tab-panel.active li.product").attr("data-os-animation-delay","0s");
	});
	
});*/?>

<?php /*
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/owl.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/prettify.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.4/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/option8.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/select2.js"></script>
*/?>


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
 <?php wp_footer(); ?>
 <!--Footer Ends-->  
</body>
</html>