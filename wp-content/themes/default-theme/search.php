<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
 
    <div id="content">
        <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'default-theme' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
        
        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
      
        <article>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
             <div class="entry">
            <?php the_content(); ?>
 
                <div class="postmetadata">
                <p><?php _e('Written by:'); ?> <?php  the_author(); ?> <?php _e('On:'); ?> <?php the_date() ?> </p>
                <p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></p>
                </div>
 
            </div>
 
        </article>
         
<?php endwhile; ?>
 
    <div class="navigation">
        <?php posts_nav_link(); ?>
    </div>
 

<?php else: ?>
        <h3>No post found. Try a Different Search</h3>
<?php endif; ?>
</div>
 
<?php get_sidebar(); ?>   
<?php get_footer(); ?>