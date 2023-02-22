<?php
//Template Name: current opening
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
					 <li class="breadcrumb-item item-current item-archive"><strong class="bread-current bread-archive">Current Openings</strong></li>
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

          <form class="form row mb-5 gx-4">
            <div class="col-md-3 col-sm-6 col-12 mb-2">
              <select name="location" id="location" class="form-select selectState rounded-0">
                <option value="Select">Location</option>
                
                <?php
                $myterms = get_terms('location', 'orderby=none&hide_empty');    
                
                foreach ($myterms as $term) { ?>
                
                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                
                <?php
                } 
                
                ?>
                
               <!-- <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>-->
                </select>
            </div>
            <div class="col-md-3 col-sm-6 col-12  mb-2">
              <select name="jobrole" id="jobrole" class="form-select selectState rounded-0">
                <option value="">Job Title </option>
                <?php
                $myterms = get_terms('jobrole', 'orderby=none&hide_empty');    
                
                foreach ($myterms as $term) { ?>
                
                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                
                <?php
                } 
                
                ?>
                <!--
									<option value="area manager - marketing">Area Manager - Marketing</option>
									<option value="assistant">Assistant</option>
									<option value="assistant area manager / area manager - marketing">Assistant Area Manager / Area Manager - Marketing</option>
									<option value="assistant manager / dy. manager">Assistant Manager / Dy. Manager</option>
									<option value="assitant">Assitant</option>
									<option value="asst.manager / manager - marketing">Asst.Manager / Manager - Marketing</option>
									<option value="brand executive">Brand Executive</option>
									<option value="brand manager">Brand Manager</option>
									<option value="civil engineer">Civil Engineer</option>
									<option value="computer operator">Computer Operator</option>
									<option value="draftsman">Draftsman</option>
									<option value="engineer - production">Engineer - Production</option>
									<option value="engineer - qc">Engineer - QC</option>
									<option value="executive">Executive</option>
									<option value="executive - ppmc">Executive - PPMC</option>
									<option value="jr executive">Jr Executive</option>
									<option value="packaging development &amp; qc">Packaging Development &amp; QC</option>
									<option value="quality control - supervisor">Quality Control - Supervisor</option>
									<option value="regional manager/ sr. regional manager/ area manager/ sr. area manager">Regional Manager/ Sr. Regional Manager/ Area Manager/ Sr. Area Manager</option>
									<option value="sap fico consultant">SAP FICO Consultant</option>
									<option value="sr. assistant">Sr. Assistant</option>
									<option value="sr. exe/ executive - marketing">Sr. Exe/ Executive - Marketing</option>
									<option value="sr. executive - ppmc">Sr. Executive - PPMC</option>
									<option value="sr. executive / executive">Sr. Executive / Executive</option>
									<option value="supervisor">Supervisor</option>
									<option value="supervisor/ jr.supervisor qc">Supervisor/ Jr.Supervisor QC</option>
									<option value="trainee executive">Trainee Executive</option>-->
              </select>
            </div>

            <div class="col-md-3 col-sm-6 col-12  mb-2">
              <select name="department" id="department" class="form-select selectState rounded-0">
                <option value="">Department </option>
				<?php
                $myterms = get_terms('department', 'orderby=none&hide_empty');    
                
                foreach ($myterms as $term) { ?>
                
                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                
                <?php
                } 
                
                ?>			
								<!--
								<option value="marketing (projects)">Marketing (Projects)</option>
									<option value="marketing (conduit)">Marketing (Conduit)</option>
									<option value="depot">Depot</option>
									<option value="marketing (faucets and sanitaryware)">Marketing (Faucets and Sanitaryware)</option>
									<option value="f&amp;a">F&amp;A</option>
									<option value="project-cp">Project-CP</option>
									<option value="marcom">Marcom</option>
									<option value="marketing (infra)">Marketing (Infra)</option>
									<option value="credit control">Credit Control</option>
									<option value="marketing (ipd)">Marketing (IPD)</option>
									<option value="it">IT</option>
									<option value="production ">Production </option>
									<option value="logistics ">Logistics </option>
									<option value="stores ">Stores </option>
									<option value="marketing (plumbing)">Marketing (Plumbing)</option>
									<option value="fauctes &amp; sanitary">Fauctes &amp; Sanitary</option>
									<option value="blow moulding - tank ">Blow Moulding - Tank </option>
									<option value="blow moulding -tank">Blow Moulding -Tank</option>
									<option value="extrusion ">Extrusion </option>
									<option value="quality control ">Quality Control </option>
									<option value="injection moulding ">Injection Moulding </option>
									<option value="marketing (column)">Marketing (Column)</option>
									<option value="marketing (rural)">Marketing (Rural)</option>
									<option value="faucet &amp; sanitary ware">Faucet &amp; Sanitary Ware</option>
									<option value="production &amp; qc,qa ">Production &amp; QC,QA </option>
									<option value="quality control- faucet">Quality Control- Faucet</option>
									<option value="quality control-sanitaryware">Quality Control-Sanitaryware</option>-->
              </select>
            </div>

            <div class="col-md-3 col-sm-6 col-12  mb-2">
              <select name="experience" id="experience" class="form-select selectState rounded-0">
                <option value="">Experience</option>
                <?php
                $myterms = get_terms('experience', 'orderby=none&hide_empty');    
                
                foreach ($myterms as $term) { ?>
                
                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                
                <?php
                } 
                
                ?>	
                <!--
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>-->
              </select>
              
             
                 
              
            </div>

            
          </form>



          

      <?php
$args = array(
    'post_type' => 'careerlisting', // set the post type to page
);
$query = new WP_Query($args);
if ($query->have_posts()) {
    ?>
<div id="list-of-posts">
    <?php
    while ($query->have_posts()) {
        $query->the_post();
        $count++;
        
        
        global $post;
    $post_slug = $post->post_name;
        
       ?>
          <?php 

$i = 1;

foreach( get_cfc_meta( 'currentopening' ) as $key => $value ){ ?> 
       
       <div class="cpBox p-4 mb-5">

              <div class="row mb-3">
                  <div class="col"><div class="jobTitle"><?php the_title();?></div></div>
                  <div class="col-md-auto d-flex align-items-center">
                      <ul class="jobType">
                        <li><?php the_cfc_field( 'currentopening','time', false, $key ); ?></li>
                        <li><?php the_cfc_field( 'currentopening','location', false, $key ); ?></li>
                      </ul>
                  </div>
              </div>

              <p><strong>Skills :</strong></p>
              <?php the_cfc_field( 'currentopening','skill', false, $key ); ?>

              <p><strong>Qualifications :</strong></p>
              <div class="qulification mb-3"><?php the_cfc_field( 'currentopening','qualifications', false, $key ); ?></div>


              <p><strong>Experience Required :</strong></p>
              <div class="experience mb-3"><?php the_cfc_field( 'currentopening','experience-required', false, $key ); ?></div>

              <a href="https://astralbathware.com/apply-form/?data=<?php the_title(); ?>" class="ctaBtn blackBtn py-1">Apply</a>
             

          </div>
         <!-- apply form -->

<?php 

$i++;

}  ?>    
          
       <?php
    }
}
wp_reset_postdata();
?>   
 </div>
            
        </div>
        <div class="col-lg-3 order-lg-first">

          <div class="d-lg-none mb-3 pt-3 border-top border-secondary"><strong>Related Links -</strong></div>
          
          <ul class="sideNavig">
            <li><a href="https://astralbathware.com/careers/workplace/">Workplace</a></li>
            <li class="active"><a href="https://astralbathware.com/careers/current-opening/">Current Openings</a></li>
          </ul>
          
        </div>
      </div>
    </div>

  </section>


</div>

  
    
 
   <?php
get_footer();
?>