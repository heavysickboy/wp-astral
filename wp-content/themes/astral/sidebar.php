<?php 
  if (is_active_sidebar( 'woocommerce-sidebar' ) ) : //check the sidebar if used.
   dynamic_sidebar( 'woocommerce-sidebar' );  // show the sidebar.
 endif;
?>