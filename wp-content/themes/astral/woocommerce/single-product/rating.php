<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
if ( $rating_count > 0 ) : ?>
<div class="woocommerce-product-rating w-100 mb-2">
	<div class="w-100 mb-2">
		<div class="ratingBoxs me-2">
		<?php //echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
		<?php 
		 if($rating_count >= 4 ){
			echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-half"></i>';
		 }
		 elseif($rating_count == 3){
		 	echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-half"></i> <i class="bi bi-star"></i>';
		 }
		 elseif($rating_count == 2){
		 	echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-half"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i>';
		 }
		 elseif($rating_count == 1){
		 	echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i>';
		 }else{
			 echo '<i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i>';
		 }		 
		?>
		 </div>
		<?php if ( comments_open() ) : ?>
			<?php 
			//phpcs:disable 
			?>
			<a href="#reviews" class="woocommerce-review-link" rel="nofollow">
				(<?php printf( _n( '%s customer review', $review_count, 'woocommerce' ), '<small">' . esc_html( $review_count ) . '</small>' ); ?> customer review )
			</a>
			<?php
			// phpcs:enable ?>
		<?php endif ?>
		
	</div>
</div>
<?php endif; ?>
<?php 
if(empty($rating_count)){
    echo '<div class="mb-2"><a href="#reviews" class="woocommerce-review-link" rel="nofollow">
            <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i>
            <i class="bi bi-star"></i> (<small>0</small> customer review )
          </a></div>';
          } ?>
 

