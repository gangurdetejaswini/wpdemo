<?php
/**
 * Template Name: Home Page
 *
 */
 ?>
<?php get_header(); ?>

<div class="block-banner8 test">
	<div class="container">
		<div class="row">
			<div class="item col-sm-4 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0s">
				<?php if ( is_active_sidebar( 'top-a-left' ) ) : ?>
					<?php dynamic_sidebar( 'top-a-left' ); ?>
				<?php endif; ?>
			</div>
			<div class="item col-sm-4 os-animation" data-os-animation="fadeIn" data-os-animation-delay="1s">
				<?php if ( is_active_sidebar( 'top-a-middle' ) ) : ?>
					<?php dynamic_sidebar( 'top-a-middle' ); ?>
				<?php endif; ?>
			</div>
			<div class="item col-sm-4 os-animation" data-os-animation="fadeIn" data-os-animation-delay="2s">
				<?php if ( is_active_sidebar( 'top-a-right' ) ) : ?>
					<?php dynamic_sidebar( 'top-a-right' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<!-- tab product -->
<section class="block-tab-products">
    <div class="container">
        <ul class="nav-tab">
            <li class="active"><a data-toggle="tab" href="#featured">FEATURED</a></li>
            <li><a data-toggle="tab" href="#best-seller">BEST SELLERS </a></li>
            <li><a data-toggle="tab" href="#new-arrivals">New Arrivals</a></li>
        </ul>
        <div class="tab-container">
            <div id="featured" class="tab-panel active">
                <?php
				 // echo do_shortcode('[featured_products per_page="12" columns="4"]');
				 $meta_query   = WC()->query->get_meta_query();
				 $meta_query[] = array(
					'key'   => '_featured',
					'value' => 'yes'
				 );
				 $args = array(
					'post_type'   =>  'product',
					'stock'       =>  1,
					'showposts'   =>  6,
					'orderby'     =>  'date',
					'order'       =>  'DESC',
				 	'meta_query'  =>  $meta_query
				 );
				 $loop = new WP_Query( $args );?>
				<ul class="products-style8 row row-eq-height">
				 <?php
				 while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

					<li class="product col-sm-6 col-md-3">
					<div class="product-container">	
					<div class="product-thumb">	
					<a href="<?php the_permalink(); ?>">					
						<?php 
							$image = get_the_post_thumbnail_url( $loop->post->ID);
							?>
							<img src="<?php echo $image; ?>" class="primary_image" />
						
						<?php
						$image_hover = get_field('product_hover_image');
						?>
						<img src="<?php echo $image_hover; ?>" class="secondary_image" />
					</a>
					<a class="quick-view" title="Quick view" href="<?php the_permalink(); ?>">Quick view</a>
					</div>
					<div class="product-info">
						<div class="product-name">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
					</div>
					<div class="box-price">	
						<?php 
							echo $product->get_price_html(); 
						?>
					</div>
					<div class="button-control">
						<?php
							woocommerce_template_loop_add_to_cart( $loop->post, $product );
						?>
					</div>
					</div>
					</li>

				<?php 
					endwhile;
					wp_reset_query(); 
					?>
				</ul>
            </div>
            <div id="best-seller" class="tab-panel">
				<?php
				$args = array(
					'post_type' => 'product',
					'meta_key' => 'total_sales',
					'orderby' => 'meta_value_num',
					'posts_per_page' => 1,
				);
				 
				$loop = new WP_Query( $args );
				?>
				<ul class="products-style8 row row-eq-height">
				<?php
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li class="product col-sm-6 col-md-3">
				<?php global $product; ?>
				<div class="product-container">	
				<div class="product-thumb">	
				<a href="<?php the_permalink(); ?>">					
					<?php $image = get_the_post_thumbnail_url( $loop->post->ID); ?>
					<img src="<?php echo $image; ?>" class="primary_image" />
					
					<?php $image_hover = get_field('product_hover_image'); ?>
					<img src="<?php echo $image_hover; ?>" class="secondary_image" />
				</a>
				<a class="quick-view" title="Quick view" href="<?php the_permalink(); ?>">Quick view</a>
				</div>
				<div class="product-info">
					<div class="product-name">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
				</div>
				<div class="box-price">	
					<?php 
						echo $product->get_price_html(); 
					?>
				</div>
				<div class="button-control">
					<?php
						woocommerce_template_loop_add_to_cart( $loop->post, $product );
					?>
				</div>
				</div>
				</li>
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
            </div>
            <div id="new-arrivals" class="tab-panel">
                <?php
				$args = array(
					'post_type' => 'product',
					//'meta_key' => 'New Arrivals',
					//'meta_value' => 'yes',
					'orderby' => 'ASC',
					'posts_per_page' => -1,
				);
				 
				$loop = new WP_Query( $args );
				?>
				<ul class="products-style8 row row-eq-height">
				<?php
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
				<li class="product col-sm-6 col-md-3">
				<?php global $product; ?>
				<div class="product-container">	
				<div class="product-thumb">	
				<a href="<?php the_permalink(); ?>">					
					<?php $image = get_the_post_thumbnail_url( $loop->post->ID); ?>
					<img src="<?php echo $image; ?>" class="primary_image" />
					
					<?php $image_hover = get_field('product_hover_image'); ?>
					<img src="<?php echo $image_hover; ?>" class="secondary_image" />
				</a>
				<a class="quick-view" title="Quick view" href="<?php the_permalink(); ?>">Quick view</a>
				</div>
				<?php $new_arrivals = get_field('new_arrivals'); 
				echo $new_arrivals; 
				?>
				<div class="product-info">
					<div class="product-name">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
				</div>
				<div class="box-price">	
					<?php 
						echo $product->get_price_html(); 
					?>
				</div>
				<div class="button-control">
					<?php
						woocommerce_template_loop_add_to_cart( $loop->post, $product );
					?>
				</div>
				</div>
				</li>
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>
<!-- ./tab product -->

<!-- trending product -->
<section class="section8 block-trending">
	<h3 class="section-title">trending now</h3>
	<div class="section-content os-animation" data-os-animation="fadeIn" data-os-animation-delay="0s">
		<div class="container">
				<?php
				$args = array(
					'post_type' => 'product',
					'product_cat' => 'mens',
					'meta_key' => 'total_sales',
					'orderby' => 'meta_value_num',
					'posts_per_page' => -1,
				);
				 
				$loop = new WP_Query( $args );
				?>
				<ul class="products-style8 trending-list owl-carousel">
						<?php
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<li class="product">
							<?php global $product; ?>
							<div class="product-container">	
							<div class="product-thumb">	
							<a href="<?php the_permalink(); ?>">					
								<?php $image = get_the_post_thumbnail_url( $loop->post->ID); ?>
								<img src="<?php echo $image; ?>" class="primary_image" />
								
								<?php $image_hover = get_field('product_hover_image'); ?>
								<img src="<?php echo $image_hover; ?>" class="secondary_image" />
							</a>
							<a class="quick-view" title="Quick view" href="<?php the_permalink(); ?>">Quick view</a>
							</div>
							<div class="product-info">
								<div class="product-name">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
							<div class="box-price">	
								<?php 
									echo $product->get_price_html(); 
								?>
							</div>
							<div class="button-control">
								<?php
									woocommerce_template_loop_add_to_cart( $loop->post, $product );
								?>
							</div>
							</div>
							</li>
						<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
		</div>
	</div>
</section>
<!-- ./trending product -->

<!-- Block trending -->
<section class="section8 block-collections os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
    <div class="section-container">
        <h3 class="section-title">Collections</h3>
        <div class="section-content">
            <div class="container">
                <ul class="nav-tab">
                    <li class="active"><a data-toggle="tab" href="#collection1">FOR WOMEN</a></li>
                    <li><a data-toggle="tab" href="#collection2">FOR MEN</a></li>
                </ul>
                <div class="tab-container">
                    <div id="collection1" class="tab-panel active">
						<?php
							$args = array(
							'post_type' => 'product',
							'posts_per_page' => -1,
							'tax_query'             => array(
								array(
									'taxonomy'      => 'product_cat',
									'field' => 'term_id', //This is optional, as it defaults to 'term_id'
									'terms'         => 15,
									'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
								)
							)
						);
						 
						$loop = new WP_Query( $args );
						?>
						<ul class="collection-list owl-carousel owl-theme owl-loaded">
								<?php
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<li class="item">
									<?php global $product; ?>
										<div class="image banner-boder-zoom2">
											<a href="<?php the_permalink(); ?>">					
												<?php $image = get_the_post_thumbnail_url( $loop->post->ID); ?>
												<img src="<?php echo $image; ?>" class="primary_image" />
											</a>
										</div>
										<div class="info">
											<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="desc">
											<?php echo wp_trim_words( get_the_content(), 13, '' ); ?>
											</div>
											<div class="collection-button">
											<a href="<?php the_permalink(); ?>">View Collection</a>
											</div>
										</div>
									</li>
								<?php endwhile; ?>
						</ul>
						<?php wp_reset_query(); ?>
                    </div>
                    <div id="collection2" class="tab-panel">
						<?php
								$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query'             => array(
									array(
										'taxonomy'      => 'product_cat',
										'field' => 'term_id', //This is optional, as it defaults to 'term_id'
										'terms'         => 14,
										'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
									)
								)
							);
							 
							$loop = new WP_Query( $args );
							?>
							<ul class="collection-list owl-carousel owl-theme owl-loaded">
									<?php
									while ( $loop->have_posts() ) : $loop->the_post(); ?>
										<li class="item">
										<?php global $product; ?>
											<div class="image banner-boder-zoom2">
												<a href="<?php the_permalink(); ?>">					
													<?php $image = get_the_post_thumbnail_url( $loop->post->ID); ?>
													<img src="<?php echo $image; ?>" class="primary_image" />
												</a>
											</div>
											<div class="info">
												<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="desc">
												<?php the_excerpt(); ?>
												</div>
												<div class="collection-button">
												<a href="<?php the_permalink(); ?>">View Collection</a>
												</div>
											</div>
										</li>
									<?php endwhile; ?>
							</ul>
							<?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Block trending -->

<!-- Block testimonials -->
<section style="background-position: 50% -277px;" class="section8 block-testimonials parallax">
    <div class="section-container">
        <div class="container">
			<h3 class="section-title">Testimonials</h3>
			<div class="section-content os-animation" data-os-animation="fadeIn" data-os-animation-delay="0s">
				<?php 
				$args = array( 'post_type' => 'testimonials', 'posts_per_page' => -1 );
				$the_query = new WP_Query( $args ); 
				?>
				<?php if ( $the_query->have_posts() ) : ?>
				<ul class="effect-myZoomIn testimonial testimonial-carousel owl-carousel owl-theme owl-loaded">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li class="item">
				<div class="testimonial-image">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="content">
				<?php the_content(); ?> 
				</div>
				</li>	
				<?php wp_reset_postdata(); ?>
				<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
        </div>
    </div>
</section>
<!-- ./Block testimonials -->

<!-- Block blog -->
<section class="section8 block-blogs">
    <div class="section-container">
        <h3 class="section-title">Lastest Posts</h3>
        <div class="section-content">
            <div class="container blog-list">
                <div class="blog-list-wapper">
				<ul>

<?php 

$the_query = new WP_Query( 'cat=16&posts_per_page=-1' ); ?>
<ul class="owl-carousel owl-theme owl-loaded blogs-carousel">
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

<li>
<div class="post-thumb image-hover2">
<div class="post-thumb-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
<?Php the_post_thumbnail(); ?>
</div>
</div>
<div class="post-desc">
	<h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	<div class="post-meta">
		<span class="date"><?php echo get_the_date(); ?></span>
	</div>
	<div class="readmore">
		<a href="<?php the_permalink(); ?>">Readmore</a>
	</div>
</div>
</li>

<?php 
endwhile;
?>
<?php
wp_reset_postdata();
?>
</div>
</ul>
				</div>
			</div>
		</div>
	</div>
</section>


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


<?php get_footer(); ?>
