<?php
/**
 * WC Cart PDF template
 *
 * @package wc-cart-pdf
 */

/**
 * Before template hook
 *
 * @since 1.0.4
 * @package dkjensen/wc-cart-pdf
 */
do_action( 'wc_cart_pdf_before_template' );

$customer = wc_cart_pdf_get_customer();
$logo     = get_option( 'wc_cart_pdf_logo', get_option( 'woocommerce_email_header_image' ) );
?>
<div class="wc_cart_pdf_template">
	<?php if ( $logo ) { ?>

		<div id="template_header_image">
			<p style="margin-top: 0; text-align: <?php echo esc_attr( get_option( 'wc_cart_pdf_logo_alignment', 'center' ) ); ?>;">
				<img src="<?php echo esc_url( $logo ); ?>" style="width: <?php echo get_option( 'wc_cart_pdf_logo_width' ) ? esc_attr( get_option( 'wc_cart_pdf_logo_width' ) ) . 'px' : 'auto'; ?>;" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</p>
		</div>

	<?php } ?>
	<div id="template_header_meta">
		<p>
			<?php
			if ( get_option( 'wc_cart_pdf_unique_increment', false ) ) {
				$pdf_incrementer = absint( get_option( 'wc_cart_pdf_unique_increment_num', 1 ) );

				echo wp_kses_post( apply_filters( 'wc_cart_pdf_unique_increment_string', sprintf( '%04d', $pdf_incrementer ) . '<br>', $pdf_incrementer ) );
			}

			?>

			<?php echo esc_html( gmdate( get_option( 'date_format' ) ) ); ?>
		</p>
		 
	</div>
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name"><?php esc_html_e( 'Product', 'wc-cart-pdf' ); ?></th>
				<th class="product-price"><?php esc_html_e( 'Price', 'wc-cart-pdf' ); ?></th>
				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'wc-cart-pdf' ); ?></th>
				<th class="product-subtotal"><?php esc_html_e( 'Total', 'wc-cart-pdf' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<td class="product-thumbnail">
						<?php
						$thumbnail = apply_filters(
							'woocommerce_cart_item_thumbnail',
							$_product->get_image(
								'woocommerce_thumbnail',
								array(
									'width'  => 60,
									'height' => 'auto',
								)
							),
							$cart_item,
							$cart_item_key
						);

						if ( ! $product_permalink ) {
							echo $thumbnail; // phpcs:ignore
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // phpcs:ignore
						}
						?>
						</td>

						<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'wc-cart-pdf' ); ?>">
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'wc-cart-pdf' ) . '</p>', $product_id ) );
						}
						?>
						</td>

						<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'wc-cart-pdf' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // phpcs:ignore
							?>
						</td>

						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'wc-cart-pdf' ); ?>">
							<?php print esc_html( $cart_item['quantity'] ); ?>
						</td>

						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'wc-cart-pdf' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			 

			 
		</tbody>
	</table>
	 
</div>

<?php
/**
 * After template hook
 *
 * @since 1.0.4
 */
do_action( 'wc_cart_pdf_after_template' );