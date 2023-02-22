<?php
//Template Name: mediacenter gallery
/*
Template Post Type:  media,post,page
*/

get_header();
?>

    <div class="pageWrapper" id="sticky-anchor">
                   <!-- banner starts -->

   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
<section class="innerBanner position-relative">
    <img src="<?php the_post_thumbnail_url();?>" class="w-100">
    <div class="container d-flex align-items-md-center align-items-end">
      <h1>Media Center</h1>
    </div>
</section>  
<?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>  
  <!-- banner ends -->
  
  <!-- Breadcrumb	start -->
	<div class="container-fluid breadcrum">
        <div class="container">
          <div class=" py-3">            
             <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z' fill='currentColor'/%3E%3C/svg%3E&quot;);;" aria-label="breadcrumb">
                 <ol id="sc_breadcrumbs" class="breadcrumb mb-0">
					 <li class="breadcrumb-item"><a class="bread-link bread-home" href="<?php echo site_url(); ?>" title="Home">Home</a></li>
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Media Center</strong></li>
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Gallery</strong></li>
				 </ol>            
			  </nav>
          </div>
        </div>
    </div>
<!-- Breadcrumb ends	 -->
        
          <section class="py-5">
        
            <div class="container py-md-4 position-relative">
              
              <img src="images/bgblackDrops.png" class="ContDropsTop">
        
              <div class="row position-relative">
                <div class="col ps-xxl-5 mb-5 mb-lg-0">
                  <h2 class="">A glimpse into the Astral World</h2>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active gallery_tab" aria-current="page" href="" title="tab_1" style="margin-left: 0;padding-left: 0;">Photo Gallery</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link gallery_tab" href="" title="tab_2">Video Gallery</a>
                            </li>
                          </ul>
        
                  <div class="row g-4">

                    <div class="tab-content" id="myTabContent">
                      <div class="tab active" id="tab_1">
                        <div class="row gx-4 pt-5 g-0 sm text-center">
                          <!-- <div class="col pl-2 position-static text-right" style="text-align: right;">
                                                    
                            <a href="images/MediaCentre/1.jpg" data-fancybox="productImage" class=" d-inline-block" >
                              <a href="images/MediaCentre/1.jpg" data-fancybox="productImage" ></a>
                            
                          </div> -->

                        <?php
                            $args = array(
                                'post_type' => 'eventsgallery'
                            );
                        
                            $post_query = new WP_Query($args);
                        
                            if($post_query->have_posts() ) {
                                $counter = 0;
                                while($post_query->have_posts() ) {
                                    $post_query->the_post(); $counter++
                                    ?>
                          <div class=" col-md-6 mb-4 card-gallery">
                            <a href="<?php the_post_thumbnail_url();?>" data-fancybox="image<?php echo $counter;?>" class=" text-decoration-none">
                                <img src="<?php the_post_thumbnail_url();?>" alt="" class="w-100 mb-3">
                                <h5 class="text-center text-dark"><?php the_title();?></h5>
                            </a>
                            <div class="d-none">
                              <?php 
                                $images = get_field('photo_gallery');
                                $j = $counter;
                                if( $images ):   
                                foreach( $images as $image_id ): 
                                ?>
                                  <a href="<?php echo esc_url($image_id['url']); ?>" data-fancybox="image<?php echo $j;?>"></a>
                               <?php endforeach; endif; ?>
                            </div>
                          </div>  
                          <?php
                                    }
                                }
                        ?>     
                        </div>
                    </div>
                    <div class="tab" id="tab_2" style="display: none;">
                      <div class="row g-4 pt-5 g-0 sm">
                        <?php
                            $args = array(
                                'post_type' => 'eventsvideogallery'
                            );
                        
                            $post_query = new WP_Query($args);
                        
                            if($post_query->have_posts() ) {
                                while($post_query->have_posts() ) {
                                    $post_query->the_post();
                                    ?>
                                <div class="video col-md-6">
                                 <!--<a data-fancybox href="https://www.youtube.com/watch?v=1iD7-V6Kq3E">-->
                                <?php $vURL = get_field('video_url');
                                if( $vURL) { ?>
                                  <a data-fancybox href="<?php echo $vURL ?>">
                                    <?php }?>
                                     <img src="<?php the_post_thumbnail_url();?>" class="w-100 " style="height: 305px;" alt="">
                                      </a>
                                    </div>
                             <?php
                                    }
                                }
                            ?> 
                      </div>
                    </div>
                    </div>
                  </div>
        
                </div>
                <div class="col-lg-3 order-lg-first">
        
                  <div class="d-lg-none mb-3 pt-3 border-top border-secondary"><strong>Related Links -</strong></div>
                  
                  <ul class="sideNavig">
                    <li class="active"><a href="<?php site_url(); ?>/mediacenter-gallery/">Gallery</a></li>
                    <li><a href="<?php site_url(); ?>/mediacenter-event/">Events</a></li>
                    <li><a href="<?php site_url(); ?>/mediacenter-brand-videos/">Brand Videos</a></li>
                  </ul>
                  
                </div>
              </div>
            </div>
        
          </section>
        </div>

<?php
get_footer();
?>