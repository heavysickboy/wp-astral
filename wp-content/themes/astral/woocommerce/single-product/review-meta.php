<?php
/**
 * The template to display the reviewers meta data (name, verified owner, review date)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review-meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $comment;
$verified = wc_review_is_from_verified_owner( $comment->comment_ID );

if ( '0' === $comment->comment_approved ) { ?>

	<p class="meta">
		<em class="woocommerce-review__awaiting-approval">
			<?php esc_html_e( 'Your review is awaiting approval', 'woocommerce' ); ?>
		</em>
	</p>

<?php } else { ?>

	<p class="meta mb-0">
		<strong class="woocommerce-review__author"><?php comment_author(); ?> </strong>
		<?php
		if ( 'yes' === get_option( 'woocommerce_review_rating_verification_label' ) && $verified ) {
			echo '<em class="woocommerce-review__verified verified">(' . esc_attr__( 'verified owner', 'woocommerce' ) . ')</em> ';
		}
        $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
            if ( $rating && wc_review_ratings_enabled() ) {
        	//echo wc_get_rating_html( $rating ); // WPCS: XSS ok.
        	
        }?>
        <div class="review_count">
        <?php
          if($rating >= 4 && $rating >= 5 ){
			echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>';
		 }elseif($rating >= 3 && $rating >= 4){
		     echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>';
		  }
		  elseif($rating >= 2 && $rating >= 3){
		     echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>';
		  }
		  elseif($rating >= 1 && $rating >= 2){
		     echo '<i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>';
		  }elseif($rating == 1){
		     echo '<i class="bi bi-star-fill"></i>';
		  }else{
		      echo 'no rating';
		      }		 
    	?>
		</div>
		<!--Comenting Date of Comment-->
		<!--<span class="woocommerce-review__dash">&ndash;</span> -->
		<!--<time class="woocommerce-review__published-date" datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>">-->
		<!--<?php echo esc_html( get_comment_date( wc_date_format() ) ); ?>-->
		<!--</time>-->
	</p>

	<?php
}
