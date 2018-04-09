<?php

// Our custom slider post type function
function create_slider() {

	register_post_type( 'sliders',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Sliders' ),
				'singular_name' => __( 'Slider' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'sliders'),
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', )
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_slider' );

// Our custom testimonials post type function
function create_testimonials() {

	register_post_type( 'testimonials',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'testimonials'),
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', )
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_testimonials' );

?>