<?php
//Template Name: mediacenter brand videos
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
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Brand Videos</strong></li>
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
<!--                   <h2 class="">A glimpse into the Astral World</h2> -->
                        <ul class="nav nav-tabs">
<!--                             <li class="nav-item">
                              <a class="nav-link active gallery_tab" aria-current="page" href="" title="tab_1" style="margin-left: 0;padding-left: 0;">Photo Gallery</a>
                            </li> -->
                            <li class="nav-item">
                              <a class="nav-link active gallery_tab" aria-current="page" href="" title="tab_1">Videos</a>
                            </li>
                          </ul>
        
                  <div class="row g-4">

                    <div class="tab-content" id="myTabContent">
                      
                    <div class="tab active" id="tab_1">
                      <div class="row g-4 pt-5 g-0 sm">
                        <?php
                            $args = array(
                                'post_type' => 'brandvideos'
                            );
                        
                            $post_query = new WP_Query($args);
                        
                            if($post_query->have_posts() ) {
                                while($post_query->have_posts() ) {
                                    $post_query->the_post();
                                    ?>
                                <div class="col-md-6">
                                 <!--<a data-fancybox href="https://www.youtube.com/watch?v=1iD7-V6Kq3E">-->
                                <?php $vURL = get_field('video_url');
                                if( $vURL) { ?>
                                  <a class="video" data-fancybox href="<?php echo $vURL ?>">
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
                    <li><a href="<?php site_url(); ?>/mediacenter-gallery/">Gallery</a></li>
                    <li><a href="<?php site_url(); ?>/mediacenter-event/">Events</a></li>
					<li class="active"><a href="<?php site_url(); ?>/mediacenter-brand-videos/">Brand Videos</a></li>
                  </ul>
                  
                </div>
              </div>
            </div>
        
          </section>
        </div>

<?php
get_footer();
?>