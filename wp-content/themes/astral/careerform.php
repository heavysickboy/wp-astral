<?php
//Template Name: career form
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
        <div class="container py-md-4 my-5 px-4 px-md-0 position-relative">
            <div class="row  justify-content-center">
            <div class="col-md-6 p-4"  style="border:2px solid #ddd; border-radius:10px">
            
            <?php 
            
            echo do_shortcode('[contact-form-7 id="206" title="Job Apply"]'); 
            ?>
            </div>
            </div>
        </div>
        
        
        
        
        
        
        
     </div>
    <?php
get_footer();
?>