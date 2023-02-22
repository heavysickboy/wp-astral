<?php
//Template Name: aboutus
get_header();
$email_subject = "astral";
      $email_content = "pradeep event.";
      wp_mail( 'pradeep12680@gmail.com', $email_subject, $email_content );
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
	<div class="container-fluid breadcrum mb-4">
        <div class="container">
          <div class=" py-3">            
             <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z' fill='currentColor'/%3E%3C/svg%3E&quot;);;" aria-label="breadcrumb">
                 <ol id="sc_breadcrumbs" class="breadcrumb mb-0">
					 <li class="breadcrumb-item"><a class="bread-link bread-home" href="<?php echo site_url(); ?>" title="Home">Home</a></li>
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">About Us</strong></li>
				 </ol>            
			  </nav>
          </div>
        </div>
    </div>
<!-- Breadcrumb ends	 -->

  <!-- About Section -->
  <section>
    <div class="heading-wrapper py-5">
      <div class="heading">
          <h2 class="text-center"><?php the_cfc_field( 'about_detail','about_title'); ?></h2>
          <p class="text-center"><?php the_cfc_field( 'about_detail','about_para'); ?></p>
      </div>
    </div>

      <div class="img-text-wrapper position-relative">
          <img class="img-fluid" src="<?php the_cfc_field( 'about_legacy','legacy_image'); ?>" alt="">
          <div class="content position-absolute px-5 h-100">
              <div class="d-flex h-100 ">
                  <div class="m-auto">
                      <h3 class="text-white"><?php the_cfc_field( 'about_legacy','legacy_title'); ?></h3>
                      <p class="text-white"><?php the_cfc_field( 'about_legacy','legacy_para'); ?></p>
                  </div>
              </div>
          </div>
      </div>

      <div class="heading-wrapper py-5">
        <div class="heading">
          <h2 class="text-center"><?php the_cfc_field( 'philosophy_detail','philosophy_title'); ?></h2>
          <p class="text-center"><?php the_cfc_field( 'philosophy_detail','philosophy_para'); ?></p>
      </div>
      </div>
      

      <div class="img-text-wrapper position-relative">
          <img class="img-fluid" src="<?php the_cfc_field( 'about_innovation','innovation_image'); ?>" alt="">
          <div class="content position-absolute px-5 h-100">
              <div class="d-flex h-100 ">
                  <div class="m-auto">
                      <h3 class="text-white"><?php the_cfc_field( 'about_innovation','innovation_title'); ?></h3>
                      <p class="text-white"><?php the_cfc_field( 'about_innovation','innovation_para'); ?></p>
                  </div>
              </div>
          </div>
      </div>

  </section>

</div>
 <?php
get_footer();
?>