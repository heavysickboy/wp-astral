<?php
/*======================================================       
			Code for dynamic menu
========================================================*/
function register_menu(){
	register_nav_menus(
	array(
		'primary-menu' => 'Primary Menu',
		'left-menu' => 'Left Menu',
		'right-menu' => 'Right Menu',
		'footer-menu' => 'Footer Menu'
	)
	);
}
add_action("init", "register_menu");
add_theme_support( 'title-tag' );
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

/*
Enable logo in theme
========================================================*/
function times_logo_setup() 
	{$defaults = array(
		'flex-height' => true,
		'flex-width'  => true,	 
		'header-text' => array( 'site-title', 'site-description' ),	 );	 
add_theme_support( 'custom-logo', $defaults );	}
add_action( 'after_setup_theme', 'times_logo_setup' );

/*====================================================== */

/*==================================
      Include custom function File
//==================================*/
require get_template_directory(). '/include/woo-function.php';


function addCustomernow() {
       
    
$filterValue = esc_sql( $_POST );
$location=$filterValue['location'];
$jobrole=$filterValue['jobrole'];
$department=$filterValue['department'];
$experience=$filterValue['experience'];
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; 
$query = new WP_Query( array(

    'post_type'             => 'careerlisting',
    'posts_per_page'        => -1,
    'paged' => $paged,
    'orderby'               => 'rand',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'location',
            'field'    => 'id',
            'terms'    => $location,
            'operator' => 'AND',
        ),
        array(
            'taxonomy' => 'jobrole',
            'field'    => 'id',
            'terms'    => $jobrole,
            'operator' => 'AND',
        ),
        array(
            'taxonomy' => 'department',
            'field'    => 'id',
            'terms'    => $department,
            'operator' => 'AND',
        ),
        array(
            'taxonomy' => 'experience',
            'field'    => 'id',
            'terms'    => $experience,
            'operator' => 'AND',
        ),
        
    ),

));

    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post();
            
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

              <a href="https://kwebmakerdigitalagency.com/astral/apply-form/?data=<?php the_title(); ?>" class="ctaBtn blackBtn py-1">Apply</a>
             

          </div>
         <!-- apply form -->

<?php 

$i++;

}  ?>    
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;

    

wp_die();  
     
}
add_action('wp_ajax_addCustomernow', 'addCustomernow');
add_action('wp_ajax_nopriv_addCustomernow', 'addCustomernow');
?>
<?php
add_filter( 'wpcf7_form_elements', function( $form ) {
  $form = str_replace( 'Designation', $_GET['data'], $form );
  return $form;
} );

/*==================================
   Include class-wp-bootstrap-navwalker php File
//==================================*/
  if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}