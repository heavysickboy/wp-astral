<?php
get_header();
/* 
Template Name: Wishlist
*/
?> 
<div class="pageWrapper" id="sticky-anchor">
<!-- banner starts -->
  <section  class="innerBanner mb-5 position-relative">
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'w-100 inBannerImg','height'=>'100%' ]);?>
    <div class="container d-flex align-items-md-center align-items-end">
      <!--<h1><?php the_title(); ?></h1>-->
    </div>
  </section>
  <!-- banner ends -->
    <div class="container">
        <div class="row row-cols-sm-4 row-cols-2 productBrand text-center gx-5 mb-5">
            <?php echo do_shortcode('[ti_wishlistsview]'); ?>
        </div>
    </div>
 <?php get_footer(); ?>
