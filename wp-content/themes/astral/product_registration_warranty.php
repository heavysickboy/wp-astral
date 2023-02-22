<?php
//Template Name: product registration
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
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Product Registration & Warranty</strong></li>
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

            <h2 class="sectionHead d-lg-none mb-4">Product Registration & Warranty</h2>

            <?php echo do_shortcode('[contact-form-7 id="89" title="product registration"]');?>

            <!-- <form class="contactForm">

              <div class="row formFormat">
                <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" placeholder="First Name *">
                </div>

                <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" placeholder="Last Name *">
                </div>

                <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" placeholder="Email Address *">
                </div>

                <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" placeholder="Phone No *">
                </div>

                <div class="col-12 mb-3">
                  <input type="text" class="form-control" placeholder="Address *">
                </div>

                <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" placeholder="Area">
                </div>

                <div class="col-md-6 mb-3">
                  <input type="text" class="form-control" placeholder="Pincode *">
                </div>

                <div class="col-md-6 mb-3">
                  <select class="form-select">
                    <option selected>State *</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                    <option value="5">Option 5</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3">
                  <select class="form-select">
                    <option selected>City *</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                    <option value="5">Option 5</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="billPurchase" class="form-label fw-normal">Upload Bill of Purchase *</label>
                  <input class="form-control" type="file" id="billPurchase">
                </div>

                <div class="col-12 mb-4">
                  <div class="form-check">
                    <input class="form-check-input rounded-0" type="checkbox" value="" id="warrantyForm">
                    <label class="form-check-label" for="warrantyForm">
                      I hearby confirm that I have read and understand the warranty manual.
                    </label>
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="ctaBtn blackBtn py-1">Submit Form</button>
                </div>

              </div>

            </form> -->

        </div>
        <div class="col-lg-3 col-xl-3 order-lg-first pe-xxl-5">

          <div class="d-lg-none mb-3 pt-3 border-top border-secondary"><strong>Related Links -</strong></div>
          
          <ul class="sideNavig">
            <li><a href="https://astralbathware.com/contact_us/office-details/">Office Details</a></li>
            <li class="active"><a href="https://astralbathware.com/contact_us/e-warranty/">Product Registration & Warranty</a></li>
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