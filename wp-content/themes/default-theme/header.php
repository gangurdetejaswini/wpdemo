<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php } ?>
<title>
<?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?>
</title>


<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/filter_gallery.css" />
 <?php /*
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.bxslider.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/option8.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/woocommerce.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
*/?>
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
 
 <div id="header" class="header header8 optop">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6">
					<?php if ( is_active_sidebar( 'top-header-left' ) ) : ?>
					<div class="top-header-left">
					<?php dynamic_sidebar( 'top-header-left' ); ?>
					</div>
					<?php endif; ?>
				</div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
					<?php if ( is_active_sidebar( 'top-header-right' ) ) : ?>
					<div class="top-header-right">
					<?php dynamic_sidebar( 'top-header-right' ); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div id="main-header">
        <div class="container main-header">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-lg-3 logo">
					<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<a href="'.get_home_url().'" class="tm-logo"><img src="'. esc_url( $logo[0] ) .'"></a>';
					} else {
						echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
					}
					?>
				</div>
				<div class="col-sm-10 col-md-7 col-lg-8 main-menu-wapper">
					<div id="main-menu" class="main-menu">
						<nav class="navbar navbar-default">
						<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'primary-menu' ) ); ?>
						</nav>
					</div>
				</div>
                <div class="col-sm-2 col-md-2 col-lg-1 group-button-header">
					<?php if ( is_active_sidebar( 'headerbar' ) ) : ?>
					<div class="hearbar">
					<?php dynamic_sidebar( 'headerbar' ); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
 </div>
 
<?php if(is_home() || is_front_page()):?>
<!--Banner Starts-->
  <div id="home-banner" class="clearfix">
    <?php 
	$args = array( 'post_type' => 'sliders', 'posts_per_page' => -1 );
	$the_query = new WP_Query( $args ); 
	?>
	<?php if ( $the_query->have_posts() ) : ?>
	<ul class="bxslider bxslider-background">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<li class="item" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
	<div class="content">
	<?php the_content(); ?> 
	</div>
	</li>	
	<?php wp_reset_postdata(); ?>
	<?php endwhile; ?>
	</ul>
	<?php endif; ?>

  </div>
  <?php /*
  <div id="home-banner" class="clearfix">
    <?php 
		$i = 1;
		$args = array( 'post_type' => 'sliders', 'posts_per_page' => -1 );
		$the_query = new WP_Query( $args ); 
	?>
	<div id="myCarousel" class="carousel slide visible-lg multi-item-carousel">
		<div class="carousel-inner">
			<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post();
			if($i == 1): ?>	
				<div class="item active">
				<div class="col-xs-4">
					<div class="content">
					<?php the_content(); ?> 
					</div>
				</div>	
				</div>
			<?php else:?>
				<div class="item">
				<div class="col-xs-4">
					<div class="content">
					<?php the_content(); ?> 
					</div>
				</div>	
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata();
			$i++;
			?>			
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
<i class="fa fa-angle-left fa-2x"></i></a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
<i class="fa fa-angle-right fa-2x"></i></a>

	</div>

  </div>
  */?>
<!--Banner Ends-->
<?php else: ?>
<section class="uk-top-header">
	<?php if ( is_active_sidebar( 'top-header-image' ) ) : ?>
	<div class="hearbar">
	<?php dynamic_sidebar( 'top-header-image' ); ?>
	</div>
	<?php endif; ?>
</section>
<?php endif; ?>

<?php echo do_shortcode('[wsi_breadcrumbs]'); ?>