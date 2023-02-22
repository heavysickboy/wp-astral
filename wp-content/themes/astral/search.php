<?php 
    get_header(); 
?>
<div class="pageWrapper" id="sticky-anchor">
<!-- banner starts -->
  <section  class="innerBanner position-relative">
     <?php if ( is_active_sidebar( 'foot-three' ) ) : //check the sidebar if used.
        dynamic_sidebar( 'foot-three' );  // show the sidebar.
        endif;
     ?>
     <div class="container d-flex align-items-md-center align-items-end">
      <h1><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </div>
  </section>
  <!-- banner ends -->
<!--End Page Title-->
<!-- Sidebar Page Container -->
<section class="sidebar-page-container">
    <div class="container py-5 clearfix">
    <!--Content Side-->
         <?php
             global $query_string; 
             global $post;
             $query_args = explode("&", $query_string);
            // $search_query = array('category_name=portfolio-item');    
             if( strlen($query_string) > 0 ) {
                 foreach($query_args as $key => $string) {
                     $query_split = explode("=", $string);
                     $search_query[$query_split[0]] = urldecode($query_split[1]); 
                 } // foreach
             } //if
             $search = new WP_Query($search_query);
             $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
             ?> 
            <?php global $wp_query; $total_results = $wp_query->found_posts;?> 
                <?php if ( $search->have_posts() ) : ?>   
                 <?php while ( $search->have_posts() ) : $search->the_post(); ?> 
                 <!-- the loop -->
            <!-- News Block -->
            <div style="border: 1px solid #f5f5f5; "class="row search-loop mb-3 align-items-center">
            <div class="content-side col-md-4 col-sm-12 col-xs-12">
            <div class="image-box">
                        <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img img-fluid', 'title' => '']);?>
                        </a>
                        <span class="tag"><?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?></span>
                    </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="inner-box">
                    <div class="lower-content">                    
                        <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                        <div class="text"><?php the_excerpt(); ?></div>
                        <div class="text mt-4"><?php wc_get_template_part( 'singleproduct', 'metadetails' ); ?></div>                        
                        <div class="btn-box mt-4"><a class="ctaBtn blackBtn py-1" href="<?php the_permalink();?>">Know More <i class="fa fa-angle-double-right"></i></a></div>
                    </div>
                </div>
            </div>
            <hr style="color: #a56d5a;width: 95%;text-align: center;height: 2px;margin: 10px auto;opacity: 1;">
            </div>
             <?php endwhile; ?>
         <!-- end of the loop --> 
             <?php else : ?>
                 <h2 style="color:#f45f42;font-size:24px;margin:40px;"><?php _e( '! Sorry, No Result found. Please try a different search.' ); ?></h2>
             <?php endif; ?>
    	</div>
    </div>
</section>
</div>
<?php get_footer(); ?>