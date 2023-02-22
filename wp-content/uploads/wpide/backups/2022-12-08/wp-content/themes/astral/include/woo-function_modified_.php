<?php
/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support(
 'html5',
	array(
		'comment-form',
		'comment-list',
		'search-form',
		'gallery',
		'caption',
	)
);

/*
 * Enable support for Post Formats.
 */
add_theme_support(
	'post-formats',
	array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	)
);

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );
add_theme_support('custom-header');
// Load regular editor styles into the new block-based editor.
add_theme_support( 'editor-styles' );
add_theme_support( 'customize-selective-refresh-widgets' );
// Load default block styles.
add_theme_support( 'wp-block-styles' );
add_theme_support( 'title-tag' );
// Add support for responsive embeds.
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
add_theme_support( 'align-wide' );
add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'title-tag');

// Add support for woocommerce.
add_theme_support( 'woocommerce' );
// Woocom CSS 
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
/*======================================================
       Enable logo in theme
//========================================================*/

function as_logo_setup() {
	 $defaults = array(
	 'flex-height' => true,
	 'flex-width'  => true,
	 'header-text' => array( 'site-title', 'site-description' ),
	 );
	 add_theme_support( 'custom-logo', $defaults );
	 add_theme_support( 'wc-product-gallery-slider' );
	}
add_action( 'after_setup_theme', 'as_logo_setup' );

/*Social Share Icons*/
// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function as_social_buttons($content) {
    global $post;
    if(is_singular() || is_home()){    
        // Get current page URL 
        $sb_url = urlencode(get_permalink()); 
        // Get current page title
        $sb_title = str_replace( ' ', '%20', get_the_title());        
        // Get Post Thumbnail for pinterest
        $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail()); 
        
        // Construct sharing URL without using any script
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url; 
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&title='.$sb_title;
        $content .= '<a class="socialBtn m-2" href="'.$facebookURL.'" target="_blank" rel="nofollow"><i class="bi bi-facebook"></i></a>';
        $content .= '<a class="socialBtn m-2" href="'.$linkedInURL.'" target="_blank" rel="nofollow"><i class="bi bi-linkedin"></i></a>';
        $content .= '<a class="socialBtn m-2" href="https://api.whatsapp.com/send?text='.$sb_url.'" target="_blank" rel="nofollow"><i class="bi bi-whatsapp"></i></a>';
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
// Enable the_content if you want to automatically show social buttons below your post.
// add_filter( 'wp_footer', 'sc_social_buttons');
// This will create a wordpress shortcode [social].
add_shortcode('social','as_social_buttons');
/*social share icons end*/

/**
 * WordPress Breadcrumbs
 */
function tsh_wp_custom_breadcrumbs() {

    //$separator              = '';
    $breadcrumbs_id         = 'sc_breadcrumbs';
    $breadcrumbs_class      = 'breadcrumb mb-0';
    $home_title             = esc_html__('Home', 'sc');

    // Add here you custom post taxonomies
    $tsh_custom_taxonomy    = 'product_cat';

    global $post, $product, $wp_query;
       
    // Hide from front page
    if ( !is_front_page() ) {
       
        echo '<ol id="' . $breadcrumbs_id . '" class="' . $breadcrumbs_class . '">';
           
        // Home
        echo '<li class="breadcrumb-item"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // For Custom post type
            $post_type = get_post_type();
              
            // Custom post type name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="breadcrumb-item item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            $post_type = get_post_type();

            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="breadcrumb-item item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              }
            // Get post category
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Last category post is in
                $last_category = $category[count($category) - 1];
                  
                // Parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb-item item-cat">'.$parents.'</li>';
                }
             
            }

            $taxonomy_exists = taxonomy_exists($tsh_custom_taxonomy);
            if(empty($last_category) && !empty($tsh_custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $tsh_custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $tsh_custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // If the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="breadcrumb-item item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="breadcrumb-item item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // Get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents order
                $anc = array_reverse($anc);
                   
                // Parent pages
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb-item item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                   
                // Render parent pages
                echo $parents;
                   
                // Active page
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display active page if not parents pages
                echo '<li class="breadcrumb-item item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) { // Tag page
               
            // Tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Return tag name
            echo '<li class="breadcrumb-item item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) { // Day archive page
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month link
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
               
            // Day display
            echo '<li class="breadcrumb-item item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) { // Month Archive
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month display
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) { // Display year archive

            echo '<li class="breadcrumb-item item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) { // Author archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="breadcrumb-item item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="breadcrumb-item item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="breadcrumb-item item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ol>';  
    }
}
// End Breadcum

/*============================
Register widget area.
=====================+========*/
function astral_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Blog Sidebar', 'astral' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'astral' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Footer One', 'astral' ),
            'id'            => 'foot-one',
            'description'   => __( 'Add widgets here to appear content in footer two.', 'astral' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="foot_head">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Footer Two', 'astral' ),
            'id'            => 'foot-two',
            'description'   => __( 'Add widgets here to appear content in footer two.', 'astral' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h5 class="mb-4">',
            'after_title'   => '</h5>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Shop Banner', 'astral' ),
            'id'            => 'foot-three',
            'description'   => __( 'Add widgets here to appear content in footer two.', 'astral' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4 class="foot_head">',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Sanitaryware Banner', 'astral' ),
            'id'            => 'sanitaryware-banner',
            'description'   => __( 'Add widgets here to appear content in sanitaryware banner.', 'astral' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4 class="foot_head">',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Faucet Banner', 'astral' ),
            'id'            => 'faucet-banner',
            'description'   => __( 'Add widgets here to appear content in faucet banner.', 'astral' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4 class="foot_head">',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Social Media', 'astral' ),
            'id'            => 'social-media',
            'description'   => __( 'Add widgets here to appear content in footer two.', 'astral' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="foot_head">',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Woocommerce Sidebar', 'astral' ),
            'id'            => 'woocommerce-sidebar',
            'description'   => __( 'Add widgets here to appear in your sidebar on Woocommerce List and archive pages.', 'astral' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
}
add_action( 'widgets_init', 'astral_widgets_init' );
/*============================
    Register widget area End
 =============================*/
  /*============================
    Copyright in customizer
=============================*/
 function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login {
    background-size: cover !important;
    background-position: center top;
    background:linear-gradient(0deg, #6e6653, #fcc8ce00), url(https://astralbathware.com/wp-content/uploads/2022/06/homeSlide_1.jpg)
}
.login form .input, .login form input[type=checkbox], .login input[type=text] {
    border-radius: 20px;
    font-size: 13px !important;
    margin-bottom: 10px !important;
}
body.login div#login h1 a {
 background-image: url(<?php bloginfo('template_url')?>/images/AstralLogo.png);
 background-size: contain;
    width: 100%;
    height: 80px;
    margin-bottom: 0
}
#login form p.submit input {
    width: 100%;
    border: 1px solid #fff;
    border-radius: 20px;
    padding: 2px;
    float: none !important;
    background: #080808;
}
.login .button.wp-hide-pw .dashicons {
    color: #24205a;
}
.login form {
    margin-top: 0;
    margin-left: 0;
    padding: 0 !important;
    font-weight: 400;
    overflow: hidden;
    background: transparent !important;
    border: none!important;
    box-shadow: 0 1px 3px rgba(0,0,0,.04);
    color: #fff;
    text-align:center;
}
.login label {
    font-size: 13px;
    margin-bottom: 10px !important;
    text-transform:uppercase;
}
.login #backtoblog, .login #nav {
    font-size: 12px;
    padding: 0 24px 0;
    color: #fff;
    text-align: center;
    margin: 15px 0 0 0 !important;
    text-transform: uppercase;
    line-height: 1;
}
.login #backtoblog a, .login #nav a {
    color: #fff !important;
}
</style>
<?php 
    } 
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
//login url

function groom_custom_login_url($url) {
   $url = home_url();
    return $url;
}
add_filter( 'login_headerurl', 'groom_custom_login_url' );

/*========================================
     End Login Form
===============================*/
 function basic_customize_register( $wp_customize ) {
  
  $wp_customize->add_section('copyright_options', array(
    'title'    => __('Copyright', 'astral'),
    'priority' => 121,
  ));
  $wp_customize->add_setting('copyright', array( 'default'   => '', 'type' => 'theme_mod', 'sanitize_callback' => 'wp_kses_post', 'transport'   => 'refresh'));
  $wp_customize->add_control( 'copyright', array(
    'settings' => 'copyright',
    'label'   => 'Enter Copyright Text',
    'section' => 'copyright_options',
    'type'    => 'textarea'
  ));
}
add_action( 'customize_register', 'basic_customize_register' );
/*=====================================
    Copyright in customizer end
======================================*/
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20);
function cw_remove_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'cw_remove_quantity_fields', 10, 2 );

/**
 * Remove product page tabs
 */
add_filter( 'woocommerce_product_tabs', 'my_remove_all_product_tabs', 98 );
 
function my_remove_all_product_tabs( $tabs ) {
  unset( $tabs['description'] );        // Remove the description tab
  unset( $tabs['reviews'] );       // Remove the reviews tab
  unset( $tabs['additional_information'] );    // Remove the additional information tab
  return $tabs;
}

add_filter( 'woocommerce_is_purchasable', '__return_false');

// Menu  Div inside submenu
class Child_Wrap extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"subMenuContainer px-lg-4\"><div class=\"container\"><ul class=\"subMenuLinks row\">\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div></div>\n";
    }
  }

/*Replace Dropdown class in menu*/

function sc_submenu_class($menu) {
    $menu = preg_replace('/ class="dropdown-menu"/','/ class="submenu_L1" /',$menu);  
    return $menu;  
}
add_filter('wp_nav_menu','sc_submenu_class');

/*Acf option*/
/*if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();	
}*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'astral_loop_shop_per_page', 20 );

function astral_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
    $cols = 12;
  return $cols;
}
/*Search with SKU*/

function search_by_sku( $search, &$query_vars ) {
    global $wpdb;
    if(isset($query_vars->query['s']) && !empty($query_vars->query['s'])){
        $args = array(
            'posts_per_page'  => -1,
            'post_type'       => 'product',
            'meta_query' => array(
                array(
                    'key' => '_sku',
                    'value' => $query_vars->query['s'],
                    'compare' => 'LIKE'
                )
            )
        );
        $posts = get_posts($args);
        if(empty($posts)) return $search;
        $get_post_ids = array();
        foreach($posts as $post){
            $get_post_ids[] = $post->ID;
        }
        if(sizeof( $get_post_ids ) > 0 ) {
                $search = str_replace( 'AND (((', "AND ((({$wpdb->posts}.ID IN (" . implode( ',', $get_post_ids ) . ")) OR (", $search);
        }
    }
    return $search;    
}
add_filter( 'posts_search', 'search_by_sku', 999, 2 );

// Redirect WooCommerce Shop URL

/*function wpc_shop_url_redirect() {
    if( is_shop() ){
        wp_redirect( home_url( '' ) ); // Assign custom internal page here
        exit();
    }
}
add_action( 'template_redirect', 'wpc_shop_url_redirect' );*/

/*Remove WordPress menu and symbol from admin bar 
function remove_wp_logo( $wp_admin_bar ) {
 $wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
*/                               
/*//Disable WP Json API Manually                               

add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
    return $result;
  }
  if ( ! is_user_logged_in() ) {
    return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
  }
  if ( ! current_user_can( 'administrator' ) ) {
    return new WP_Error( 'rest_not_admin', 'You are not an administrator.', array( 'status' => 401 ) );
  }
  return $result;
});
 */                              
//Stop clickjacking                               
function block_frames() {
	header( 'X-FRAME-OPTIONS: SAMEORIGIN' );
}
add_action( 'send_headers', 'block_frames', 10 );

//Hide a post type menu item from non-admin users
function wpse28782_remove_menu_items() {
    if(current_user_can( 'hrteam' ) ):
        remove_menu_page( 'edit.php?post_type=contact_us' );
        remove_menu_page( 'edit.php?post_type=mediacenterevents' );
        remove_menu_page( 'edit.php?post_type=eventsgallery' );
        remove_menu_page( 'edit.php?post_type=eventsvideogallery' );
        remove_menu_page( 'edit.php?post_type=catalogue' );
        remove_menu_page( 'edit.php?post_type=faucetcatalogue' );
        remove_menu_page( 'edit.php?post_type=saniwarecatalogue' );
        remove_menu_page( 'edit.php?post_type=officeaddresses' );
        remove_menu_page( 'post_type=viwcpf_filter_block' );
        remove_menu_page( 'post_type=product' );
        remove_menu_page( 'page=theme-general-settings' );
        remove_menu_page( 'edit-comments.php' );
    endif;
}
add_action( 'admin_menu', 'wpse28782_remove_menu_items' );