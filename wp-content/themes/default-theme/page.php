<?php get_header(); ?>

<!--Main Starts-->
<main>
	<div class="container clearfix">
		<div class="row">
			<div class="col-md-9">
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				 
				<article>
				<?php /* <h3 class="uk-page-title"><?php the_title(); ?></h3> */ ?>
		 
		 
					<div class="entry">
					<?php the_content(); ?>
					<?php /*
						<div class="postmetadata">
						<p><?php _e('Written by:'); ?> <?php  the_author(); ?> <?php _e('On:'); ?> <?php the_date() ?> </p>
						<p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></p>
						</div>
					*/?>
					</div>
					
					<?php/* if(($('home-page-checkbox-block')) = '1')
					{
						echo "checked";
					} else {
						echo "unchecked";
					}*/
					?>
					<?php if(types_render_field('home-page-checkbox-block')){
					//echo types_render_field('home-page-checkbox-block');
					echo "test";
					}
					?>
					
				</article>
			 
				<?php endwhile; ?>
	 
				<div class="navigation">
					<?php posts_nav_link(); ?>
				</div>
	 
				<?php endif; ?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?> 
			</div>
		</div>

	</div>
</main>
<!--Main Ends-->

<?php get_footer(); ?>