<?php
//Template Name: store locator
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

  <section class="py-5">

    <div class="container py-md-4 position-relative">
      
      <img src="images/bgblackDrops.png" class="ContDropsTop">

      <div class="row position-relative">
        <div class="col-lg-9 col-xl-9 mb-5 mb-lg-0">

            <h2 class="sectionHead d-lg-none mb-4">Store Locator</h2>

            <div class="contactForm locatorWrap mb-5">

              <div class="row ">

                <div class="col-md-6 mb-3">
                   
                    
                    <select required="required" class="form-select py-3" id="div_years" name="div_years">
                    <option value="">Select</option>
                    
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telengana">Telengana</option>
                    </select>
                    
                </div>

                <div class="col-md-6 mb-3">
                   
                  
                  <select required="required" class="form-select py-3" id="div_sections" name="div_sections" onchange="showDiv('hidden_div', this)">
  <option value="">Select</option>
  <option value="Guntur" data-val="Andhra Pradesh">Guntur</option>
  <option value="Kurnool" data-val="Andhra Pradesh">Kurnool</option>
  <option value="Rajahmundry" data-val="Andhra Pradesh">Rajahmundry</option>
  <option value="Vijayawada" data-val="Andhra Pradesh">Vijayawada</option>
  <option value="Vizag" data-val="Andhra Pradesh">Vizag</option>
  <option value="Bilaspur" data-val="Chhattisgarh">Bilaspur</option>
  <option value="Raipur" data-val="Chhattisgarh">Raipur</option>
  <option value="Faridabad" data-val="Delhi">Faridabad</option>
   <option value="Mayurvihar" data-val="Delhi">Mayurvihar</option>
    <option value="Ahmedabad" data-val="Gujarat">Ahmedabad</option>
     <option value="Anand" data-val="Gujarat">Anand</option>
      <option value="Ankleshwar" data-val="Gujarat">Ankleshwar</option>
       <option value="Bhavnagar" data-val="Gujarat">Bhavnagar</option>
        <option value="Botad" data-val="Gujarat">Botad</option>
        <option value="Jamnagar" data-val="Gujarat">Jamnagar</option>
        <option value="Junagadh" data-val="Gujarat">Junagadh</option>
        <option value="Kadodara" data-val="Gujarat">Kadodara</option>
        <option value="Mahuva" data-val="Gujarat">Mahuva</option>
        <option value="Mehsana" data-val="Gujarat">Mehsana</option>
        <option value="Morbi" data-val="Gujarat">Morbi</option>
        <option value="Palanpur" data-val="Gujarat">Palanpur</option>
        <option value="Rajkot" data-val="Gujarat">Rajkot</option>
        <option value="Surat" data-val="Gujarat">Surat 1</option>
        <option value="Vapi" data-val="Gujarat">Vapi</option>
        <option value="Karnal" data-val="Haryana">Karnal</option>
        <option value="Rohtak" data-val="Haryana">Rohtak</option>
        <option value="Yamunanagar" data-val="Haryana">Yamunanagar</option>
        <option value="Bangalore" data-val="Karnataka">Bangalore</option>
        <option value="Belgaum" data-val="Karnataka">Belgaum</option>
        <option value="Bidar" data-val="Karnataka">Bidar</option>
        <option value="Davangere" data-val="Karnataka">Davangere</option>
        <option value="Gulbarga" data-val="Karnataka">Gulbarga</option>
        <option value="Hubli" data-val="Karnataka">Hubli</option>
        <option value="Mysore" data-val="Karnataka">Mysore</option>
        <option value="Shimoga" data-val="Karnataka">Shimoga</option>
        <option value="Tumkur" data-val="Karnataka">Tumkur</option>
        <option value="Bhopal" data-val="Madhya Pradesh">Bhopal</option>
        <option value="Dewas" data-val="Madhya Pradesh">Dewas</option>
        <option value="Guna" data-val="Madhya Pradesh">Guna</option>
        <option value="Gwalior" data-val="Madhya Pradesh">Gwalior</option>
        <option value="Indore" data-val="Madhya Pradesh">Indore 1</option>
        <option value="Jabalpur" data-val="Madhya Pradesh">Jabalpur</option>
        <option value="Khargone" data-val="Madhya Pradesh">Khargone</option>
        <option value="Sagar" data-val="Madhya Pradesh">Sagar</option>
        <option value="Ujjain" data-val="Madhya Pradesh">Ujjain</option>
        
        <option value="Ahmednagar" data-val="Maharashtra">Ahmednagar</option>
        <option value="Akola" data-val="Maharashtra">Akola</option>
        <option value="Amravati" data-val="Maharashtra">Amravati</option>
        <option value="Aurangabad" data-val="Maharashtra">Aurangabad</option>
        <option value="BEED" data-val="Maharashtra">BEED</option>
        <option value="Bhandara" data-val="Maharashtra">Bhandara</option>
        <option value="Buldhana" data-val="Maharashtra">Buldhana</option>
        <option value="Chakan" data-val="Maharashtra">Chakan</option>
        <option value="Dhule" data-val="Maharashtra">Dhule</option>
        <option value="Gondia" data-val="Maharashtra">Gondia</option>
        <option value="Hadapsar" data-val="Maharashtra">Hadapsar</option>
        <option value="Jalgaon" data-val="Maharashtra">Jalgaon</option>
        <option value="Jalna" data-val="Maharashtra">Jalna</option>
        <option value="Kalyan" data-val="Maharashtra">Kalyan</option>
        <option value="Katraj" data-val="Maharashtra">Katraj</option>
        <option value="Kolhapur" data-val="Maharashtra">Kolhapur</option>
        <option value="Latur" data-val="Maharashtra">Latur</option>
        <option value="Nagpur" data-val="Maharashtra">Nagpur 1</option>
        <option value="Nanded" data-val="Maharashtra">Nanded</option>
        <option value="Nasik" data-val="Maharashtra">Nasik 1</option>
        <option value="Osmanabad" data-val="Maharashtra">Osmanabad</option>
        <option value="Panvel" data-val="Maharashtra">Panvel</option>
        <option value="Parbhani" data-val="Maharashtra">Parbhani</option>
        <option value="Pimpri" data-val="Maharashtra">Pimpri</option>
        <option value="Sangli" data-val="Maharashtra">Sangli</option>
        <option value="Satara" data-val="Maharashtra">Satara</option>
        <option value="Shrirampur" data-val="Maharashtra">Shrirampur</option>
        <option value="Solapur" data-val="Maharashtra">Solapur</option>
        <option value="Virar" data-val="Maharashtra">Virar</option>
        <option value="Wardha" data-val="Maharashtra">Wardha</option>
        <option value="Washim" data-val="Maharashtra">Washim</option>
        <option value="Yavatmal" data-val="Maharashtra">Yavatmal</option>
         <option value="Mumbai" data-val="Maharashtra">Mumbai</option>
        <option value="Ajmer" data-val="Rajasthan">Ajmer</option>
        <option value="Alwar" data-val="Rajasthan">Alwar</option>
        <option value="Bhilwara" data-val="Rajasthan">Bhilwara</option>
        <option value="Bikaner" data-val="Rajasthan">Bikaner</option>
        <option value="Jaipur" data-val="Rajasthan">Jaipur</option>
        <option value="Jodhpur" data-val="Rajasthan">Jodhpur</option>
        <option value="Kota" data-val="Rajasthan">Kota</option>
        <option value="Pali" data-val="Rajasthan">Pali</option>
        <option value="Rajasamand" data-val="Rajasthan">Rajasamand</option>
        <option value="Udaipur" data-val="Rajasthan">Udaipur</option>
        
        <option value="Avadi" data-val="Tamil Nadu">Avadi</option>
         <option value="Chengalpattu" data-val="Tamil Nadu">Chengalpattu</option>
          <option value="Coimbatore" data-val="Tamil Nadu">Coimbatore</option>
           <option value="Erode" data-val="Tamil Nadu">Erode</option>
            <option value="Kanchipuram" data-val="Tamil Nadu">Kanchipuram</option>
             <option value="Kumbakonam" data-val="Tamil Nadu">Kumbakonam</option>
              <option value="Madurai" data-val="Tamil Nadu">Madurai</option>
               <option value="Salem" data-val="Tamil Nadu">Salem</option>
                <option value="Thanjavur" data-val="Tamil Nadu">Thanjavur</option>
     <option value="Thirunelveli" data-val="Tamil Nadu">Thirunelveli</option>
     <option value="Thiruvannamalai" data-val="Tamil Nadu">Thiruvannamalai</option>
     <option value="Tiruvallur" data-val="Tamil Nadu">Tiruvallur</option>
     <option value="Trichy" data-val="Tamil Nadu">Trichy</option>
     <option value="Vellore" data-val="Tamil Nadu">Vellore</option>
     <option value="Hyderabad" data-val="Telengana">Hyderabad</option>
     <option value="Warangal" data-val="Telengana">Warangal</option>
</select>
                </div>

                
              </div>

              <hr>
           <?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
              'post_type' => 'officeaddresses',
              'post_status' => 'publish',
              'posts_per_page' => -1,
               
            );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                    ?>              
        <div id="<?php the_title();?>" class="colors" style="display:none" > 
              <h2 class="mb-4"><?php  the_title();?></h2>
        <?php 

$i = 1;

foreach( get_cfc_meta( 'officeaddress' ) as $key => $value ){ ?> 
              <div class=" h-100">

                <h6 class="boxHead mb-3">Registered & Corporate Office</h6>
               <?php the_cfc_field( 'officeaddress','addressoffice', false, $key ); ?>

                <div class="d-md-flex justify-content-between">

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_telephone.png"></div>
                  <div class="flex-grow-1"> <?php the_cfc_field( 'officeaddress','phonenumberone', false, $key ); ?></div>
                </div>

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_fax.png"></div>
                  <div class="flex-grow-1"> <?php the_cfc_field( 'officeaddress','phonenumbertwo', false, $key ); ?></div>
                </div>

                <div class="d-flex ">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_email.png"></div>
                  <div class="flex-grow-1"><a href="mailto:<?php the_cfc_field( 'officeaddress','emails', false, $key ); ?>"> <?php the_cfc_field( 'officeaddress','emails', false, $key ); ?></a></div>
                </div>

              </div>

              </div>

              <div class="mapDiv">
              <?php  the_content();?>
              </div>
    <?php 

$i++;

}  ?>              
              
         </div>
         
 <?php endwhile;?>  
               <div id="Mumbai" class="colorscolors" style="display:block" > 
                 <h2 class="mb-4">Ahmedabad</h2>

              <div class=" h-100">

                <h6 class="boxHead mb-3">Registered & Corporate Office</h6>
                <address class="mb-4">
                  <strong>Astral Limited</strong>
                  <small>(Formerly known as Astral Poly Technik Limited)</small>
                  "ASTRAL HOUSE" 207/1, Behind Rajpath Club,
                  Off. S.G. Highway, Ahmedabad - 380059, India.
                </address>

                <div class="d-md-flex justify-content-between">

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_telephone.png"></div>
                  <div class="flex-grow-1">+91-79-66212000</div>
                </div>

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_fax.png"></div>
                  <div class="flex-grow-1">+91-79-66212121</div>
                </div>

                <div class="d-flex ">
                  <div class="flex-shrink-0 me-3"><img src="<?php echo get_template_directory_uri(); ?>/images/ic_email.png"></div>
                  <div class="flex-grow-1"><a href="mailto:info@astralpipes.com">info@astralpipes.com</a></div>
                </div>

              </div>

              </div>

              <div class="mapDiv">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14686.520914155557!2d72.49176934548352!3d23.0373453344079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b442c8b8a5b%3A0xdf9c58d7a1c1a581!2sASTRAL%20PIPES!5e0!3m2!1sen!2sin!4v1654600932894!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>    
              </div>
            </div>

            

        </div>
        <div class="col-lg-3 col-xl-3 order-lg-first pe-xxl-5">

          <div class="d-lg-none mb-3 pt-3 border-top border-secondary"><strong>Related Links -</strong></div>
          
          <ul class="sideNavig">
            <li><a href="https://astralbathware.com/contact_us/office-details/">Office Details</a></li>
            <li><a href="https://astralbathware.com/contact_us/product-registration/">Product Registration & Warranty</a></li>
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