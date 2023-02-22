<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
	<div class="woocommerce-tabs wc-tabs-wrapper">
	<hr>
    <div class="w-100 mb-5 prodDetailContent animateThis slideTop">
		<ul id="aboutProduct_Tabs" class="tabs wc-tabs nav text-center mb-4 mx-auto pdtabsFormat" role="tablist" role="tablist" style="max-width:550px;">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="col <?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="presentation" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>" class="tabBtn activ<?php echo $act;?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="tab-pane fade show woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
    </div>
<?php endif; ?>
 <div class="productBubble"><img src="<?php echo get_template_directory_uri();?>/images/product_bubble.png"></div>
<div class="specWrap ">
<div class="container position-relative">
 <!-- Specifications -->
  <div id="parentHorizontalTab">
    <ul class="resp-tabs-list hor_1  row text-center">
    <?php
     // Check rows exists.
       if( have_rows('product_inner_tab') ):
            // Loop through rows.
          while( have_rows('product_inner_tab') ) : the_row();
             // Load sub field value.
            $sub_value_heading = get_sub_field('tab_heading');
            ?>
            <li class="col-auto me-5"><span><?php echo $sub_value_heading; ?></span></li>
           <?php // End loop.
            endwhile;
        // No value.
        else :
            // Do something...
        endif; 
        ?>
    </ul>
    <div class="resp-tabs-container hor_1">
    <?php
     // Check rows exists.
       if( have_rows('product_inner_tab') ):
            // Loop through rows.
          while( have_rows('product_inner_tab') ) : the_row();
             // Load sub field value.
            $sub_value_content = get_sub_field('tab_contents');
            // Do something...
            ?>
            <div><?php echo $sub_value_content; ?></div>
           <?php // End loop.
            endwhile;
        // No value.
        else :
            // Do something...
        endif; 
        ?>
        <!-- tab 1  -->
    </div>
</div>
<div class="productBubble1"><img src="<?php echo get_template_directory_uri();?>/images/product_bubble.png"></div>
</div>
</div>
