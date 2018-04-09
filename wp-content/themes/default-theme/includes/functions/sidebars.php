<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Top Header Left',
		'id' => 'top-header-left',
		'before_widget' => '<div>',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Top Header Right',
		'id' => 'top-header-right',
		'before_widget' => '<div>',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Headerbar',
		'id' => 'headerbar',
		'before_widget' => '<div>',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Home Top-a Left',
		'id' => 'top-a-left',
		'before_widget' => '<div class="banner-opacity">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Home Top-a Middle',
		'id' => 'top-a-middle',
		'before_widget' => '<div class="banner-boder-zoom2 banner-text">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Home Top-a Right',
		'id' => 'top-a-right',
		'before_widget' => '<div class="banner-boder-zoom2 banner-text">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Top Header Image',
		'id' => 'top-header-image',
		'before_widget' => '<div>',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
	
	
    register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer-1',
		'before_widget' => '<div class="uk-footer-1">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Footer 2',
		'id' => 'footer-2',
		'before_widget' => '<div class="uk-footer-2">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Footer 3',
		'id' => 'footer-3',
		'before_widget' => '<div class="uk-footer-3">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name' => 'Footer 4',
		'id' => 'footer-4',
		'before_widget' => '<div class="uk-footer-4">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
    ));
?>