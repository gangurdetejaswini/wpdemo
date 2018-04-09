<?php
/**
 * Template Name: About Us Template
 *
 */
 ?>
<?php get_header(); ?>

<div class="entry-content">
    <?php //the_content(); ?>

    <?php
        $childArgs = array(
            'sort_order' => 'ASC',
            'sort_column' => 'menu_order',
            'child_of' => get_the_ID()
        );
        $childList = get_pages($childArgs);
        foreach ($childList as $child) { ?>
            <div class="child-page">
                <h2 class="child-title"><?php //echo $child->post_title; ?>
				<?php echo get_the_title($child); ?></h2>
				<?php echo get_the_post_thumbnail($child); ?>
                <?php echo get_the_excerpt($child); ?>
				<a href="<?php the_permalink($child); ?>">Read More</a>
            </div>
        <?php } ?>
</div>


<?php get_footer(); ?>