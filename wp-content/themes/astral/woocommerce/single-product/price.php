<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<?php wc_get_template_part( 'singleproduct', 'metadetails' ); ?>

<!--<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p> -->
<?php 
global $post;
$pro_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
if (!$pro_description ) { ?>
<div class="features_icon py-4">
<ul class="row spcifications px-0">
    <?php
     // Check rows exists.
       if( have_rows('features') ):
            // Loop through rows.
          while( have_rows('features') ) : the_row();
             // Load sub field value.
            $sub_value_name = get_sub_field('feature_name');
            $sub_value_icon = get_sub_field('feature_icon');
            if($sub_value_name){
            ?>
            <li class="col-md-6 mb-4 fs-15" data-aos="fade-up">
                <img src="<?php echo $sub_value_icon; ?>" class="me-1"> 
                <?php echo $sub_value_name; ?>
            </li>
           <?php } // End loop.
            endwhile;
        // No value.
        else :
            // Do something...
        endif; 
        ?>
    </ul>
    </div>
<?php  } ?>
