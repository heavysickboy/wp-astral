<?php
//Template Name: office details
/*
Template Post Type: contact_us
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
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Contact Us</strong></li>
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Office Details</strong></li>
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
        <div class="col-lg-9 col-xl-9 mb-5 mb-lg-0">

          <h2 class="sectionHead d-lg-none mb-4">Office Details</h2>

          <div class="row">
            <div class="col-xl-5 mb-lg-0 mb-5">

              <div class="addressBox h-100">

                <h5 class="boxHead mb-3"><?php the_cfc_field( 'office_details','address_title'); ?></h5>
                <address class="mb-4">
                  <strong><?php the_cfc_field( 'office_details','company_name'); ?></strong>,<br>
                  <small><?php the_cfc_field( 'office_details','address_small_title'); ?></small><br>
                  <?php the_cfc_field( 'office_details','address'); ?>
                 
                </address>

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_telephone.png"></div>
                  <div class="flex-grow-1"><?php the_cfc_field( 'office_details','phone_number'); ?></div>
                </div>

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_fax.png"></div>
                  <div class="flex-grow-1"><?php the_cfc_field( 'office_details','fax_number'); ?></div>
                </div>

                <div class="d-flex">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_email.png"></div>
                  <div class="flex-grow-1"><a href="<?php the_cfc_field( 'office_details','email_link'); ?>"><?php the_cfc_field( 'office_details','email_id'); ?></a></div>
                </div>

              </div>

            </div>
            <div class="col-xl-7">

            <?php echo do_shortcode('[contact-form-7 id="1749" title="contact form new"]');?>

              <!-- <form class="contactForm h-100">

                 <div class="row formFormat">

                  <div class="col-12 mb-3">
                    <input type="text" class="form-control" placeholder="Name *">
                  </div>
  
                  <div class="col-12 mb-3">
                    <input type="text" class="form-control" placeholder="Email Address *">
                  </div>
  
                  <div class="col-12 mb-3">
                    <input type="text" class="form-control" placeholder="Phone No *">
                  </div>
  
                  <div class="col-md-6 mb-3">
                    <select class="form-select">
                      <option selected>Enquiry Type *</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                      <option value="4">Option 4</option>
                      <option value="5">Option 5</option>
                    </select>
                  </div>
  
                  <div class="col-md-6 mb-3">
                    <select class="form-select">
                      <option selected>Country *</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                      <option value="4">Option 4</option>
                      <option value="5">Option 5</option>
                    </select>
                  </div>

                  <div class="col-12 mb-3">
                    <textarea class="form-control" placeholder="Message"></textarea>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="ctaBtn blackBtn py-1">Submit Form</button>
                  </div>

                </div>

              </form> -->

            </div>
          </div>

        </div>
        <div class="col-lg-3 col-xl-3 order-lg-first pe-xxl-5">
          <div class="d-lg-none mb-3 pt-3 border-top border-secondary"><strong>Related Links -</strong></div>
          <ul class="sideNavig">
            <li class="active"><a href="https://astralbathware.com/contact_us/office-details/">Office Details</a></li>
            <li><a href="https://astralbathware.com/contact_us/e-warranty/">Product Registration & Warranty</a></li>
            <li><a href="https://astralbathware.com/contact_us/become-a-dealer/">Become A Dealer</a></li>
            <!--<li><a href="https://astralbathware.com/contact_us/store-locator/">Store Locator</a></li>-->
        </ul>
        </div>
      </div>
    </div>

  </section>


</div>

<?php
get_footer();
?>