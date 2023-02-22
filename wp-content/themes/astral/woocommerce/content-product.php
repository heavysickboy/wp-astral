<?php
	global $product;
	$price = $product->get_price();
	$productId = $product->get_id();
?>
<div class="col-md-4 col-sm-6 col-12 mb-4" data-aos="fade-up">
<a href="<?php the_permalink(); ?>">
<div class="prodBox">
   <div class="prodImg position-relative">
	   <div  class="productPic prod_1">
		  <?php the_post_thumbnail('post-thumbnail', ['class' => 'w-100', 'title' => 'products']);?>
	   </div>
	<div class="productTitle">
	 <h3><?php the_title(); ?></h3>	
		<span><?php 
        //this return sku (custom field on a wordpress post)
            $sku = $product->get_sku();
              echo $sku;
            ?></span>
       
	</div>
  </div>
  <div class="row justify-content-between">
      <div class="col-auto">
        <?php if( get_field('brand_icon') ): ?>
            <img src="<?php the_field('brand_icon'); ?>" class="brandImg"/>
        <?php endif; ?>
        </div>
      <div class="col-auto"><?php echo $product->get_price_html(); ?></div>      
  </div>
  <div class="row prodBottom">
  	<div class="col pl-2 position-static text-right" style="text-align: right;">
	  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );?>
 	  <a href="<?php  echo $image[0]; ?>" data-fancybox="productImage<?php echo $productId;?>" class="block" >
	  	<button class="prodAction " title="Zoom">
		  <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 22.666 22.666">
			<g id="Group_395" data-name="Group 395" fill="none"  transform="translate(0)">
			  <path id="Path_17264" data-name="Path 17264" d="M1056.535-14.2v1.178h-2.656l5.443,5.443-.861.856-5.467-5.468v2.725H1051.8v-4.29a.815.815,0,0,1,.444-.444Z" transform="translate(-1051.801 14.2)" fill="#2e2e2e" fill-rule="evenodd"></path>
			  <path id="Path_17265" data-name="Path 17265" d="M1307.162-9.466h-1.177v-2.656l-5.443,5.443-.857-.861,5.467-5.467h-2.724V-14.2h4.29a.814.814,0,0,1,.444.444Z" transform="translate(-1284.497 14.2)" fill="#2e2e2e" fill-rule="evenodd"></path>
			  <path id="Path_17266" data-name="Path 17266" d="M1051.8,235.7h1.178v2.65l5.446-5.428.858.835-5.443,5.443.022.041h2.672v1.193h-4.29a.815.815,0,0,1-.444-.444Z" transform="translate(-1051.801 -217.771)" fill="#2e2e2e" fill-rule="evenodd"></path>
			  <path id="Path_17267" data-name="Path 17267" d="M1301.524,241.163v-1.178h2.656l-5.443-5.443.861-.856,5.467,5.468v-2.725h1.193v4.29a.815.815,0,0,1-.444.444Z" transform="translate(-1283.592 -218.497)" fill="#2e2e2e" fill-rule="evenodd"></path>
			</g>
		  </svg>                                  
		</button>
		<div class="wish">        
       <?php
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	 

?>
</div>
		 
		<?php
              $attachment_ids = $product->get_gallery_image_ids();
                foreach( $attachment_ids as $attachment_id ) {
            $image_link = wp_get_attachment_url( $attachment_id );?>
            <a href="<?php echo $image_link ?>" data-fancybox="productImage<?php echo $productId;?>" class=" d-inline-block"></a>
        <?php  } ?>        
	</div>
  </div>
</div> 
</a>
</div>