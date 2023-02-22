 <?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

defined( 'ABSPATH' ) || exit;
 global $product; ?>
  <div class="pageWrapper" id="sticky-anchor"> 
  <!-- banner starts -->
  <section  class="innerBanner position-relative">
     <?php if ( is_active_sidebar( 'foot-three' ) ) : //check the sidebar if used.
        dynamic_sidebar( 'foot-three' );  // show the sidebar.
        endif;
     ?>
  </section>
  <!-- banner ends -->
  <div class="container-fluid breadcrum mb-4">
        <div class="container">
          <div class=" py-3">
            <!--<ul><li><a href="#">Sanitary Ware</a></li><li><a href="">Celestia Collection</a></li><li>Sensor Faucet</li></ul>-->
             <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z' fill='currentColor'/%3E%3C/svg%3E&#34;);;" aria-label="breadcrumb">
                 <?php if (function_exists('tsh_wp_custom_breadcrumbs')) tsh_wp_custom_breadcrumbs(); ?>
            </nav>
          </div>
        </div>
    </div>
  <!-- banner ends -->
    <div class="container">
        <div class="row">
        <div class="col-12 custom-notice">
            <?php
            /**
             * Hook: woocommerce_before_single_product.
             *
             * @hooked woocommerce_output_all_notices - 10
             */
            do_action( 'woocommerce_before_single_product' );
            ?>
        </div>
        </div>
    </div>
    <?php if ( post_password_required() ) {
    	echo get_the_password_form(); // WPCS: XSS ok.
    	return;
    }
    ?>
    <div class="container">
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'removeClass', $product ); ?>>
		<div class="row mb-5 gx-5 align-items-center position-relative">
			<div class="col-md-7 mb-md-0 mb-5"  data-sticky_parent>
			  		<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
			 </div>
		    <div class="col-md-5">
			<div class="summary entry-summary productDetail">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
		</div>
		</div>
		</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
<?php do_action( 'woocommerce_after_single_product' ); ?>
