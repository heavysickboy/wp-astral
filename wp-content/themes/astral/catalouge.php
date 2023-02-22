<?php
//Template Name: catalogue list
get_header();
?> 

      <div class="pageWrapper" id="sticky-anchor">
            <!-- banner starts -->

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
<section class="innerBanner position-relative">
    <img src="<?php the_post_thumbnail_url();?>" class="w-100">
    <div class="container d-flex align-items-md-center align-items-end">
      <h1><?php the_title();?></h1>
    </div>
</section>  
<?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>  
  <!-- banner ends -->

        <section class="py-3">
            <div class="container position-relative">
                <img src="images/bgblackDrops.png" alt="" class="ContDropsTop">
                <div class="row justify-content-between">
                    <div class="col-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active catalogue_tab" aria-current="page" href="" title="tab_1" style="margin-left: 0;padding-left: 0;">Sanitary Ware</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link catalogue_tab" href="" title="tab_2">Faucet</a>
                            </li>
                          </ul>
                    </div>
                </div>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab active" id="tab_1">
                    <!--    <div class="dropdown_wrapper">-->
                    <!--    <div class="row ">-->
                    <!--        <div class="col-auto">-->
                    <!--            <div class="categories dropdown text-center">-->
                    <!--                <select name="" id="">-->
                    <!--                    <option selected>All Categories</option>-->
                    <!--                    <option value="1">Option 1</option>-->
                    <!--                    <option value="2">Option 2</option>-->
                    <!--                </select>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="col-auto">-->
                    <!--            <div class="product dropdown text-center">-->
                    <!--                <select name="" id="">-->
                    <!--                    <option selected>Select Product</option>-->
                    <!--                    <option value="1">Option 1</option>-->
                    <!--                    <option value="2">Option 2</option>-->
                    <!--                </select>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                        <div class="row g-4 my-3">
  <?php
    $args = array(
        'post_type' => 'saniwarecatalogue'
    );

    $post_query = new WP_Query($args);

    if($post_query->have_posts() ) {
        while($post_query->have_posts() ) {
            $post_query->the_post();
            
            
            ?>                            
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php the_post_thumbnail_url() ;?>" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase"><?php the_title();?></h2>
                                            <a href="<?php echo (get_the_excerpt());?>" target="_blank" class="ctaBtn brown d-inline-block mt-4" download>
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
      <?php
           
            }
        }
?>                
                            
    
                            
     
       
                        </div>

                        


                    </div>
                    <div class="tab active" id="tab_2" style="display: none;">
                        <!--<div class="dropdown_wrapper">-->
                        <!--    <div class="row ">-->
                        <!--        <div class="col-auto">-->
                        <!--            <div class="categories dropdown text-center">-->
                        <!--                <select name="" id="">-->
                        <!--                    <option selected>All Categories</option>-->
                        <!--                    <option value="1">Option 1</option>-->
                        <!--                    <option value="2">Option 2</option>-->
                        <!--                </select>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-auto">-->
                        <!--            <div class="product dropdown text-center">-->
                        <!--                <select name="" id="">-->
                        <!--                    <option selected>Select Product</option>-->
                        <!--                    <option value="1">Option 1</option>-->
                        <!--                    <option value="2">Option 2</option>-->
                        <!--                </select>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="row g-4 my-3">
         <?php
    $args = array(
        'post_type' => 'faucetcatalogue'
    );

    $post_query = new WP_Query($args);

    if($post_query->have_posts() ) {
        while($post_query->have_posts() ) {
            $post_query->the_post();
            
            
            ?>                              
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php the_post_thumbnail_url() ;?>" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase"><?php the_title() ;?></h2>
                                            <a href="<?php echo (get_the_excerpt());?>" target="_blank" class="ctaBtn brown d-inline-block mt-4" download>
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            
    <?php
           
            }
        }
?>                
                            
                               
    
                            
    
                           
    
                            
    
                             
    
                         
                        </div>

                        


                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
get_footer();
?>