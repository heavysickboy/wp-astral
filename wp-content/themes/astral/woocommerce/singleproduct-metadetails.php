<?php
/**
 * Single Product Meta Details
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */
global $product;
?>
<div class="meta_details">
    <?php 
    $terms_range = get_the_terms( $post->ID, 'range' );
     if($terms_range) : ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Range </strong></div> 
        <?php
          foreach ($terms_range as $term_r) {
            $product_catr_name = $term_r->name; ?>
             <div class="col-7 col-sm-6 fs-15"><?php echo $product_catr_name; ?></div>
        <?php } ?>
    </div>
    <?php endif; ?>
    <?php 
    $terms = get_the_terms( $post->ID, 'collection' );
     if($terms) : ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Collection </strong></div> 
        <?php
          foreach ($terms as $term) {
            $product_cat_name = $term->name; ?>
             <div class="col-7 col-sm-6 fs-15"><?php echo $product_cat_name; ?></div>
        <?php } ?>
    </div>
    <?php endif; ?>
     <?php 
    $terms_fun = get_the_terms( $post->ID, 'pro_funtions' );
     if($terms_fun) : ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6  d-flex align-items-center"><strong class="fs-13">Function </strong></div> 
        <?php
          foreach ($terms_fun as $term_f) {
            $product_catf_name = $term_f->name; ?>
             <div class="col-7 col-sm-6 fs-15"><?php echo $product_catf_name; ?></div>
        <?php } ?>
    </div>
    <?php endif; ?>
    <?php $attr_terms = $product->get_attribute( 'colour' );  
        if($attr_terms) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Colour</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_terms;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_allied = $product->get_attribute( 'allied-products' );  
        if($attr_allied) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Allied Products</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_allied;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_basin = $product->get_attribute( 'basin-area' );  
        if($attr_basin) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Basin Area</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_basin;?></div>
    </div>
    <?php endif; ?>
    
     <?php $attr_coneald = $product->get_attribute( 'coneald-parts' );  
        if($attr_coneald) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Coneald Parts</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_coneald;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_kitchen = $product->get_attribute( 'kitchen-area' );  
        if($attr_kitchen) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Kitchen Area</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_kitchen;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_distance = $product->get_attribute( 'wall-distance' );  
        if($attr_distance) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Wall Distance</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_distance;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_trap = $product->get_attribute( 'trap-type' );  
        if($attr_trap) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Trap Type</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_trap;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_size = $product->get_attribute( 'size-length' );  
        if($attr_size) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Size (Length)</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_size;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_flush = $product->get_attribute( 'flush' );  
        if($attr_flush) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Flush</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_flush;?></div>
    </div>
    <?php endif; ?>
    
    <?php $attr_seatcover = $product->get_attribute( 'seat-cover' );  
        if($attr_seatcover) :
     ?>
    <div class="row py-0">
        <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Seat Cover</strong></div> 
        <div class="col-7 col-sm-6 fs-15"><?php echo $attr_seatcover;?></div>
    </div>
    <?php endif; ?>
    
    <div class="row py-0">
      <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">SKU Code </strong></div> 
      <div class="col-7 col-sm-6 fs-15">
       <?php 
    //this return sku (custom field on a wordpress post)
        $sku = $product->get_sku();
          echo $sku;
        ?>
      </div>
    </div>
     <?php
    	$variable_details = get_field('variable_details');
    	$productcode = $variable_details['conceald_product_code'];
	   if( $productcode): ?>
        <div class="row py-0">
          <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Concealed Body SKU Code </strong></div> 
          <div class="col-7 col-sm-6 fs-15">
           <?php echo $productcode; ?>
          </div>
        </div>
    <?php endif;?>
    <?php
    	$concealed_part_mrp = get_field('variable_details');
    	$partmrp = $concealed_part_mrp['concealed_part_mrp'];
	   if( $partmrp): ?>
        <div class="row py-0">
          <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Concealed Body MRP</strong></div> 
          <div class="col-7 col-sm-6 fs-15">
           <?php echo $partmrp; ?>
          </div>
            </div>
        <?php endif;?>
     <?php
    	$upper_part_mrp = get_field('variable_details');
    	$uppermrp = $upper_part_mrp['upper_part_mrp'];
	   if($uppermrp): ?>
            <div class="row py-0">
              <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Exposed Part MRP </strong></div> 
              <div class="col-7 col-sm-6 fs-15">
               <?php echo $uppermrp; ?>
              </div>
            </div>
        <?php endif;?>
         <?php
    	$cistern_sku_code = get_field('variable_details');
        $cistern_sku = $cistern_sku_code['cistern_sku_code'];
	     if($cistern_sku): ?>
            <div class="row py-0">
              <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Cistern SKU Code </strong></div> 
              <div class="col-7 col-sm-6 fs-15">
               <?php echo $cistern_sku; ?>
              </div>
            </div>
        <?php endif;?>
        
        <?php
    	$cistern_mrp = get_field('variable_details');
        $cistern_mr = $cistern_mrp['cistern_mrp'];
	     if($cistern_mr): ?>
            <div class="row py-0">
              <div class="col-5 col-sm-6 d-flex align-items-center"><strong class="fs-13">Cistern MRP </strong></div> 
              <div class="col-7 col-sm-6 fs-15">
               <?php echo $cistern_mr; ?>
              </div>
            </div>
        <?php endif;?>
    
     <div class="row py-0">
      <div class="col-5 col-sm-6  d-flex align-items-center"><strong class="fs-13">MRP </strong></div> 
      <div class="col-7 col-sm-6 fs-15"><?php echo $product->get_price_html(); ?></div>
    </div>
</div>