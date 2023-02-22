<?php
//Template Name: Home
get_header();
?>




    <div class="pageWrapper" id="sticky-anchor">

      <section class="bannerSection">

        <div class="swiper heroSwiper">

            <div class="swiper-wrapper">
                
               
                
                <?php 

$i = 1;

foreach( get_cfc_meta( 'home' ) as $key => $value ){ ?> 

                <div class="swiper-slide">
                    <img src="<?php the_cfc_field( 'home','banner-image', false, $key ); ?>" class="w-100" width="2000" height="1500">
                    <div class="container heroSlideText d-flex align-items-center">
                        <div class="col-lg-7 col-xl-6">
                            <h2 class="bigText"><?php the_cfc_field( 'home','banner-title', false, $key ); ?></h2>
                            <p><?php the_cfc_field( 'home','banner-para', false, $key ); ?></p>
                            <a href="<?php the_cfc_field( 'home','banner-link', false, $key ); ?>" class="ctaBtn"><?php the_cfc_field( 'home','banner-button', false, $key ); ?></a>
                        </div>
                    </div>
                </div>
         
<?php 

$i++;

}  ?>

            </div>

            <div class="swiper-button-next heroNext heroNavBtns"></div><div class="swiper-button-prev heroPrev heroNavBtns"></div>

            <div class="swiper-pagination heroBullets container d-flex"></div>
                
        </div>

      </section>

      <section class="productSection">

        <div class="w-100 border-top border-bottom border-white">
          <div class="container">
            <ul class="nav row g-0 text-center homeTabs d-flex" role="tablist">
              <li class="col" role="presentation">
                <button class="w-100 text-uppercase nav-link active" id="sanitaryTab" data-bs-toggle="pill" data-bs-target="#sanitary" type="button" role="tab" aria-controls="sanitary" aria-selected="true"><img src="<?php echo get_template_directory_uri(); ?>/images/toilet.png"> Sanitaryware</button>
              </li>
              <li class="col" role="presentation">
                <button class="w-100 text-uppercase nav-link" id="faucetsTab" data-bs-toggle="pill" data-bs-target="#faucets" type="button" role="tab" aria-controls="faucets" aria-selected="false"><img src="<?php echo get_template_directory_uri(); ?>/images/faucet.png"> Faucets</button>
              </li>
            </ul>
          </div>
        </div>

        <div class="w-100 position-relative">

          <img src="<?php echo get_template_directory_uri(); ?>/images/bgDrops.png" class="prodDropsTop">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bgDrops.png" class="prodDropsBtm">

          <div class="container py-5 position-relative">

            <div class="row justify-content-center text-white text-center">
            <?php
if( have_rows('data') ):

while( have_rows('data') ) : the_row(); 


?>
              <div class="col-12">
                <h2 class="sectionHead"><?php the_sub_field('title');  ?></h2>
                <p class="mb-0"><?php the_sub_field('content');  ?></p>
              </div>
<?php endwhile;

endif; ?>              
            </div>

          </div>

          <div class="tab-content pb-5">
            <div class="tab-pane fade show active" id="sanitary" role="tabpanel" aria-labelledby="sanitaryTab">

              <div class="container">
              
                <div class="swiper productSwiper">
                  <div class="swiper-wrapper">
                <?php 
                $rows = get_field('sliderone');
                if( $rows ) {
                    
                     foreach( $rows as $row ) {
                         $image = $row['sliderimage'];
                         $imagetitle = $row['imagetitle'];
                         $imageURL = $row['sliderurl'];
                    
                    ?>
                    <div class="swiper-slide">
                      <a href="<?php echo $imageURL;?>" class="hmProdBox">
                        <img src="<?php echo  $image;?>" class="hmProdImg">
                        <div class="hmProdInfo">
                          <div class="hmProdDetail text-center">
                            <img src="<?php echo  $imagetitle;?>" class="hmCatLogo" title="Celestia">
                          </div>
                        </div>
                      </a>
                    </div>
                    <?php
                
                    }
                        
                    }
                    
                    ?>
                  </div>

                  <div class="swiper-button-next prodNext swiperBtns d-none d-sm-block"></div><div class="swiper-button-prev prodPrev swiperBtns d-none d-sm-block"></div>
                  <div class="swiper-pagination productPagination container d-flex justify-content-center position-static py-4"></div>
                </div>
                <!--Category-->
              <div class="row justify-content-center text-white text-center categoryWrap">
                  <div class="col-12 mb-5">
                    <h2 class="sectionHead mb-5">Our Categories</h2>
                    
                    <div class="position-relative">
                    <div class="swiper categorySwiper">
                      <div class="swiper-wrapper">
                        <?php 
                        $terms = get_field('sanitaryware_sub_category');
                        if( $terms ): ?>
                        <?php 
                        $act ='e';
                        foreach( $terms as $term ): 
                            $termName = $term->name;
                            $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id );
                            $term_link = get_term_link( $term );
                             ?>
                            <div class="swiper-slide">
                              <a href="<?php echo $term_link; ?>" class="categoryBox">
                                <div class="categoryPic">
                                <?php 
                                    if ( $image ) {
                                		    echo '<img src="' . $image . '" alt="'. $term->name . '" title="'. $term->name . '"/>';
                                		}
                                	?>
                                </div>	
                                <div class="catName"><?php echo $termName; ?></div>
                             </a>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?> 
                    </div>
                    
                    
                
                </div>
                
                    <div class="swiper-button-next catNext swiperBtns d-none d-sm-block"></div><div class="swiper-button-prev catPrev swiperBtns d-none d-sm-block"></div>

                  </div>
                 </div>
                </div>
                <!--Category end-->
              </div>
              
              <div class="newArrivalSection position-relative pb-5">

                <div class="newArrivalSwipers swiper">
                  <div class="swiper-wrapper">                 
                  
                 <?php 
$rows = get_field('slidertwo');
if( $rows ) {
    
     foreach( $rows as $row ) {
          
         $imagetitle = $row['sliderimage'];
         $secondtitle = $row['secondtitle'];
         $content = $row['content'];
         $images = $row['image'];
         $link = $row['link'];
           
    
    ?>  

                    <div class="swiper-slide">
                      
                        <div class="row g-0 newArrivalItem h-100 text-white">
                          <div class="col-lg-7 col-md-6 position-relative overflow-hidden">
                            <img src="<?php echo $images;?>" class="newArrvImg">
                          </div>
                          <div class="col-lg-5 col-md-6 order-md-first newArrivalDetails">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/bgDrops.png" class="newArrvIcon">
                            <div class="newArrvBox">
                              <h4 class="newArrvHead"><?php echo $imagetitle;?></h4>
                              <h2 class="newArrvProductName text-uppercase mb-4"> <?php echo $secondtitle;?></h2>
                              <p class="mb-4"><?php echo $content;?></p>
                              <a href="<?php echo $link;?>" class="ctaBtn">View Products</a>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                  <div class="swiper-pagination newArrvBullets container d-flex justify-content-end"></div>
                </div>

              </div>

            </div>
            <div class="tab-pane fade" id="faucets" role="tabpanel" aria-labelledby="faucetsTab">

              <div class="container">
              
                <div class="swiper faucetsSwiper">
                  <div class="swiper-wrapper">
        <?php 
        $rows = get_field('slideronefaucets');
        if( $rows ) {
            
             foreach( $rows as $row ) {
         $image = $row['sliderimage'];
         $imagetitle = $row['imagetitle'];
         $imageURL = $row['sliderurl'];
    
    ?>
                    <div class="swiper-slide">
                      <a href="<?php echo $imageURL;?>" class="hmProdBox">
                        <img src="<?php echo  $image;?>" class="hmProdImg">
                        <div class="hmProdInfo">
                          <div class="hmProdDetail text-center">
                            <img src="<?php echo  $imagetitle;?>" class="hmCatLogo" title="Celestia">
                          </div>
                        </div>
                      </a>
                    </div>
                    <?php
                
                    }
                        
                    }
                    
                    ?>
                  </div>

                  <div class="swiper-button-next prodNext swiperBtns d-none d-sm-block"></div><div class="swiper-button-prev prodPrev swiperBtns d-none d-sm-block"></div>
                  <div class="swiper-pagination productPagination container d-flex justify-content-center position-static py-4"></div>

                </div>
                <!--Category-->
              <div class="row justify-content-center text-white text-center  categoryWrap">
                  <div class="col-12 mb-5">
                    <h2 class="sectionHead mb-5">Our Categories</h2> 
                    
                    <div class="position-relative">
                    
                    <div class="swiper categorySwiper">
                      <div class="swiper-wrapper">
                        <?php 
                        $terms = get_field('faucets_sub_category');
                        if( $terms ): ?>
                        <?php 
                        $act ='e';
                        foreach( $terms as $term ): 
                            $termName = $term->name;
                            $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id );
                            $term_link = get_term_link( $term );
                             ?>
                            <div class="swiper-slide">
                              <a href="<?php echo $term_link; ?>" class="categoryBox">
                                <div class="categoryPic">
                                <?php 
                                    if ( $image ) {
                                		    echo '<img src="' . $image . '" alt="'. $term->name . '" title="'. $term->name . '"/>';
                                		}
                                	?>
                                </div>	
                                <div class="catName"><?php echo $termName; ?></div>
                             </a>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?> 
                    </div>
                
                </div>   
                
                    <div class="swiper-button-next catNext swiperBtns d-none d-sm-block"></div><div class="swiper-button-prev catPrev swiperBtns d-none d-sm-block"></div>

                  </div>
                
                 </div>
                </div>
                <!--Category end-->
              </div>
              
              <div class="newArrivalSection position-relative pb-5">
                <div class="newArrivalSwipers swiper">
                  <div class="swiper-wrapper">

                                    
                    
<?php 
$rows = get_field('slidertwofaucets');
if( $rows ) {
    
     foreach( $rows as $row ) {
          
         $imagetitle = $row['sliderimage'];
         $secondtitle = $row['secondtitle'];
         $content = $row['content'];
         $image = $row['image'];
         $link = $row['link'];
           
    
    ?>  

                    <div class="swiper-slide">
                      
                        <div class="row g-0 newArrivalItem h-100 text-white">
                          <div class="col-lg-7 col-md-6 position-relative overflow-hidden">
                            <img src="<?php echo $image;?>" class="newArrvImg">
                          </div>
                          <div class="col-lg-5 col-md-6 order-md-first newArrivalDetails">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/bgDrops.png" class="newArrvIcon">
                            <div class="newArrvBox">
                              <h4 class="newArrvHead"><?php echo $imagetitle;?></h4>
                              <h2 class="newArrvProductName text-uppercase mb-4"> <?php echo $secondtitle;?></h2>
                              <p class="mb-4"><?php echo $content;?></p>
                              <a href="<?php echo $link;?>" class="ctaBtn">View Products</a>
                            </div>
                          </div>
                        </div>
                      
                    </div>
<?php
}
}

?>
                    

                  </div>
                  <div class="swiper-pagination newArrvBullets container d-flex justify-content-end"></div>
                </div>

              </div>

            </div>
          </div>

        </div>  

      </section>

      <section class="supportSection">

        <div class="container position-relative">
          <div class="row justify-content-between">
          <?php
	        $expert_details = get_field('expert_details');
	        if( $expert_details): ?>
            <div class="col-lg-4 mb-5 mb-lg-0 text-white">
              <h3 class="supportTitle mb-4 pb-2 d-inline-block text-uppercase">
                <?php echo $expert_details['expert_heading']; ?>
              </h3>
              <p><?php echo $expert_details['expert_short_text']; ?></p>
              <?php if($expert_details['expert_support_number']){?>
              <div class="row mb-4">
                <div class="col-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>
                </div>
                <div class="col"><?php echo $expert_details['expert_support_number']; ?></div>
              </div>
              <?php }?>
            <?php if($expert_details['expert_support_email']){?>
              <div class="row">
                <div class="col-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/></svg>
                </div>
                <div class="col"><a href="mailto:<?php echo $expert_details['expert_support_email']; ?>" target="_blank"><?php echo $expert_details['expert_support_email']; ?></a></div>
              </div>
              <?php }?>
            </div>
            <?php endif;?>
            <div class="col-lg-4 position-relative d-flex align-items-center">

              <img src="<?php echo get_template_directory_uri(); ?>/images/bgDrops.png" class="supportBoxBg">

              <div class="row position-relative">
                <div class="col-12 mb-4">
                  <a href="https://astralbathware.com/wp-content/uploads/2022/12/Bathware-Brochure-Single-Page-9-Dec.pdf" target="_blank" class="d-flex w-100 bg-white py-2 px-3 supportItem">
                    <div class="align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/images/icSupport_1.png"></div>
                    <div class="ps-4"> <strong class="align-text-top">Download Catalogue</strong></div>
<!-- 			    <div class="ps-4"> <strong>Download Catalogue</strong> <small class="d-block">Click here for more information</small> </div> -->
                  </a>
                </div>
                <div class="col-12 mb-0">
                  <a href="https://astralbathware.com/contact_us/office-details/"  target="_blank"  class="d-flex w-100 bg-white py-2 px-3 supportItem">
                    <div class="align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/images/icSupport_2.png"></div>
                    <div class="ps-4"> <strong>Share your details </strong> <small class="d-block">Do fill in the form and we will contact you</small> </div>
                  </a>
                </div>
                <!--<div class="col-12 mb-4">
                  <div class="d-flex w-100 bg-white py-2 px-3 supportItem">
                    <div class="align-self-center"><img src="images/icSupport_3.png"></div>
                    <div class="ps-4"> <strong>How to videos</strong> <small class="d-block">Explore our videos and bring wellness to your home</small> </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>

      </section>
      
      
      <section class="groupCompanies py-5">
          <div class="container position-relative">
            <div class="row justify-content-center text-white text-center categoryWrap">
              <div class="col-12 mb-md-5">
                <h2 class="sectionHead mb-4 mb-md-5">Group Companies</h2>
                
                <div class="position-relative">
                  <div class="swiper companySwiper">
                    <div class="swiper-wrapper">
                      <?php 
                        foreach( get_cfc_meta( 'group_company' ) as $key => $value ){ ?> 
                         <div class="swiper-slide">
                            <a href="<?php the_cfc_field( 'group_company','url', false, $key ); ?>" class="companyBox">
                              <img src="<?php the_cfc_field( 'group_company','images-group-companies', false, $key ); ?>">
                            </a>
                         </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="swiper-pagination productPagination container d-flex justify-content-center position-static py-4"></div> -->
                  </div>
                  <div class="swiper-button-next prodNext swiperBtns d-none d-sm-block"></div><div class="swiper-button-prev prodPrev swiperBtns d-none d-sm-block"></div>
              </div>
              </div>
            </div>
          </div>
          <img src="https://astralbathware.com/wp-content/uploads/2022/07/bgDrops.png" class="companyBg">
      </section>

    </div>

<?php
get_footer();
?>