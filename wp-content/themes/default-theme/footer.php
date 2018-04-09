
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


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/filter_gallery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-min.js"></script>
 <?php wp_footer(); ?>
 <!--Footer Ends-->  
</body>
</html>