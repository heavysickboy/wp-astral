<?php
//Template Name: catalogue
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
                            <!--<div class="col-auto">-->
                            <!--    <div class="categories dropdown text-center">-->
                            <!--        <select name="" id="">-->
                            <!--            <option selected>All Categories</option>-->
                            <!--            <option value="1">Option 1</option>-->
                            <!--            <option value="2">Option 2</option>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
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
                            
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/1.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/2.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/3.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/4.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/5.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/6.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/7.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/8.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        


                    </div>
                    <div class="tab active" id="tab_2" style="display: none;">
                        <div class="dropdown_wrapper">
                            <div class="row ">
                                <div class="col-auto">
                                    <div class="categories dropdown text-center">
                                        <select name="" id="">
                                            <option selected>All Categories</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="product dropdown text-center">
                                        <select name="" id="">
                                            <option selected>Select Product</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 my-3">
                            
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/8.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/7.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/6.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/5.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/4.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/3.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/2.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="prodWrapper row ms-3">
                                    <div class="col-5 border-right">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/catalouges/1.png" alt="">
                                    </div>
                                    <div class="col-7 m-auto">
                                        <div class="prod_details">
                                            <h2 class="prod_title text-uppercase">ASTRAL PRODUCT CATALOGUE 2021- TOP WARE FAUCET - 420/FG/001</h2>
                                            <a href="" target="_blank" class="ctaBtn brown d-inline-block mt-4">
                                                <div class=" d-flex align-items-center w-100">
                                                Download Brochure <i class="bi bi-file-earmark-arrow-down"></i> </div>
                                            </a>                                   
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        


                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
get_footer();
?>