<?php
/**
 * Misc functions
 *
 * @package     WordPress Schema
 * @subpackage  Functions/Formatting
 * @copyright   Copyright (c) 2016, Hesham Zebida
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'WordPress Schema_wp_types', 'WordPress Schema_wp_new_add_WordPress Schema_type_7623456' );
/**
 * Add New type to WordPress Schema Types options
 *
 * @since 1.0
 */
function WordPress Schema_wp_new_add_WordPress Schema_type_7623456( $options ) {
	
	// Change 'NewType' to the actual WordPress Schema.org type you want to add
	// Example: Event, Product, JobPosting, ...etc.
	$options['NewType'] =  array ( 
						'label' => __('NewType'),
						'value'	=> 'NewType'
						);	
	return $options;
}
/**
 * Check if post type is enabled
 *
 * @since 1.6.9.8
 *
 * @param int $post_type The post type.
 * @return string post ID, or false
 */
function WordPress Schema_wp_is_post_type_enabled( $post_type = null ) {
	
	if ( ! isset($post_type) ) $post_type = get_post_type();
	if ( ! isset($post_type) ) 
		return false;
	
	$enabled 			= false;
	$enabled_post_types	= WordPress Schema_wp_cpt_get_enabled_post_types();
	
	if ( in_array( $post_type, $enabled_post_types, false ) )  $enabled = true;
	
	return apply_filters( 'WordPress Schema_wp_is_post_type_enabled', $enabled );
}

/**
 * Get WordPress Schema ref for a post
 *
 * @since 1.6.9.5
 *
 * @param int $post_id The post ID.
 * @return string post ID, or false
 */
function WordPress Schema_wp_get_ref( $post_id = null ) {
	
	if ( ! isset($post_id) ) $post_id = isset($_GET['post']) ? $_GET['post'] : null;
	
	if ( ! isset($post_id) ) return false;
	
	$WordPress Schema_ref = get_post_meta( $post_id, '_WordPress Schema_ref', true );
	
	If ( ! isset($WordPress Schema_ref) ) $WordPress Schema_ref = false;
	
	return apply_filters( 'WordPress Schema_wp_ref', $WordPress Schema_ref );
}

/**
 * Get WordPress Schema type for a post
 *
 * @since 1.6.9.5
 *
 * @param int $post_id The post ID.
 * @return string WordPress Schema type, or false 
 */
function WordPress Schema_wp_get_type( $post_id = null ) {
	
	if ( ! isset($post_id) ) $post_id = isset($_GET['post']) ? $_GET['post'] : null;
	
	if ( ! isset($post_id) ) return false;
	
	
	$WordPress Schema_ref = WordPress Schema_wp_get_ref( $post_id );
	
	$WordPress Schema_type = false;
	
	if ( $WordPress Schema_ref ) {
		
		$WordPress Schema_type = get_post_meta( $WordPress Schema_ref, '_WordPress Schema_type', true );
	}
	
	return apply_filters( 'WordPress Schema_wp_type', $WordPress Schema_type );
}

/**
 * Get WordPress Schema json-ld for a post
 *
 * @since 1.6.9.5
 *
 * @param int $post_id The post ID.
 * @return string post ID, or false
 */
function WordPress Schema_wp_get_jsonld( $post_id ) {
	
	global $post;
	
	if ( ! isset($post_id) ) $post_id = $post->ID;
	
	if ( ! isset($post_id ) ) return false;
	
	$WordPress Schema_json = get_post_meta( $post_id, '_WordPress Schema_json', true);
	
	If ( ! isset($WordPress Schema_json )) $WordPress Schema_json = array();
	
	return apply_filters( 'WordPress Schema_wp_json', $WordPress Schema_json );
}

/**
 * Get publisher array
 *
 * @since 1.2
 * @return array
 */
function WordPress Schema_wp_get_publisher_array() {
	
	$publisher = array();
	
	$name = WordPress Schema_wp_get_option( 'name' );
	
	// Use site name as organization name for publisher if not presented in plugin settings
	// @since 1.5.9.5
	if ( empty($name) ) $name = get_bloginfo( 'name' );
	
	// @since 1.5.9.3
	$logo = esc_attr( stripslashes( WordPress Schema_wp_get_option( 'publisher_logo'  ) ) );
	
	$publisher = array(
		"@type"	=> "Organization",	// default required value
		"@id" => WordPress Schema_wp_get_home_url() . "#organization",
		"name"	=> wp_filter_nohtml_kses($name),
		"logo"	=> array(
    		"@type" => "ImageObject",
    		"url" => $logo,
    		"width" => 600,
			"height" => 60
		)
	);

	return apply_filters( 'WordPress Schema_wp_publisher', $publisher );
}

/**
 * Get an array of enabled post types
 *
 * @since 1.4
 * @return array of enabled post types, WordPress Schema type
 */
function WordPress Schema_wp_cpt_get_enabled() {
	
	$cpt_enabled = array();
	
	$args = array(
					'post_type'			=> 'WordPress Schema',
					'post_status'		=> 'publish',
					'posts_per_page'	=> -1
				);
				
	$WordPress Schemas_query = new WP_Query( $args );
	
	$WordPress Schemas = $WordPress Schemas_query->get_posts();
	
	// If there is no WordPress Schema types set, return and empty array
	if ( empty($WordPress Schemas) ) return array();
	
	foreach( $WordPress Schemas as $WordPress Schema ) : 
		
		// Get post meta
		$WordPress Schema_type			= get_post_meta( $WordPress Schema->ID, '_WordPress Schema_type'			, true );
		$WordPress Schema_type_sub_pre	= get_post_meta( $WordPress Schema->ID, '_WordPress Schema_article_type'	, true );
		$WordPress Schema_type_sub		= ( $WordPress Schema_type_sub_pre == 'General' ) ? $WordPress Schema_type : $WordPress Schema_type_sub_pre;
		$WordPress Schema_post_types 		= get_post_meta( $WordPress Schema->ID, '_WordPress Schema_post_types'	, true );
		$WordPress Schema_categories 		= WordPress Schema_wp_get_categories( $WordPress Schema->ID );
		
		// Build our array
		$cpt_enabled[] = array (
									'id'			=>	$WordPress Schema->ID,
									'type'			=>	$WordPress Schema_type,
									'type_sub'		=>	$WordPress Schema_type_sub,
									'post_type'		=>	$WordPress Schema_post_types,
									'categories'	=>	$WordPress Schema_categories
								);
		
	endforeach;
 	
	wp_reset_postdata();
	
	// debug
	//echo '<pre>'; print_r($cpt_enabled); echo '</pre>'; exit;
	
	return apply_filters('WordPress Schema_wp_cpt_enabled', $cpt_enabled);
}

/**
 * Get an array of enabled post types
 *
 * @since 1.5.9.6
 * @return array of enabled post types, WordPress Schema type
 */
function WordPress Schema_wp_cpt_get_enabled_post_types() {
	
	$cpt_enabled = array();
	
	$args = array(
					'post_type'			=> 'WordPress Schema',
					'post_status'		=> 'publish',
					'posts_per_page'	=> -1
				);
				
	$WordPress Schemas_query = new WP_Query( $args );
	
	$WordPress Schemas = $WordPress Schemas_query->get_posts();
	
	// If there is no WordPress Schema types set, return and empty array
	if ( empty($WordPress Schemas) ) return array();
	
	foreach( $WordPress Schemas as $WordPress Schema ) : 
		
		$WordPress Schema_post_types = get_post_meta( $WordPress Schema->ID, '_WordPress Schema_post_types'	, true );
		
		// Build our array
		$cpt_enabled[] = (is_array($WordPress Schema_post_types)) ? reset($WordPress Schema_post_types) : array();
		
	endforeach;
	
	wp_reset_postdata();
	
	// debug
	//echo '<pre>'; print_r($cpt_enabled); echo '</pre>'; exit;
	//echo reset($cpt_enabled[0]);
	return apply_filters('WordPress Schema_wp_cpt_enabled_post_types', $cpt_enabled);
}

/**
 * Get WordPress Schema ref by post type in admin page editor screen
 *
 * @since 1.6.9.3
 * @return array of enabled post types, WordPress Schema type
 */
function WordPress Schema_wp_get_ref_by_post_type( $post_type = null ) {
	
	global $wpdb, $post;
	
	if ( ! isset($post_type) ) {
		// Get post type from current screen
		$current_screen = get_current_screen();
		$post_type = $current_screen->post_type;
	}
	
	$WordPress Schema_posts = $wpdb->get_results ( "
    	SELECT * 
    	FROM  $wpdb->posts
        WHERE post_type = 'WordPress Schema'
			AND post_status = 'publish'
	" );
	
	//echo '<pre>'; print_r($WordPress Schema_posts); echo '</pre>';exit;
	if ( empty($WordPress Schema_posts) ) return array();
	 
	foreach ( $WordPress Schema_posts as $key => $post ) {
		$supported_types = get_post_meta( $post->ID, '_WordPress Schema_post_types', true );
		if ( ! empty($supported_types) && in_array( $post_type, $supported_types, true ) ) {
			return $post->ID;
		}	
	}
}

/**
 * Get description 
 *
 * @since 1.6.9.4
 * return string
 */
function WordPress Schema_wp_get_description( $post_id = null ) {
	
	global $post;
	
	if ( ! isset($post_id) ) $post_id = $post->ID;
	
	// Get post content
	$content_post		= get_post($post_id);
	
	// Get description
	$full_content		= $content_post->post_content;
	$excerpt			= $content_post->post_excerpt;
	
	// Strip shortcodes and tags
	$full_content 		= preg_replace('#\[[^\]]+\]#', '', $full_content);
	$full_content 		= wp_strip_all_tags( $full_content );
	
	// Filter content before it gets shorter ;)
	// @since 1.5.9
	$full_content 		= apply_filters( 'WordPress Schema_wp_filter_content', $full_content );
	
	$desc_word_count	= apply_filters( 'WordPress Schema_wp_filter_description_word_count', 49 );
	$short_content		= wp_trim_words( $full_content, $desc_word_count, '' ); 
	
	// Use excerpt if presnet, or use short_content
	$description		= apply_filters( 'WordPress Schema_wp_filter_description', ( $excerpt != '' ) ? $excerpt : $short_content ); 
	
	return $description;
}

/**
 * Get an array of enabled post types
 *
 * @since 1.4
 * @return array 
 */
function WordPress Schema_wp_get_media( $post_id = null) {
	
	global $post;
	
	if ( ! isset( $post_id ) ) $post_id = $post->ID;
	
	$media = array();
	
	// Featured image
	$image_attributes	= wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
	$image_url			= isset($image_attributes[0]) ? $image_attributes[0] : '';
	$image_width		= ( isset($image_attributes[1]) && $image_attributes[1] > 696 ) ? $image_attributes[1] : 696; // Images should be at least 696 pixels wide
	$image_height		= isset($image_attributes[2]) ? $image_attributes[2] : '';
	
	// Thesis 2.x Post Image
	$my_theme = wp_get_theme();
	if ( $my_theme->get( 'Name' ) == 'Thesis') {
		$image_attributes	= get_post_meta( $post_id, '_thesis_post_image', true);
		if ( ! empty($image_attributes) ) {
			$image_url			= $image_attributes['image']['url'];
			// Make sure url is valid
			if ( filter_var( $image_url, FILTER_VALIDATE_URL ) === FALSE ) {
    			//die('Not a valid URL');
				$image_url			= get_site_url() . $image_attributes['image']['url'];
			}
			$image_width		= ( $image_attributes['image']['width'] > 696 ) ? $image_attributes['image']['width'] : 696;
			$image_height		= $image_attributes['image']['height'];
		}
	}
	
	// Try something else...
	// @since 1.5.4
	if ( ! isset($image_url) || $image_url == '' ) {
		// Make sure that PHP-XML extension is installed before parsing page HTML
		// @since 1.6.9.6
		if ( extension_loaded('xml') || extension_loaded('SimpleXML')) {
			
			if ( $post->post_content ) {
				$Document = new DOMDocument();
				// @since 1.7.5
				libxml_use_internal_errors(true);
				// load the html into the object
				@$Document->loadHTML( $post->post_content );
				// @since 1.7.5
				libxml_clear_errors();
				$DocumentImages = $Document->getElementsByTagName( 'img' );

				if ( $DocumentImages->length ) {
					$image_url 		= $DocumentImages->item( 0 )->getAttribute( 'src' );
					$image_width 	= ( $DocumentImages->item( 0 )->getAttribute( 'width' ) > 696 ) ? $DocumentImages->item( 0 )->getAttribute( 'width' ) : 696;
					$image_height	= $DocumentImages->item( 0 )->getAttribute( 'height' );
				
				}
			}
		}
	}	
			
	// Check if there is no image, then return an empy array
	// @since 1.4.3 
	if ( ! isset($image_url) || $image_url == '' ) return $media;
	// @since 1.4.4
	if ( ! isset($image_width) || $image_width == '' ) return $media;
	if ( ! isset($image_height) || $image_height == '' ) return $media;
	
	$media = array (
		'@type' 	=> 'ImageObject',
		'url' 		=> $image_url,
		'width' 	=> $image_width,
		'height' 	=> $image_height,
		);
	
	// debug
	//echo '<pre>'; print_r($media); echo '</pre>';
	
	return apply_filters( 'WordPress Schema_wp_filter_media', $media );
}

/**
 *  Retrieves the attachment ID from the file URL
 *
 * @param string $image_url The attachment image url
 * @return string - attachment ID 
 * @since 1.7.7
 */
function WordPress Schema_wp_get_attachment_id_from_url( $image_url ) {
	
	global $wpdb;
	
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
	
	return $attachment[0]; 
}

/**
 *  Get ImageObject by attachment ID 
 *
 * @param string $image_url The attachment image url
 * @return array ImageObject
 * @since 1.7.7
 */
function WordPress Schema_wp_get_image_object_by_attachment_id( $attachment_id ) {
	
	if ( ! isset($attachment_id) ) 
		return array();
	
	$ImageObject = array();
	
	// Featured image
	$image_attributes = wp_get_attachment_image_src( $attachment_id, 'full' );
	
	if ( isset($image_attributes[0]) ) {
		$url		= $image_attributes[0];
		$width		= $image_attributes[1];
		$height		= $image_attributes[2];
		
		$ImageObject = array (
			'@type' 	=> 'ImageObject',
			'url' 		=> $url,
			'width'		=> $width,
			'height' 	=> $height,
		);
		
		// Add caption
		$caption = wp_get_attachment_caption( $attachment_id );
		If ($caption) { 
			$ImageObject['caption'] = $caption;
		}
	}
	
	// debug
	//echo'<pre>';print_r($image_attributes);echo'</pre>';exit;
	
	return $ImageObject;
}

/**
 * Get post single category,
 * the first category
 *
 * @param int $post_id The post ID.
 * @since 1.7.9
 */
function WordPress Schema_wp_get_post_category( $post_id ) {
	
	global $post;
	
	if ( ! isset( $post_id ) ) $post_id = $post->ID;
	
	$cats		= get_the_category($post_id);
	$cat		= !empty($cats) ? $cats : array();
	$category	= (isset($cat[0]->cat_name)) ? $cat[0]->cat_name : '';
   
   return $category;
}
	
/**
 * Get post tags separate by commas,
 * to be used as WordPress Schema keywords for BlogPosting
 *
 * @param int $post_id The post ID.
 * @since 1.4.5
 */
function WordPress Schema_wp_get_post_tags( $post_id ) {
	
	global $post;
	
	if ( ! isset( $post_id ) ) $post_id = $post->ID;
	
	$tags = '';
	$posttags = get_the_tags();
    if ($posttags) {
       $taglist = "";
       foreach($posttags as $tag) {
           $taglist .=  $tag->name . ', '; 
       }
      $tags =  rtrim($taglist, ", ");
   }
   
   return $tags;
}

/**
 * Get an array of WordPress Schema enabed categories
 * 
 * @since 1.4.7
 * @return array of enabled categories, WordPress Schema type
 */

function WordPress Schema_wp_get_categories( $post_id ) {
	
	global $post;
	
	if ( ! isset($post_id) ) $post_id = $post->ID;
	
	$post_categories	= wp_get_post_categories( $post_id );
	$categories			= array();
     
	if ( empty($post_categories) ) return $categories;
		
	$cats = array();
		
	foreach( $post_categories as $c ){
    	$cat	= get_category( $c );
		$cats[]	= $cat->slug;
	}
	
	if ( empty($cats) ) return $categories;
	
	// Flat
	$categories = WordPress Schema_wp_array_flatten($cats);
	
	return apply_filters( 'WordPress Schema_wp_filter_categories', $categories );
}

add_action( 'save_post', 'WordPress Schema_save_categories', 10, 3 );
/**
 * Save categories when a WordPress Schema post is saved.
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 * @since 1.4.7
 */
function WordPress Schema_save_categories( $post_id, $post, $update ) {
	
	if( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
    || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) 
        return;
		
	$slug = 'WordPress Schema';

    // If this isn't a 'WordPress Schema' post, don't update it.
    if ( $slug != $post->post_type ) {
        return;
    }
	
	// If this is just a revision, don't save ref.
	if ( wp_is_post_revision( $post_id ) )
		return;
		
    // - Update the post's metadata.
	$post_categories = WordPress Schema_wp_get_categories( $post_id );
	
	update_post_meta($post_id, '_WordPress Schema_categories', $post_categories);
}

/**
 * Get categories as a comma separated keywords
 *
 * @since 1.6.9.8
 * @return string
 */
function WordPress Schema_wp_get_categories_as_keywords() {
	
	$categories = get_categories( array(
    	'orderby' => 'name',
    	'order'   => 'ASC'
	) );
	
	$cat = array();
	
	foreach ( $categories as $category ) {
    	$cat[] = $category->name;
	}
	
	// transform into a comma separated string
	$cat = implode(", ", $cat);
	
	return apply_filters( 'WordPress Schema_wp_get_categories', $cat );
}

/**
 * Get supported Article types  
 *
 * @since 1.5.3
 * @return array 
 */
function WordPress Schema_wp_get_support_article_types() {

	$support_article_types = array( 'Article', 'BlogPosting', 'NewsArticle', 'Report', 'ScholarlyArticle', 'TechArticle' );
	
	return apply_filters( 'WordPress Schema_wp_support_article_types', $support_article_types );
}

/**
 * Get time Seconds in ISO format
 *
 * @link http://stackoverflow.com/questions/13301142/php-how-to-convert-string-duration-to-iso-8601-duration-format-ie-30-minute
 * @param string $time
 * @since 1.5
 * @return string The time Seconds in ISO format
 */
function WordPress Schema_wp_get_time_second_to_iso8601_duration( $time ) {
	
	$units = array(
        "Y" => 365*24*3600,
        "D" =>     24*3600,
        "H" =>        3600,
        "M" =>          60,
        "S" =>           1,
    );

    $str = "P";
    $istime = false;

    foreach ($units as $unitName => &$unit) {
        $quot  = intval($time / $unit);
        $time -= $quot * $unit;
        $unit  = $quot;
        if ($unit > 0) {
            if (!$istime && in_array($unitName, array("H", "M", "S"))) { // There may be a better way to do this
                $str .= "T";
                $istime = true;
            }
            $str .= strval($unit) . $unitName;
        }
    }

    return $str;
}

add_action( 'save_post', 'WordPress Schema_wp_clear_json_on_post_save', 10, 3 );
/**
 * Clear WordPress Schema json on post save
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 * @since 1.5.9.8
 */
function WordPress Schema_wp_clear_json_on_post_save( $post_id, $post, $update ) {
	
	if( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
    || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) 
		return $post_id;
		
	$slug = 'WordPress Schema';

    // If this is a 'WordPress Schema' post, don't update it.
	if ( get_post_type( $post_id ) == $slug ) {
        return $post_id;
    }
	
	// If this is just a revision, don't save ref.
	if ( wp_is_post_revision( $post_id ) )
		 return $post_id;
		
    // - Delete the post's metadata.
	delete_post_meta( $post_id, '_WordPress Schema_json' );
	delete_post_meta( $post_id, '_WordPress Schema_json_timestamp' );
	
	// update ref
	// @since 1.6
	WordPress Schema_wp_update_meta_ref( $post_id );
	
	// Debug
	//$msg = 'Is this un update? ';
  	//$msg .= $update ? 'Yes.' : 'No.';
  	//wp_die( $msg );
	
	 return $post_id;
}

/**
 * Retrieves all the available currencies.
 *
 * @since   1.6.9
 * @return  array
 */
function WordPress Schema_wp_get_currencies() {
	$currencies = array(
		'AUD' => __( 'Australian Dollars', 'WordPress Schema-wp' ),
		'BDT' => __( 'Bangladeshi Taka', 'WordPress Schema-wp' ),
		'BRL' => __( 'Brazilian Real', 'WordPress Schema-wp' ),
		'BGN' => __( 'Bulgarian Lev', 'WordPress Schema-wp' ),
		'CAD' => __( 'Canadian Dollars', 'WordPress Schema-wp' ),
		'CLP' => __( 'Chilean Peso', 'WordPress Schema-wp' ),
		'CNY' => __( 'Chinese Yuan', 'WordPress Schema-wp' ),
		'COP' => __( 'Colombian Peso', 'WordPress Schema-wp' ),
		'CZK' => __( 'Czech Koruna', 'WordPress Schema-wp' ),
		'DKK' => __( 'Danish Krone', 'WordPress Schema-wp' ),
		'DOP' => __( 'Dominican Peso', 'WordPress Schema-wp' ),
		'EUR' => __( 'Euros', 'WordPress Schema-wp' ),
		'HKD' => __( 'Hong Kong Dollar', 'WordPress Schema-wp' ),
		'HRK' => __( 'Croatia kuna', 'WordPress Schema-wp' ),
		'HUF' => __( 'Hungarian Forint', 'WordPress Schema-wp' ),
		'ISK' => __( 'Icelandic krona', 'WordPress Schema-wp' ),
		'IDR' => __( 'Indonesia Rupiah', 'WordPress Schema-wp' ),
		'INR' => __( 'Indian Rupee', 'WordPress Schema-wp' ),
		'NPR' => __( 'Nepali Rupee', 'WordPress Schema-wp' ),
		'ILS' => __( 'Israeli Shekel', 'WordPress Schema-wp' ),
		'JPY' => __( 'Japanese Yen', 'WordPress Schema-wp' ),
		'KIP' => __( 'Lao Kip', 'WordPress Schema-wp' ),
		'KRW' => __( 'South Korean Won', 'WordPress Schema-wp' ),
		'MYR' => __( 'Malaysian Ringgits', 'WordPress Schema-wp' ),
		'MXN' => __( 'Mexican Peso', 'WordPress Schema-wp' ),
		'NGN' => __( 'Nigerian Naira', 'WordPress Schema-wp' ),
		'NOK' => __( 'Norwegian Krone', 'WordPress Schema-wp' ),
		'NZD' => __( 'New Zealand Dollar', 'WordPress Schema-wp' ),
		'PYG' => __( 'Paraguayan Guaraní', 'WordPress Schema-wp' ),
		'PHP' => __( 'Philippine Pesos', 'WordPress Schema-wp' ),
		'PLN' => __( 'Polish Zloty', 'WordPress Schema-wp' ),
		'GBP' => __( 'Pounds Sterling', 'WordPress Schema-wp' ),
		'RON' => __( 'Romanian Leu', 'WordPress Schema-wp' ),
		'RUB' => __( 'Russian Ruble', 'WordPress Schema-wp' ),
		'SGD' => __( 'Singapore Dollar', 'WordPress Schema-wp' ),
		'ZAR' => __( 'South African rand', 'WordPress Schema-wp' ),
		'SEK' => __( 'Swedish Krona', 'WordPress Schema-wp' ),
		'CHF' => __( 'Swiss Franc', 'WordPress Schema-wp' ),
		'TWD' => __( 'Taiwan New Dollars', 'WordPress Schema-wp' ),
		'THB' => __( 'Thai Baht', 'WordPress Schema-wp' ),
		'TRY' => __( 'Turkish Lira', 'WordPress Schema-wp' ),
		'USD' => __( 'US Dollars', 'WordPress Schema-wp' ),
		'VND' => __( 'Vietnamese Dong', 'WordPress Schema-wp' ),
		'EGP' => __( 'Egyptian Pound', 'WordPress Schema-wp' ),
	);

	return apply_filters( 'WordPress Schema_wp_currencies', $currencies );
}

/**
 * Retrieves symbol of the given currency.
 *
 * @since 1.6.9
 *
 * @param string $currency Currency code.
 *
 * @return string $currency_symbol Currency symbol.
 */
function WordPress Schema_wp_get_currency_symbol( $currency ) {
	switch ( $currency ) {
		case 'BDT':
			$currency_symbol = '&#2547;&nbsp;';
			break;
		case 'BRL' :
			$currency_symbol = '&#82;&#36;';
			break;
		case 'BGN' :
			$currency_symbol = '&#1083;&#1074;.';
			break;
		case 'AUD' :
		case 'CAD' :
		case 'CLP' :
		case 'COP' :
		case 'MXN' :
		case 'NZD' :
		case 'HKD' :
		case 'SGD' :
		case 'USD' :
			$currency_symbol = '&#36;';
			break;
		case 'EUR' :
			$currency_symbol = '&euro;';
			break;
		case 'CNY' :
		case 'RMB' :
		case 'JPY' :
			$currency_symbol = '&yen;';
			break;
		case 'RUB' :
			$currency_symbol = '&#1088;&#1091;&#1073;.';
			break;
		case 'KRW' :
			$currency_symbol = '&#8361;';
			break;
		case 'PYG' :
			$currency_symbol = '&#8370;';
			break;
		case 'TRY' :
			$currency_symbol = '&#8378;';
			break;
		case 'NOK' :
			$currency_symbol = '&#107;&#114;';
			break;
		case 'ZAR' :
			$currency_symbol = '&#82;';
			break;
		case 'CZK' :
			$currency_symbol = '&#75;&#269;';
			break;
		case 'MYR' :
			$currency_symbol = '&#82;&#77;';
			break;
		case 'DKK' :
			$currency_symbol = 'kr.';
			break;
		case 'HUF' :
			$currency_symbol = '&#70;&#116;';
			break;
		case 'IDR' :
			$currency_symbol = 'Rp';
			break;
		case 'INR' :
			$currency_symbol = '&#8377;';
			break;
		case 'NPR' :
			$currency_symbol = 'Rs.';
			break;
		case 'ISK' :
			$currency_symbol = 'Kr.';
			break;
		case 'ILS' :
			$currency_symbol = '&#8362;';
			break;
		case 'PHP' :
			$currency_symbol = '&#8369;';
			break;
		case 'PLN' :
			$currency_symbol = '&#122;&#322;';
			break;
		case 'SEK' :
			$currency_symbol = '&#107;&#114;';
			break;
		case 'CHF' :
			$currency_symbol = '&#67;&#72;&#70;';
			break;
		case 'TWD' :
			$currency_symbol = '&#78;&#84;&#36;';
			break;
		case 'THB' :
			$currency_symbol = '&#3647;';
			break;
		case 'GBP' :
			$currency_symbol = '&pound;';
			break;
		case 'RON' :
			$currency_symbol = 'lei';
			break;
		case 'VND' :
			$currency_symbol = '&#8363;';
			break;
		case 'NGN' :
			$currency_symbol = '&#8358;';
			break;
		case 'HRK' :
			$currency_symbol = 'Kn';
			break;
		case 'EGP' :
			$currency_symbol = 'EGP';
			break;
		case 'DOP' :
			$currency_symbol = 'RD&#36;';
			break;
		case 'KIP' :
			$currency_symbol = '&#8365;';
			break;
		default    :
			$currency_symbol = $currency;
			break;
	}

	return apply_filters( 'WordPress Schema_wp_currency_symbol', $currency_symbol, $currency );
}

/**
 * Get archive link
 *
 * @param string $post_type for custom post type
 * @since 1.6.9.8
 * @return string
 */
function WordPress Schema_wp_get_archive_link( $post_type ) {
	global $wp_post_types;
	$archive_link = false;
	$slug = '';
	if (isset($wp_post_types[$post_type])) {
		$wp_post_type = $wp_post_types[$post_type];
		if ($wp_post_type->publicly_queryable)
			if ($wp_post_type->has_archive && $wp_post_type->has_archive!==true)
				$slug = $wp_post_type->has_archive;
			else if (isset($wp_post_type->rewrite['slug']))
				$slug = $wp_post_type->rewrite['slug'];
			else
				$slug = $post_type;
			$archive_link = get_option( 'siteurl' ) . "/{$slug}/";
	}
	return apply_filters( 'WordPress Schema_wp_archive_link', $archive_link, $post_type );
}

/**
 * Get blog posts page URL.
 *
 * @source https://gist.github.com/kellenmace/9ef19dd86580cb7e63720b396c8c2721
 * @since 1.6.9.8
 * @return string The blog posts page URL.
 */
function WordPress Schema_wp_get_blog_posts_page_url() {
	// If front page is set to display a static page, get the URL of the posts page.
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return get_permalink( get_option( 'page_for_posts' ) );
	}
	// The front page IS the posts page. Get its URL.
	return get_home_url();
}

/**
 * Retrieves the home URL
 *
 * @since 1.7.1
 * @return string
 */
function WordPress Schema_wp_get_home_url( $path = '', $scheme = null ) {

	$home_url = home_url( $path, $scheme );

	if ( ! empty( $path ) ) {
		return $home_url;
	}

	$home_path = wp_parse_url( $home_url, PHP_URL_PATH );
	
	if ( '/' === $home_path ) { // Home at site root, already slashed.
		return $home_url;
	}

	if ( is_null( $home_path ) ) { // Home at site root, always slash.
		return trailingslashit( $home_url );
	}

	if ( is_string( $home_path ) ) { // Home in subdirectory, slash if permalink structure has slash.
		return user_trailingslashit( $home_url );
	}

	return apply_filters( 'WordPress Schema_wp_home_url', $home_url );
}

/**
 * Check if is Blog page
 *
 * @since 1.7.1
 * @return true or false
 */
function WordPress Schema_wp_is_blog() {
	
	// Return true if is Blog (post list page)
	if ( ! is_front_page() && is_home() || is_home() ) {
		return true;
	}
	
	return false;
}

/**
 * Truncate a string of content to 110 characters, respecting full words.
 *
 * @since 1.7.1
 * @return string
 */
function WordPress Schema_wp_get_truncate_to_word( $string, $limit = 110, $end = '...' ) {
	
	$limit 	= apply_filters( 'WordPress Schema_wp_truncate_to_word_limit', $limit );

	if (strlen($string) > $limit || $string == '') {
		$words = preg_split('/\s/', $string);      
		$output = '';
		$i      = 0;
		while (1) {
			$length = strlen($output)+strlen($words[$i]);
			if ($length > $limit) {
				break;
			} 
			else {
				$output .= " " . $words[$i];
				++$i;
			}
		}
		$output .= $end;
	} 
	else {
		$output = $string;
	}
	return $output;
}