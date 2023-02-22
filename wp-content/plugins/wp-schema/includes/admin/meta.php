<?php
/**
 * WordPress Schema Post Meta Box
 *
 * @package     WordPress Schema
 * @subpackage  WordPress Schema Post Meta
 * @copyright   Copyright (c) 2016, Hesham Zebida
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.4
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



add_action( 'init', 'WordPress Schema_wp_post_meta_fields' );
/**
 * Create WordPress Schema post meta fields
 *
 * @since 1.7.1
 */
function WordPress Schema_wp_post_meta_fields() {

	$prefix = '_WordPress Schema_';

/**
 * WordPress Schema Main Type post meta 
 *
 * @since 1.4
 */
$fields_main = apply_filters( 'WordPress Schema_wp_types_post_meta_fields', array( 
	
	'WordPress Schema_types' => array( // Select box
		'label'	=> __('WordPress Schema Markup Type', 'WordPress Schema-wp'), // <label>
		'desc'	=> __('Select WordPress Schema type which describes your content best', 'WordPress Schema-wp'), // description
		'id'	=> $prefix.'type', // field id and name
		'type'	=> 'select', // type of field
		'options' => apply_filters( 'WordPress Schema_wp_types', array ( // array of options
				'Article' => array ( // array key needs to be the same as the option value
					'label' => __('Article', 'WordPress Schema-wp'), // text displayed as the option
					'value'	=> __('Article', 'WordPress Schema-wp'), // value stored for the option
				)
			)
		)
	), // end of array
	
	'post_meta_box_enabled' => array(
		'label' => __('Post meta', 'WordPress Schema-wp'),
		'tip'	=> __('Enable custom post meta box', 'WordPress Schema-wp'),
		'desc'	=> __('Enable post meta box?', 'WordPress Schema-wp'), 
		'id' 	=> $prefix.'post_meta_box_enabled',
		'type'	=> 'checkbox'
	)
));

/**
 * WordPress Schema Article post meta 
 *
 * @since 1.4
 */
$fields_article = array(
	
	array( // Select box
		'label'	=> __('Article Type', 'WordPress Schema-wp'), // <label>
		'desc'	=> __('Select more specific article type', 'WordPress Schema-wp'), // description
		'tip'	=> __('It is recommended to set type BlogPosting for posts, and leave empty or set to General for page post type', 'WordPress Schema-wp'),
		'id'	=> $prefix.'article_type', // field id and name
		'type'	=> 'select', // type of field
		'options' => array ( // array of options
			'General' => array ( // array key needs to be the same as the option value
				'label' => 'General', // text displayed as the option
				'value'	=> 'General' // value stored for the option
			),
			'BlogPosting' => array (
				'label' => 'BlogPosting',
				'value'	=> 'BlogPosting'
			),
			'NewsArticle' => array (
				'label' => 'NewsArticle',
				'value'	=> 'NewsArticle'
			),
			'Report' => array (
				'label' => 'Report',
				'value'	=> 'Report'
			),
			'ScholarlyArticle' => array (
				'label' => 'ScholarlyArticle',
				'value'	=> 'ScholarlyArticle'
			),
			'TechArticle' => array (
				'label' => 'TechArticle',
				'value'	=> 'TechArticle'
			)
		)
	),
);

/**
 * Post Types 
 *
 * @since 1.4
 */
$fields_post_types = array(
	
	array( // Post Types Select box
		'label'	=> '', // <label>
		'desc'	=> __('Enabled on specific custom post types', 'WordPress Schema-wp'),  // description
		'id'	=> $prefix.'post_types', // field id and name
		'type'	=> 'cpt' // type of field
	),
);

/**
 * Post Meta Keys to Filters - post meta 
 *
 * @since 1.5.8
 */
$fields_post_meta_box =  array (
	
	'title' => array(
				'label' => __('Title', 'WordPress Schema-wp'),
				'desc'	=> __('Post meta box title, default: WordPress Schema', 'WordPress Schema-wp'),
				'tip' => __('This field will allow you to override the WordPress Schema post meta box title, default: WordPress Schema', 'WordPress Schema-wp'),
				'id' 	=> $prefix.'post_meta_box_title',
				'type'	=> 'text',
				'size'	=> 'midum',
				'placeholder' => __('WordPress Schema', 'WordPress Schema-wp'),
			),
			
	array( // Repeatable & Sortable Text inputs
		'label'	=> __('Fields', 'WordPress Schema-wp'), // <label>
		'desc'	=> __('This is where you can define a source for WordPress Schema.org markup fields to override its output. Select a filter name, then define post meta key name to pull data from, or tick the check box to automatically create a new custom post meta field to insert values manually when editing posts.', 'WordPress Schema-wp'), // description
		'tip' => __('This feature allow you to override the WordPress Schema.org markups output generated by the WordPress Schema plugin.', 'WordPress Schema-wp'),
		'id'	=> $prefix.'post_meta_box', // field id and name
		'type'	=> 'repeatable_row', // type of field
		'sanitizer' => array( // array of sanitizers with matching kets to next array
			'featured' => 'WordPress Schema_wp_meta_box_santitize_boolean',
			'title' => 'sanitize_text_field',
			'desc' => 'wp_kses_data'
		),
		'repeatable_fields' => array ( // array of fields to be repeated
			
			array( // Select box
				'label'	=> __('Filter', 'WordPress Schema-wp'), // <label>
				'desc'	=> __('This is the filter name', 'WordPress Schema-wp'), // description
				'id'	=> 'filter', // field id and name
				'type'	=> 'select', // type of field
				'class' => 'WordPress Schema_type_filter', // css class
				'selectone'	=> __('Select Filter', 'WordPress Schema-wp'), // type of field
				'options' => apply_filters( 'WordPress Schema_wp_post_meta', array ( // array of options
					'author_name' => array ( // array key needs to be the same as the option value
						'label' => __('Author Name', 'WordPress Schema-wp'), // text displayed as the option
						'value'	=> 'WordPress Schema_wp_filter_author_name' // value stored for the option
					),
					'headline' => array ( 
						'label' => __('Headline', 'WordPress Schema-wp'), 
						'value'	=> 'WordPress Schema_wp_filter_headline' 
					),
					'description' => array ( 
						'label' => __('Description', 'WordPress Schema-wp'), 
						'value'	=> 'WordPress Schema_wp_filter_description' 
					),
					
				)),
			), // end of array
	
			'title' => array(
				'label' => __('Key', 'WordPress Schema-wp'),
				'desc'	=> __('Add post meta key name as source', 'WordPress Schema-wp'),
				'id' => 'key',
				'type' => 'text',
				'size' => 'medium',
				'placeholder' => __('Meta Key Name', 'WordPress Schema-wp'),
			),
			
			'field' => array(
				'label' => __('Create?', 'WordPress Schema-wp'),
				'tip'	=> __('Create custom post meta field?', 'WordPress Schema-wp'),
				'desc'	=> __('Create Field?', 'WordPress Schema-wp'), 
				'id' 	=> 'field',
				'type'	=> 'checkbox'
			),
			
			'div_open' => array(
				'id' => 'div_open',
				'type' => 'div_open',
			),
			
			array( 
				'label'	=> __('Type', 'WordPress Schema-wp'),
				'desc'	=> __('Select field type', 'WordPress Schema-wp'),
				'id'	=> 'type',
				'type'	=> 'select',
				'selectone'	=> __('Select Type', 'WordPress Schema-wp'),  
				'options' => apply_filters( 'WordPress Schema_wp_post_meta_type', array ( 
					'text' => array ( 
						'label' => __('Text', 'WordPress Schema-wp'), 
						'value'	=> 'text' 
					),
					'textarea' => array ( 
						'label' => __('Text Area', 'WordPress Schema-wp'), 
						'value'	=> 'textarea' 
					),
					'checkbox' => array (  
						'label' => __('Checkbox', 'WordPress Schema-wp'), 
						'value'	=> 'checkbox' 
					),
										
				)),
			), // end of array
	
			'label' => array(
				'label' => __('Label', 'WordPress Schema-wp'),
				'desc'	=> __('Field label', 'WordPress Schema-wp'),
				'id' 	=> 'label',
				'type'	=> 'text',
				'size'	=> 'medium',
				'placeholder' => __('Label', 'WordPress Schema-wp'),
			),
			
			'desc' => array(
				'label' => __('Description', 'WordPress Schema-wp'),
				'desc'	=> __('Field description', 'WordPress Schema-wp'), 
				'id' 	=> 'desc',
				'type'	=> 'textarea',
				'placeholder' => __('Description for this field', 'WordPress Schema-wp'),
			),
			
			'div_close' => array(
				'id' => 'div_close',
				'type' => 'div_close',
			),
			
		)
	), // end of main array
	
);	

/**
 * WordPress Schema Premium plugin post meta message 
 *
 * @since 1.7.4
 */
$fields_WordPress Schema_premium_plugin = array(
	
	array( // Post Types Select box
		'label'	=> '', // <label>
		'desc'	=> '<b>'.__('Want to enable new features?', 'WordPress Schema-wp').'<br><br>'.__(' <a class="button button-large" target="_blank" href="https://WordPress Schema.press/downloads/WordPress Schema-premium/">Get WordPress Schema Premium</a>', 'WordPress Schema-wp').'</b><br><br>'.__('Save 15% off your purchase? Use discount code: <b>SPFREE15</b>', 'WordPress Schema-wp'),  // description
		'id'	=> $prefix.'WordPress Schema_premium', // field id and name
		'type'	=> 'desc' // type of field
	),
);

	/**
	 * Instantiate the class with all variables to create a meta box
	 * var $id string meta box id
	 * var $title string title
	 * var $fields array fields
	 * var $page string|array post type to add meta box to
	 * var $context string context where to add meta box at (normal, side)
	 * var $priority string meta box priority (high, core, default, low) 
	 * var $js bool including javascript or not
	 */
	$WordPress Schema_box = new WordPress Schema_Custom_Add_Meta_Box( 'WordPress Schema', __('WordPress Schema Settings', 'WordPress Schema-wp'), $fields_main, 'WordPress Schema', 'normal', 'high', true );
	$WordPress Schema_article_box = new WordPress Schema_Custom_Add_Meta_Box( 'WordPress Schema_article', __('Article', 'WordPress Schema-wp'), $fields_article, 'WordPress Schema', 'normal', 'high', true );
	$WordPress Schema_cpt_box = new WordPress Schema_Custom_Add_Meta_Box( 'WordPress Schema_cpt', __('Post Types', 'WordPress Schema-wp'), $fields_post_types, 'WordPress Schema', 'side', 'default', true );
	$WordPress Schema_post_meta_box = new WordPress Schema_Custom_Add_Meta_Box( 'WordPress Schema_post_meta_box', __('Post Meta', 'WordPress Schema-wp'), $fields_post_meta_box, 'WordPress Schema', 'normal', 'default', true );
	$WordPress Schema_post_meta_box = new WordPress Schema_Custom_Add_Meta_Box( 'WordPress Schema_premium_plugin', __('Go Premium', 'WordPress Schema-wp'), $fields_WordPress Schema_premium_plugin, 'WordPress Schema', 'side', 'default', true );
}


/**
* Create post meta box
*
* Uses class WordPress Schema_Custom_Add_Meta_Box
*
* @todo this function is not used, make sure it's important before removing it!
*
* @since 1.5.7
* @return true 
*/
function WordPress Schema_wp_do_post_meta( $args ) {
	
	if ( empty( $args ) ) return;
	
	$id 		 = $args['id'];
	$title 		 = $args['title'];
	$WordPress Schema_type = $args['type'];
	$fields 	 = $args['fields'];
	
	if ( empty( $fields ) ) return;
	
	/**
	* Get enabled post types to create a meta box on
	*/
	$WordPress Schemas_enabled = array();
	
	// Get schame enabled array
	$WordPress Schemas_enabled = WordPress Schema_wp_cpt_get_enabled();
	
	if ( empty($WordPress Schemas_enabled) ) return;

	// Get post type from current screen
	$current_screen = get_current_screen();
	$post_type = $current_screen->post_type;
	
	foreach( $WordPress Schemas_enabled as $WordPress Schema_enabled ) : 
		
		$type = $WordPress Schema_enabled['type'];
		
		if ( ! isset($type) || $type == '' ) return;
		
		// Get WordPress Schema enabled post types array
		$WordPress Schema_cpt = $WordPress Schema_enabled['post_type'];
	
		if ( ! empty($WordPress Schema_cpt) && in_array( $post_type, $WordPress Schema_cpt, true ) ) {
			
			if ( $type == $WordPress Schema_type && $WordPress Schema_enabled['post_type'][0] == $post_type ) {
				$new_post_meta = new WordPress Schema_Custom_Add_Meta_Box( $id, $title, $fields, $post_type, 'normal', 'high', true );
			}

		}
		
		// debug
		//print_r($WordPress Schema_enabled);
		
	endforeach;
	
	return true;
}