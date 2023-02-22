<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<div class="meta_details">
<div class="row py-0">
  <div class="col-5 col-sm-6  d-flex align-items-center fs-13"><strong>Description  </strong></div> 
  <div class="col-7 col-sm-6 fs-15"><?php echo $short_description; ?></div>
</div>
 <ul class="row spcifications py-2">
    <?php
     // Check rows exists.
       if( have_rows('features') ):
            // Loop through rows.
          while( have_rows('features') ) : the_row();
             // Load sub field value.
            $sub_value_name = get_sub_field('feature_name');
            $sub_value_icon = get_sub_field('feature_icon');
            ?>
            <li class="col-md-6 mb-4 fs-15" data-aos="fade-up">
                <img src="<?php echo $sub_value_icon; ?>" class="me-1"> 
                <?php echo $sub_value_name; ?>
            </li>
           <?php // End loop.
            endwhile;
        // No value.
        else :
            // Do something...
        endif; 
        ?>
    </ul>
</div>
