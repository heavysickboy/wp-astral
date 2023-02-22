<?php
//Template Name: mediacenter event
/*
Template Post Type: media,post,page
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
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Events</strong></li>
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

                  <div>
                    <h2 class="upcoming-events">Upcoming Events</h2>
                     <!-- <select class="mt-3 mb-3" name="" id="">
                          <option selected>Event Type</option>
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                      </select>-->
                  </div>
        
                  <div class="row g-4">

                <?php
    $args = array(
        'post_type' => 'mediacenterevents'
    );

    $post_query = new WP_Query($args);

    if($post_query->have_posts() ) {
        while($post_query->have_posts() ) {
            $post_query->the_post();
            
            foreach( get_cfc_meta( 'mediacenterevents' ) as $key => $value ){ 
            ?>

                  <div class="col-md-6">
                      <div class="event-card">
                        <div class="img-wrapper">
                          <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100">
                        </div>
                        <div class="row g-0">
                          <div class="col-7 text-center border-right">
                            <img class="logo" src="<?php the_cfc_field( 'mediacenterevents','image', false, $key ); ?>" alt="">
                                  <h3 class="text-center text-uppercase m-0 venue">VENUE</h3>
                                  <p class="text-center text-capitalize m-0 address"><?php the_cfc_field( 'mediacenterevents','mediacentercontent', false, $key ); ?></p>
                          </div>
                          <div class="col-5">
                            <h4 class="text-center text-uppercase event-date"><?php the_cfc_field( 'mediacenterevents','eventsdate', false, $key ); ?></h4>
                            <h5 class="text-center text-uppercase event-venue"><?php the_cfc_field( 'mediacenterevents','eventsvenue', false, $key ); ?></h5>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                   <?php
            }
            }
        }
?>                        
    

                    <!-- <div class="col-md-6">
                      <div class="event-card">
                        <div class="img-wrapper">
                          <img src="<?php echo get_template_directory_uri();?>/images/MediaCentre/34-wrapper.png" alt="" class="w-100 h-100">
                        </div>
                        <div class="row g-0">
                          <div class="col-7 text-center border-right">
                            <img class="logo" src="<?php echo get_template_directory_uri();?>/images/MediaCentre/chemtech-world-expo.png" alt="">
                                  <h3 class="text-center text-uppercase m-0 venue">VENUE</h3>
                                  <p class="text-center text-capitalize m-0 address">Jio World Convention Centre, G Block BKC, Bandra Kurla Complex, Bandra East, Mumbai, Maharashtra.</p>
                          </div>
                          <div class="col-5">
                            <h4 class="text-center text-uppercase event-date">8TH - 11TH<br>JUNE 2022</h4>
                            <h5 class="text-center text-uppercase event-venue">HALL NO. 1<br>STALL NO. F3</h5>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-md-6">
                      <div class="event-card">
                        <div class="img-wrapper">
                          <img src="<?php echo get_template_directory_uri();?>/images/MediaCentre/b4.jpg" alt="" class="w-100 h-100">
                        </div>
                        <div class="row g-0">
                          <div class="col-7 text-center border-right">
                            <img class="logo" src="<?php echo get_template_directory_uri();?>/images/MediaCentre/main_1649857254.png" alt="">
                                  <h3 class="text-center text-uppercase m-0 venue">VENUE</h3>
                                  <p class="text-center text-capitalize m-0 address">GACL Circle, GIDC Dahej, Gujarat.</p>
                          </div>
                          <div class="col-5">
                            <h4 class="text-center text-uppercase event-date">15th - 17th<br>NOV 2022</h4>
                            <h5 class="text-center text-uppercase event-venue">HALL NO. 1<br>STALL NO. C73</h5>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-md-6">
                      <div class="event-card">
                        <div class="img-wrapper">
                          <img src="<?php echo get_template_directory_uri();?>/images/MediaCentre/1519797763674.jpg" alt="" class="w-100 h-100">
                        </div>
                        <div class="row g-0">
                          <div class="col-7 text-center border-right">
                            <img class="logo" src="<?php echo get_template_directory_uri();?>/images/MediaCentre/main_1628856073.jpg" alt="">
                                  <h3 class="text-center text-uppercase m-0 venue">VENUE</h3>
                                  <p class="text-center text-capitalize m-0 address">Dubai World Trade Center, Dubai</p>
                          </div>
                          <div class="col-5">
                            <h4 class="text-center text-uppercase event-date">5th - 8th<br>dec 2022</h4>
                            <h5 class="text-center text-uppercase event-venue">HALL NO. 2<br>STALL NO. 2d91</h5>
                          </div>
                        </div>
                      </div>
                     
                    </div>

                    <div class="col-md-6">
                      <div class="event-card">
                        <div class="img-wrapper">
                          <img src="<?php echo get_template_directory_uri();?>/images/MediaCentre/2018.Ag_.Expo-1834-2-scaled.jpg" alt="" class="w-100 h-100">
                        </div>
                        <div class="row g-0">
                          <div class="col-7 text-center border-right">
                            <img class="logo" src="<?php echo get_template_directory_uri();?>/images/MediaCentre/main_1639459441.png" alt="">
                                  <h3 class="text-center text-uppercase m-0 venue">VENUE</h3>
                                  <p class="text-center text-capitalize m-0 address">VIA Ground, GIDC Vapi, Gujarat</p>
                          </div>
                          <div class="col-5">
                            <h4 class="text-center text-uppercase event-date">22nd - 24th<br>June 2022</h4>
                            <h5 class="text-center text-uppercase event-venue">HALL NO. A<br>STALL NO. 25</h5>
                          </div>
                        </div>
                      </div>
                      
                    </div> -->
                    
                  </div>
        
                </div>
                <div class="col-lg-3 order-lg-first">
        
                  <div class="d-lg-none mb-3 pt-3 border-top border-secondary"><strong>Related Links -</strong></div>
                  
                  <ul class="sideNavig">
                    <li><a href="<?php site_url(); ?>/media/mediacenter-gallery/">Gallery</a></li>
                    <li class="active"><a href="<?php site_url(); ?>/media/mediacenter-event/">Events</a></li>
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