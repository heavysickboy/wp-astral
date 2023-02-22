<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
        <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
		<div class="w-100 mx-auto" style="max-width:1000px;">
        <div class="row p-3 mx-0 mb-3 justify-content-between grayBg">   
		<div class="col-md-6 mb-3 mb-md-0"> 
			<div id="review_form" class="reviewFields">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
				    'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
					/* translators: %s is product title */
				    'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
					'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__( 'Submit the review', 'woocommerce' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'woocommerce' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'woocommerce' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<div class="form-group mb-3 comment-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="text-danger">*</span>';
					}

					$field_html .= '</label><input class="form-control rounded-0" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></div>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Review', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
				}
				$comment_form['comment_field'] .= '<div class="comment-form-comment form-group mb-3"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="text-danger">*</span></label><textarea class="form-control rounded-0" id="comment" name="comment" cols="60" rows="4" required></textarea></div>';
				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
			</div>
			<div class="col-auto">                
                <div class="avgRatingHolder">
                <?php 
                global $comment;
                $rating_count = $product->get_rating_count();
                $average      = $product->get_average_rating();
                $eachProductrating = intval(get_comment_meta( $comment->comment_ID, 'rating', true ) );
                // echo '<pre>';
                // print_r($product);
                // echo '<pre>';
                ?>
                <div class="row mx-md-auto">
                   <div class="col-12"><p><strong>Overall Rating</strong></p></div>             
                    <div class="col-auto">
                        <div class="avgRatingBox rounded d-flex flex-column justify-content-center align-content-between">
                        <div class="mt-auto avgValue"><?php echo $average; ?></div>
                        <div class="avgValueText">
                        <?php
                            if($average >= 4 ){
                            echo 'GOOD';}
                            elseif($rating <= 3 || $rating == 2 || $rating >= 1){
                            echo 'AVERAGE';
                            }
                        ?>
                        </div>
                        <div class="mt-auto totalRatings"><?php echo $rating_count; ?> Reviews</div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column overallRating">
                   <?php
                    $rating_1 = $product->get_rating_count(1);
                    $rating_2 = $product->get_rating_count(2);
                    $rating_3 = $product->get_rating_count(3);
                    $rating_4 = $product->get_rating_count(4);
                    $rating_5 = $product->get_rating_count(5);
                    ?>
                    <div><div class="ratingBox"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i></div>(<?php echo $rating_5; ?>)</div>
                    <div><div class="ratingBox"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i></div>(<?php echo $rating_4; ?>)</div>
                    <div><div class="ratingBox"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i></div>(<?php echo $rating_3; ?>)</div>
                    <div><div class="ratingBox"><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i></div>(<?php echo $rating_2; ?>)</div>
                    <div><div class="ratingBox"><i class="bi bi-star-fill"></i></div>(<?php echo $rating_1; ?>)</div>    
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
	<?php endif; ?>
	<div class="clear"></div>
	<div id="comments">
		<h3 class="woocommerce-Reviews-title">
		 <?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				esc_html_e( 'Reviews', 'woocommerce' );
			}
		  ?>
		</h3>
		<?php if ( have_comments() ) : ?>
			<ul class="commentlist w-100 productReviews">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ul>
			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
		<?php endif; ?>
	</div>	
</div>
