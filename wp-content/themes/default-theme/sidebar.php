<?php
/**
 * The sidebar containing the main widget area
*/

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar' ); ?>	
	<?php endif; ?>
</aside><!-- #secondary -->
