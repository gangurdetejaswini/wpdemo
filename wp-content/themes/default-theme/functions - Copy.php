<?php 
// http://wordpress.stackexchange.com/questions/210538/create-custom-post-with-custom-user-rules
require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 
require_once(TEMPLATEPATH . '/includes/functions/custom-post.php'); 

 
//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
    register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );
}


//Add files for menu
function default_enqueue_style() {
	/*wp_enqueue_style( 'jquery-ui', get_stylesheet_directory_uri().'/css/jquery-ui.css', false ); 
	wp_enqueue_style( 'slider-style', get_stylesheet_directory_uri().'/css/slider-style.css', false ); 
	wp_enqueue_style( 'filter_gallery', get_stylesheet_directory_uri().'/css/filter_gallery.css', false ); */
	
	
	
	wp_enqueue_style( 'isotope-docs', get_stylesheet_directory_uri().'/css/isotope-docs.css', false ); 
	wp_enqueue_style( 'jquery.fancybox.min', get_stylesheet_directory_uri().'/css/jquery.fancybox.min.css', false ); 
}

function default_enqueue_script() {
	//wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri().'/js/jquery-ui.js', false );
	//wp_enqueue_script( 'jquery-3.1.1.min', get_stylesheet_directory_uri().'/js/jquery-3.1.1.min.js', false );
	//wp_enqueue_script( 'jquery-1', get_stylesheet_directory_uri().'/js/jquery-1.js', false );
	/*wp_enqueue_script( 'filter_gallery', get_stylesheet_directory_uri().'/js/filter_gallery.js', false );
	wp_enqueue_script( 'jquery-min-filter', get_stylesheet_directory_uri().'/js/jquery-min-filter.js', false );*/
	
	
	//wp_enqueue_script( 'jquery.min', get_stylesheet_directory_uri().'/js/jquery.min.js', false );
	
	wp_enqueue_script( 'isotope-docs.min', get_stylesheet_directory_uri().'/js/isotope-docs.min.js', false );
	wp_enqueue_script( 'jquery.fancybox.min', get_stylesheet_directory_uri().'/js/jquery.fancybox.min.js', false );
}
add_action( 'wp_enqueue_scripts', 'default_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'default_enqueue_script' );


//Enable multisite feature (WordPress 3.0)
define('WP_ALLOW_MULTISITE', true);

// custom logo uploader
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

// Remove woocommerce style from plugin 
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	return $enqueue_styles;
}

function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
 
// page header image

function page_header_image() {
	global $post;

	$res = '<div class="uk-header-image uk-position-relative"><div class="uk-background-cover" style= "background-image: url('.get_the_post_thumbnail_url($post->ID).')">'.get_the_post_thumbnail($post->ID).'</div>
	<div class="header-page-title os-animation" data-os-animation="fadeIn" data-os-animation-delay="1s"><div>'.get_the_title($post->ID).'</div></div></div>';
	return $res;
}

add_shortcode('page-header-image', 'page_header_image');




function woocommerce_product_download() {
    global $post;
    $downloads = get_post_meta($post->ID,'test',true)
    ?>
    <ul>
    <?php
         for ($i = 0; $i <= (count($downloads['name']) - 1); $i++) {
            echo '<li><a href="'.$downloads['path'][$i].'">'.$downloads['name'][$i].'</a></li>';
        }
    ?>    
    </ul>
    <?php
}

/*
 * Add downloads custom field for product
 */
add_action('add_meta_boxes_product', function() {
    add_meta_box('test', 'Downloads', 'add_product_downloads', 'product', 'normal', 'core');
});

function add_product_downloads($post) {
    wp_nonce_field('wsi-product-download', 'wsi_nonce_19890914');
    $downloads = get_post_meta($post->ID, 'test', true);
    
    ?>
    <div id="field_wrap">
    <?php
    if ($downloads && $downloads != '' && is_array($downloads)) {
        for ($i = 0; $i <= (count($downloads['name']) - 1); $i++) {
//            foreach ($downloads as $download) {
            ?>
                <table class="inner_wrap" width="100%">
                    <tr>
                        <td>
                            <strong>Name:</strong><br/>
                            <input type="text" name="test[name][]" value="<?php echo $downloads['name'][$i]; ?>" />

                        </td>
                        <td>
                            <strong>File:</strong><br/>
                            <input type="text" class="meta_pdf_url"   name="test[path][]" value="<?php echo $downloads['path'][$i]; ?>" />
                            <input class="button" type="button" value="Choose File" onclick="add_image(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="button" type="button" value="Remove" onclick="remove_field(this);" />
                        </td>
                    </tr>
                </table>
            <?php
        }
    }
    ?>

    </div>
    <div id="add_field_row">
        <input class="button" type="button" value="Add New Download" onclick="add_field_row();" />
    </div>
    <?php
}


add_action('admin_head-post.php', 'print_scripts_so_19890914');
add_action('admin_head-post-new.php', 'print_scripts_so_19890914');

/**
 * Print styles and scripts
 */
function print_scripts_so_19890914() {
    // Check for correct post_type
    global $post;
    if ('product' != $post->post_type)
        return;
    ?>  
    <script type="text/javascript">
        function add_image(obj) {
            var inputField = jQuery(obj).parent().find("input.meta_pdf_url");

            tb_show('', 'media-upload.php?TB_iframe=true');

            window.send_to_editor = function(html) {
                var url = jQuery(html).attr('href');
                inputField.val(url);
                tb_remove();
            };

            return false;
        }

        function remove_field(obj) {
            jQuery(obj).parents('.inner_wrap').remove();
        }

        function add_field_row() {
            jQuery('#field_wrap').append('<table  width="100%" class="inner_wrap"><tr><td><strong>Name:</strong><br/><input type="text" name="test[name][]" /></td><td><strong>File:</strong><br/><input type="text" class="meta_pdf_url"  name="test[path][]" /><input class="button" type="button" value="Choose File" onclick="add_image(this)" /></td></tr><tr><td colspan="2"><input class="button" type="button" value="Remove" onclick="remove_field(this);" /></td></tr></table>');
        }
    </script>
    <?php
}

add_action('save_post', function($post_id, $post) {
    
    // Doing revision, exit earlier **can be removed**
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // Doing revision, exit earlier
    if ('revision' == $post->post_type)
        return;

    // Verify authenticity
    if (!wp_verify_nonce($_POST['wsi_nonce_19890914'], 'wsi-product-download'))
        return;


    if ('product' != $_POST['post_type'])
        return;
    
    if ($_POST['test'] && !empty($_POST['test'])) {
        update_post_meta($post_id, 'test', $_POST['test']);
    } else {
        delete_post_meta($post_id, 'test');
    }
}, 10, 2);


// Projects post type
add_action('init', 'create_project_type');

function create_project_type() {
    register_post_type('projects', array(
        'labels' => array(
            'name' => _('Projects'),
            'singular_name' => ('Product'),
        ),
        'menu_icon' => 'dashicons-admin-post',
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'excerpt', 'revisions'),
    ));
}

add_action('init', 'create_project_taxonomy');

function create_project_taxonomy() {
    register_taxonomy('project_category', 'projects', array(
        'labels' => array(
            'name' => _('Project Category'),
            'singular_name' => _('Project Category'),
        ),
        'hierarchical' => True,
        'show_in_quick_edit' => True,
        'rewrite' => array('hierarchical' => True),
    ));
}


// breadcrumbs shortcode
function wsi_breadcrumb_shortcode() {   
     
    // Settings
    $separator          = '';
    $breadcrums_class   = 'uk-breadcrumb';
    $home_title         = 'Home';
      
    $custom_taxonomy    = 'product_cat';
       
    global $post,$wp_query;
       
    if ( !is_front_page() ) {
       
        $result = '<ul class="' . $breadcrums_class . '">';
           
        $result .= '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        $result .= '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            $result .= '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            $post_type = get_post_type();
              
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $result .= '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                $result .= '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            $result .= '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            $post_type = get_post_type();
              
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $result .= '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                $result .= '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $category = get_the_category();
             
            if(!empty($category)) {
              
                $last_category = end(array_values($category));
                  
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            if(!empty($last_category)) {
                $result .= $cat_display;
                $result .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            } else if(!empty($cat_id)) {
                  
                $result .= '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                $result .= '<li class="separator"> ' . $separator . ' </li>';
                $result .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                $result .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
		    $category = get_the_category();
			$parent = get_cat_name($category[0]->category_parent);
			$parent_category_id = get_cat_ID($parent);
			$parent_category_link = get_category_link( $parent_category_id );
			
			$cat = get_cat_id( single_cat_title( "", false ) );
		
$category = get_queried_object();
$single_category_id = $category->term_id;
$single_category_name = $category->name;
echo '<p></p>';

/*if($parent_category_id == $single_category_id){
	echo 'same';
} else {
	echo 'not same';
}
*/
/*			
$parentscategory ="";
foreach((get_the_category()) as $category) {
if ($category->category_parent == 0) {
$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
}
}
echo substr($parentscategory,0,-2);*/
/*if (($parent_category_id != $single_category_id) ) {
	$result .= 'not same';
} else {
	$result .= 'same';
}*/
			/*if (!empty($parent) && ($parent_category_id != $single_category_id) ) {
				//$result .= '<li class="item-cat item-parent-cat"><a class="bread-current bread-cat"> ' . $single_category . ' </a></li>';
				$result .= '<li class="item-cat item-parent-cat"><a class="bread-current bread-cat" href="'.$parent_category_link.'"> ' . $parent . ' </a></li>';
				$result .= '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
			} else {
				$result .= '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
			}*/
			
            $result .= get_category_parents( $cat, true,'');
               
        } else if ( is_page() ) {
               
            if( $post->post_parent ){
                   
                $anc = get_post_ancestors( $post->ID );
                   
                $anc = array_reverse($anc);
                   
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                $result .= $parents;
                   
                $result .= '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
				   
                $result .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
			
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            $result .= '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
			
            $result .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            $result .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            $result .= '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            $result .= '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            $result .= '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
            $result .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            $result .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            $result .= '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
            $result .= '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            $result .= '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
            $result .= '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
            $result .= '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
            $result .= '<li>' . 'Error 404' . '</li>';
        }
       
        $result .= '</ul>';
           
    }
	
	return $result;
}

add_shortcode('wsi_breadcrumbs','wsi_breadcrumb_shortcode');
