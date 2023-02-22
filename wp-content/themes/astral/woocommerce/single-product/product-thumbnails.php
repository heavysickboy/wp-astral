<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
if(empty($attachment_ids)){
    echo '<img src="'.$image[0].'" width="100%" height="100%">';
    }
?>
<div data-sticky_column> 
   <div class="prodSliderContainer" >
		<div class="prodThumbSlider">
			<?php
			if ( $attachment_ids && $product->get_image_id() ) {
				foreach($attachment_ids as $attachment_id) {
					$image_url = wp_get_attachment_url($attachment_id); ?>
				<div><img src="<?php echo $image_url; ?>"></div>
			 <?php }} ?>
		</div>
		<div class="prodImageSlider">
		 <?php
			if ( $attachment_ids && $product->get_image_id() ) {
				foreach($attachment_ids as $attachment_id) {
					$image_url = wp_get_attachment_url($attachment_id); ?>
              <div>
                  <a data-fancybox="gallery" href="<?php echo $image_url; ?>">
                    <img src="<?php echo $image_url; ?>"> 
                    <div class="picZoom"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_icon.svg"></div>
                </a>
            </div>
            <?php }} ?>
        </div>
	</div>
</div>
