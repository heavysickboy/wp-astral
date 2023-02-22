<?php
get_header();
/* 
Template Name: Sanitaryware
*/
?> 
<div class="pageWrapper" id="sticky-anchor">
<!-- banner starts -->
  <section  class="innerBanner mb-5 position-relative">
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'w-100 inBannerImg','height'=>'100%' ]);?>
    <div class="container d-flex align-items-md-center align-items-end">
      <h1>Sanitaryware</h1>
    </div>
  </section>
  <!-- banner ends -->

    <div class="container">
        <div class="row row-cols-sm-4 row-cols-2 productBrand text-center gx-5 mb-5">
       <?php
         // Check rows exists.
           if( have_rows('related_categories') ):
                // Loop through rows.
              while( have_rows('related_categories') ) : the_row();
                 // Load sub field value.
                $sub_value_image = get_sub_field('category_image');
                $sub_value_url = get_sub_field('category_url');
                // Do something...
                ?>
                <div class="col mb-3">
                <a href="<?php echo $sub_value_url; ?>" class="roomCatgItem py-3">
                  <img src="<?php echo $sub_value_image; ?>"/>  
                 </a>
              </div>
               <?php // End loop.
                endwhile;
            // No value.
            else :
                // Do something...
            endif; 
            ?>
        </div>
         <?php
          $short_intro = get_field('short_intro');
           if($short_intro): ?>
        <div class="row justify-content-center text-center listingText mb-5 goldenColor">
            <div class="col-md-10">
                <h2 class="categoryTitle mb-4"><span><?php echo $short_intro['center_heading']; ?></span></h2>
                <p><?php echo $short_intro['center_short_para']; ?></p>
            </div>
        </div>
         <?php endif; ?>
        <div class="productListing">
            <?php
            // Check rows exists.
            if( have_rows('category_listing') ):
                // Loop through rows.
                while( have_rows('category_listing') ) : the_row();
                 // Load sub field value.
                    $sub_value = get_sub_field('category_name'); 
                    $featured_posts = get_sub_field('category_related_product');
                    ?>
                    <h5 class="mb-4 ps-3"><?php echo $sub_value; ?></h5>
                    <?php
                        if( $featured_posts ): ?>
                           <div class="row  productlistWrap gx-3"> 
                            <?php foreach( $featured_posts as $post ): 
                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata($post);
                                ?>
                                <div class="col-md-3 col-6 mb-4" data-aos="fade-up">
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
                            	      <div class="col">
                                	      <?php if( get_field('brand_icon') ): ?>
                                            <img src="<?php the_field('brand_icon'); ?>" class="brandImg"/>
                                         <?php endif; ?>
                            	     </div>
                                      <?php $price = $product->get_price();?>
                                      <div class="col-auto looPrice"> <?php echo $price;?></div>
                                  </div>
                            	  <div class="row prodBottom">
                            		<div class="col pl-2 position-static text-right" style="text-align: right;">
                            		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );?>
                                 	  <a href="<?php  echo $image[0]; ?>" data-fancybox="productImage" class=" d-inline-block" >
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
                            			<?php // echo do_shortcode( '[ti_wishlists_addtowishlist]')?>
                            			<?php
                                            global $product;                                        
                                            $attachment_ids = $product->get_gallery_image_ids();
                                            foreach( $attachment_ids as $attachment_id ) {
                                            $image_link = wp_get_attachment_url( $attachment_id );?>
                                            <a href="<?php echo $image_link ?>" data-fancybox="productImage" class=" d-inline-block"></a>
                                        <?php  } ?>
                            		</div>
                            	  </div>
                            	</div> 
                            	</a>
                            </div>
                                <?php endforeach; ?>
                            </div>
                            <?php 
                            // Reset the global post object so that the rest of the page works correctly.
                            wp_reset_postdata(); ?>
                        <?php endif; ?>
                            <?php // End loop.
                        endwhile;
                    // No value.
                    else :
                    // Do something...
                endif; 
                ?>
             </div>
            </div>
 <?php get_footer(); ?>
<script>
 $(document).ready(function(){
  $(".bullet").on("click",function(e){
    e.preventDefault();
       image_id = $(this).data('image');
       $(this).parent().parent().siblings(".prodImg").children('.productPic').hide().removeClass("active");
       $(this).parent().parent().siblings(".prodImg").children(".prod_"+image_id).show().addClass("active");

  });
});

$(document).ready(function(){
  $('.prodImg').mouseover(function(){
    $(this).children(".active").children(":first-child").hide();
    $(this).children(".active").children(":last-child").show();
  });
  $('.prodImg').mouseout(function(){
    $(this).children(".active").children(":last-child").hide();
    $(this).children(".active").children(":first-child").show();

  });
});
</script>