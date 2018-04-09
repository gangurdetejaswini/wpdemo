<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >



<section class="films-tabs">
 
	<?php $film_genres = get_terms('project_category');
	//print_r $film_genres;
	//print_r(array_values($film_genres));
	?>

 
	<!-- Nav tabs -->
	<ul class="nav nav-tabs nav-justified">
		<li class="active">
			<a data-toggle="tab" href="#all">All</a>
		</li>
		<?php foreach($film_genres as $film_genre) { ?>
			<li>
				<a href="#<?php echo $film_genre->slug; ?>" data-toggle="tab"><?php echo $film_genre->name; ?></a>
			</li>
		<?php } ?>
	</ul>
	
	<!-- Tab panes -->
	<div class="tab-content">
 
		<div class="tab-pane active" id="all">
			<?php 	
			$args = array(
				'post_type' => 'projects',
				'posts_per_page' -1,
				'orderby' => 'title',
				'order' => 'ASC'
			);
			$all_films = new WP_Query( $args );		
			?>
 
			<?php if ( $all_films->have_posts() ) : // make sure we have films to show before doing anything?>
			<div class="table-responsive">
				<table class="table">
					<?php while ( $all_films->have_posts() ) : $all_films->the_post(); ?>	
					<tr>
						<td><?php the_post_thumbnail() ?></td>
						<td><h3><?php the_title() ?></h3</td>
						<td>
							<p class="lead"><?php the_excerpt() ?></p>
							<a href="<?php the_permalink() ?>" class="btn btn-primary">Read more</a>
						</td>
					</tr>
					<?php endwhile; ?>
					<?php wp_reset_query() ?>
				</table>
			</div>
			<?php endif; ?>
 
		</div><!-- all films tab pane -->
 
		<?php foreach($film_genres as $film_genre) { ?>
 
			<div class="tab-pane" id="<?php echo $film_genre->slug ?>">
				<?php 	
				$args = array(
					'post_type' => 'films',
					'posts_per_page' -1,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'genres',
							'field' => 'slug',
							'terms' => $film_genre->slug
						)
					)
				);
				$films = new WP_Query( $args );		
				?>
 
				<?php if ( $films->have_posts() ) : // make sure we have films to show before doing anything?>
				
				<h3><?php the_title() ?></h3>
				
				<?php endif; ?>
 
			</div>
		<?php } ?>
 
	</div><!-- tab-content -->
 
</section><!-- film-tabs -->

</article><!-- #post-## -->
