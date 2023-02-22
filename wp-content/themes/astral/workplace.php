<?php
//Template Name: workplace
/*
Template Post Type: careers
*/

get_header();
?>
    
<div class="pageWrapper" id="sticky-anchor">
  <!-- banner starts -->
  <section  class="innerBanner position-relative">
    <img src="<?php the_cfc_field( 'inner_banner','inner_banner_pic'); ?>" class="w-100">
    <div class="container d-flex align-items-md-center align-items-end">
      <h1><?php the_cfc_field( 'inner_banner','inner_page_title'); ?></h1>
    </div>
  </section>
  <!-- banner ends -->
  
  <!-- Breadcrumb	start -->
	<div class="container-fluid breadcrum">
        <div class="container">
          <div class=" py-3">            
             <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z' fill='currentColor'/%3E%3C/svg%3E&quot;);;" aria-label="breadcrumb">
                 <ol id="sc_breadcrumbs" class="breadcrumb mb-0">
					 <li class="breadcrumb-item"><a class="bread-link bread-home" href="<?php echo site_url(); ?>" title="Home">Home</a></li>
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Careers</strong></li>
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Workplace</strong></li>
				 </ol>            
			  </nav>
          </div>
        </div>
    </div>
<!-- Breadcrumb ends	 -->

  <section class="py-5 careerWrap">

    <div class="container py-md-4 position-relative">
      
      <img src="images/bgblackDrops.png" class="ContDropsTop">

      <div class="row position-relative gx-5">
        <div class="col-lg-9 ps-xxl-5 mb-5 mb-lg-0">

          <p class="mb-5"><?php the_cfc_field( 'workplace_content','work_brief'); ?></p>


          <h1 class="mb-5"><?php the_cfc_field( 'workplace_content','work_reason_title'); ?></h1>




          <div class=" w-100 overflow-hidden mb-5">
            <div class="careerSwiper swiper">
            <div class="swiper-wrapper">

            <?php 

$i = 1;

foreach( get_cfc_meta( 'workplace' ) as $key => $value ){ ?> 

  
              <div class="swiper-slide">
                
                  <div class="row g-0 newArrivalItem h-100 text-white">
                    <div class="col-lg-6 col-md-6 position-relative overflow-hidden">
                      <img src="<?php the_cfc_field( 'workplace','workplace_image', false, $key ); ?>" class="workImg">
                    </div>
                    <div class="col-lg-6 col-md-6 workDetails" style="background:url(<?php print(get_template_directory_uri()); ?>/images/work_1_film.jpg) no-repeat;">
                      
                      <div class="workBox">
                        
                        <h2 class="workPlaceName mb-4"> <?php the_cfc_field( 'workplace','workplace_title', false, $key ); ?></h2>
                        <p class="mb-4"><?php the_cfc_field( 'workplace','workplace_para', false, $key ); ?></p>
                        
                      </div>

                      
                    </div>
                  </div>
                
              </div>

              
<?php 

$i++;

}  ?>
              
  
            </div>
           

            <div class="swiper-button-prev"></div>
       <div class="swiper-button-next"></div>
          </div>
        </div>




          <div class="weLook position-relative">
              <img src="<?php the_cfc_field( 'workplace_look_forword','forword_image'); ?>" class="w-100">
              <div class="weLookText">
                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3"><img src="<?php the_cfc_field( 'workplace_look_forword','forword_icon'); ?>"></div>
                  <div class="flex-grow-1"><?php the_cfc_field( 'workplace_look_forword','forword_text'); ?></div>
                </div>
              </div>
          </div>
          <div class="centerbuttonCom">

			  <a href="https://astralbathware.com/careers/current-opening/" class="commanBtn">Current Job Openings</a>
			  <a href="https://astralbathware.com/apply-form/" class="commanBtn">Submit Resume</a>
		  </div>
          


        </div>
        <div class="col-lg-3 order-lg-first">

          <div class="d-lg-none mb-3 pt-3 border-top border-secondary"><strong>Related Links -</strong></div>
          
          <ul class="sideNavig">
            <li class="active"><a href="<?php site_url(); ?>/careers/workplace/">Workplace</a></li>
            <li><a href="<?php site_url(); ?>/careers/current-opening/">Current Openings</a></li>
          </ul>
          
        </div>
      </div>
    </div>

  </section>


</div>

    <?php
get_footer();
?>