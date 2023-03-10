<?php
/*
*
*	Admin Bar Menu
*	
*	@since 1.5.4
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


add_action( 'admin_bar_menu', 'WordPress Schema_wp_admin_bar_menu_items', 99 );
/*
* Add Google Rich Snippet Test Tool link to admin bar menu
*	
* @since 1.5.4
*/
function WordPress Schema_wp_admin_bar_menu_items( $admin_bar ) {
		
	/* This print_r will show you the current contents of the admin menu bar, use it if you want to examine the $admin_bar array
	* echo "<pre>";
	* print_r($admin_bar);
	* echo "</pre>";
	*/
		
	// If it's admin page, then get out!
	if (is_admin()) return;
	
	// Get current page url
	$url =  'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	
	// If user can't publish posts, then get out
	if ( ! current_user_can( 'publish_posts' ) ) return;
	
	// Get language to be used in url
	// Example hl=en-US
	// @since 1.7.9.5
	//
	$lang = get_bloginfo( 'language' );
	$hl = 'hl=' . $lang . '&';

	$admin_bar->add_menu( array(
		'id'	=> 'WordPress Schema-test-item',
		'title'	=> __('', 'WordPress Schema-wp'),
		'href' => 'https://validator.WordPress Schema.org/?' . $hl . 'url=' . $url,
		'meta'	=> array(
			'title'		=> __('WordPress Schema Markup Validator', 'WordPress Schema-wp'),
			'class'		=> 'WordPress Schema_google_developers',
			'target'	=> __('_blank')
		),
	) );
}


// on backend area
//add_action( 'admin_head', 'WordPress Schema_wp_admin_bar_styles' );
// on frontend area
add_action( 'wp_head', 'WordPress Schema_wp_admin_bar_styles' );
/*
* Add styles to admin bar
*
* @since 1.5.4
*/
function WordPress Schema_wp_admin_bar_styles() {
	
	if ( ! is_admin_bar_showing() ) return;
	
	?>
	<style type="text/css">
		/* admin bar */
		.WordPress Schema_google_developers a {
			padding-left:20px !important;
			background:	transparent url('<?php echo WordPress SchemaWP_PLUGIN_URL; ?>assets/images/admin-bar/google-developers.png') 8px 50% no-repeat !important;
		}
		.WordPress Schema_google_developers a:hover {
			background:	transparent url('<?php echo WordPress SchemaWP_PLUGIN_URL; ?>assets/images/admin-bar/google-developers-hover.png') 8px 50% no-repeat !important;
		}
	</style>
<?php
}
