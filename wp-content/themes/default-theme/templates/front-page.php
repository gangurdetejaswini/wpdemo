<?php
/**
 * Template Name: Front Page
 *
 */
 ?>
<?php get_header(); ?>



    <?php

    // The Query
    $the_query = new WP_Query( array(
       'post_type'      => 'page',
       'posts_per_page' => -1,
    ));

    // The Loop
    while ( $the_query->have_posts() ) : $the_query->the_post(); 

    $checke_meta = get_post_meta( $post->ID, 'rw_title_block', true );
    ?>

	
					<?php if(types_render_field('home-page-checkbox-block')){?>
					 <p><?php echo get_the_title($post->ID); ?></p>
					<?php }
					?>

   <?php 
   endwhile;
   // Reset Post Data
   wp_reset_postdata();

   ?>


<?php get_footer(); ?>