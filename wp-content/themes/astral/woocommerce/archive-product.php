<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="pageWrappers" id="sticky-anchor">
<?php
  if (in_array('term-sanitaryware', get_body_class()) || is_tax( 'product_cat', array(48))) { ?>
      <section  class="innerBanner position-relative">
         <?php if ( is_active_sidebar( 'sanitaryware-banner' ) ) : //check the sidebar if used.
            dynamic_sidebar( 'sanitaryware-banner' );  // show the sidebar.
            endif;
         ?>
      </section>
  <?php } elseif(in_array('term-faucets', get_body_class()) || is_tax( 'product_cat', array(18) )){ ?>
        <section  class="innerBanner position-relative">
         <?php if ( is_active_sidebar( 'faucet-banner' ) ) : //check the sidebar if used.
            dynamic_sidebar( 'faucet-banner' );  // show the sidebar.
            endif;
         ?>
      </section>
    <?php } else{?>
        <section  class="innerBanner position-relative">
         <?php if ( is_active_sidebar( 'foot-three' ) ) : //check the sidebar if used.
            dynamic_sidebar( 'foot-three' );  // show the sidebar.
            endif;
         ?>
      </section>
    <?php } ?>
  <!-- banner starts -->
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
        <div class="row align-items-center justify-content-between">
           <?php
            if ( woocommerce_product_loop() ) {
            
            	/**
            	 * Hook: woocommerce_before_shop_loop.
            	 *
            	 * @hooked woocommerce_output_all_notices - 10
            	 * @hooked woocommerce_result_count - 20
            	 * @hooked woocommerce_catalog_ordering - 30
            	 */
            	do_action( 'woocommerce_before_shop_loop' );
            ?>
            </div>
        </div>
    </div>
    <div class="container productListing">
    <div class="row productlistWrap gx-lg-5 justify-content-between">
    <div class="col-lg-3 pt-3 pe-lg-0 filterWrapper" data-sticky_parent>    
    <div class="stickCol" >
		<div class="sticklinks" >		
		<button class="filterBtn">Filter</button>		
    <?php 
        /**
         * Hook: woocommerce_sidebar.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action( 'woocommerce_sidebar' );
     ?>
        </div>
     </div>        
    </div>    
    <div class="col-lg-9 py-3">
    <?php
    	woocommerce_product_loop_start();
    
    	if ( wc_get_loop_prop( 'total' ) ) {
    		while ( have_posts() ) {
    			the_post();
    
    			/**
    			 * Hook: woocommerce_shop_loop.
    			 */
    			do_action( 'woocommerce_shop_loop' );
    
    			wc_get_template_part( 'content', 'product' );
    		}
    	}
    
    	woocommerce_product_loop_end();
    
    	/**
    	 * Hook: woocommerce_after_shop_loop.
    	 *
    	 * @hooked woocommerce_pagination - 10
    	 */
    	do_action( 'woocommerce_after_shop_loop' );
    } else {
    	/**
    	 * Hook: woocommerce_no_products_found.
    	 *
    	 * @hooked wc_no_products_found - 10
    	 */
    	do_action( 'woocommerce_no_products_found' );
    }
    
    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );
    ?>
   </div>
</div>
<?php get_footer(); ?>
</div>
</div>


