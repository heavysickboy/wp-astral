<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$countries_obj   = new WC_Countries();
    $wc_states_list = $countries_obj->get_states( 'IN' );
    ?>
      <div class="w-100 mt-3 py-3 borderTop borderBottom mb-3">
        <div class="row">         
          <div class="col-sm-auto mb-sm-0 mb-2"><a href="#" data-fancybox="" data-src="#applyJob" class="ctaBtn blackBtn py-1">Enquire Now <i class="bi bi-pencil-square"></i></a></div>
          <div class="col-sm-auto"><?php if( get_field('technical_drawing') ): ?>
            <a href="<?php the_field('technical_drawing'); ?>" target="_blank" class="ctaBtn blackBtn py-1">Technical Drawing <i class="bi bi-easel"></i></a>
            <?php endif; ?>
        </div>
         </div>
      </div>
      <div class="w-100">
        <div class="row align-items-center">         
          <div class="col-auto inDetailTitle">Share :</div>
          <div class="col socialShare">
                <?php echo do_shortcode('[social]'); ?>
           </div>
        </div>
      </div>
<div class="product_meta" style="display:none;">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div> 