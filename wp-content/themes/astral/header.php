<!doctype html>
<html lang="en">
  <head>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/wp_additional.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/aboutus.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mangesh.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/catalouges.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mediacentre.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/include/woocss/dev_style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/include/woocss/woo-responsive.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/include/woocss/woo-style.css">
     <link href="https://fonts.cdnfonts.com/css/wishlist-2009" rel="stylesheet">
 <?php
 
 if(is_category()) {
    $categories = get_the_category();
    $category_id = $categories[0]->term_id;
    echo '<link rel="canonicalsss" href="' .  get_category_link($category_id) . '" />';
}
 
 
 ?>   
    <?php wp_head(); ?>
  <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TJ6H7C9');</script>
    <!-- End Google Tag Manager -->
  </head>
  <body <?php body_class('bodyWrapper'); ?>>
   <div id="preloader" class="vh-100">
     <div class="d-flex justify-content-center h-100">
        <div id="status" class="m-auto">
            <div><img src="https://astralbathware.com/wp-content/uploads/2022/11/loader_white.gif"><span></span> </div>    
        </div>
    </div>
  </div>
  
  <div class="sideBar">
      <a target="_blank" href="https://astralbathware.com/wp-content/uploads/2022/12/Bathware-Brochure-Single-Page-9-Dec.pdf" ><i class="bi bi-file-earmark-pdf"></i> <span>Download Catalogue</span>  </a>
        <a href="tel:+918511781111"><i class="bi bi-telephone"></i><span>Toll Free</span>  </a>
        <a href="https://wa.me/+91 85117 81111"><i class="bi bi-whatsapp"></i><span>Let's Chat!</span>  </a>
    </div>
  <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ6H7C9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="pageHeader">
      <div class="container">
        <div class="row g-lg-0 position-relative justify-content-between">
          <div class="col-lg col-auto text-center">
            <a href="<?php echo get_bloginfo('siteurl'); ?>" class="d-block">
            <?php 
                $imageLogo = get_field('header_logo', 'option');
                if( !empty( $imageLogo ) ): ?>
                  <img src="<?php echo esc_url($imageLogo['url']); ?>" title="<?php echo esc_attr($imageLogo['alt']); ?>" class="siteLogo" width="460" height="90">
                <?php endif; ?>
            </a>
            <?php
                // if ( function_exists( 'the_custom_logo' ) ) {
                //    the_custom_logo();
                //  }
        	?>
          </div>
          <div class="col-auto align-self-center d-lg-none">
            <button class="menuBtn"><span></span><span></span><span></span><span></span></button>
          </div>
          <div class="col-lg-auto col-12 px-lg-0 d-lg-block navigHolder">
          <button class="menuBtn menucloseBtn">&times;</button>
            <ul class="menuList d-lg-flex justify-content-between align-items-center">
                <li>
                <!--<a href="#">SanitaryWare</a>-->
                <?php 
                    $slink = get_field('menu_item_name_1','option');
                        if( $slink ): 
                            $slink_url = $slink['url'];
                            $slink_title = $slink['title'];
                            $slink_target = $slink['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $slink_url ); ?>"><?php echo esc_html( $slink_title ); ?></a>
                   <?php endif; ?>
                <div class="subMenuContainer px-lg-4">
                <div class="container ">
                <div class="row">                          
                    <div class="col-lg pe-lg-5">
                     <ul class="subMenuLinks row">
                     <?php 
                      $rows = get_field('sanitaryware_sub_categories', 'option');
                        $right_side = get_field('right_side_image', 'option');
                        if( $rows ) { 
                        foreach( $rows as $row ) {
                        $termURl = $row['category_url'];
                        ?>
                          <li class="col-lg-4"><a href="<?php echo $termURl; ?>" class="menuHead"><?php echo ($row['category_name'] );?></a>
                             <ul class="subMenuLinks2">
                                <?php 
                                    $terms = $row['sub_category'];
                                    if( $terms ): foreach( $terms as $term ): 
                                        $termName = $term->name;
                                        $term_link = get_term_link( $term );
                                    ?>
                                       <li><a href="<?php echo $term_link; ?>"><?php echo $termName; ?></a></li>
                                    <?php endforeach; endif; ?> 
                            </ul>
                          </li>
                        <?php } } ?>
                    </ul>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="menuPic">
                        <img src="<?php echo $right_side; ?>">
                        <div class="menupicLink text-center text-white">
                        <?php 
                        $link = get_field('cta_link', 'option');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="ctaBtn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </li>
        <li><?php 
        $link_2 = get_field('menu_item_name_2','option');
            if( $link_2 ): 
                $slink_url = $link_2['url'];
                $slink_title = $link_2['title'];
                $slink_target = $link_2['target'] ? $link['target'] : '_self';
            ?>
        <a href="<?php echo esc_url( $slink_url ); ?>"><?php echo esc_html( $slink_title ); ?></a>
       <?php endif; ?>
                <div class="subMenuContainer px-lg-4">
                <div class="container ">
                <div class="row">                          
                    <div class="col-lg pe-lg-5">
                     <ul class="subMenuLinks row">
                     <?php 
                      $rows = get_field('faucets_sub_categories', 'option');
                        $right_side_img = get_field('faucets_category_image', 'option');
                        if( $rows ) { 
                        foreach( $rows as $row ) {
                        ?>
                          <li class="col-lg-4">
                             <ul class="">
                                <?php 
                                    $terms = $row['sub_category'];
                                    if( $terms ): foreach( $terms as $term ): 
                                        $termName = $term->name;
                                        $term_link = get_term_link( $term );
                                    ?>
                                       <li><a href="<?php echo $term_link; ?>"><?php echo $termName; ?></a></li>
                                    <?php endforeach; endif; ?> 
                            </ul>
                          </li>
                        <?php } } ?>
                    </ul>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="menuPic">
                        <img src="<?php echo $right_side_img; ?>">
                        <div class="menupicLink text-center text-white">
                        <?php 
                        $flink = get_field('faucets_cta_link', 'option');
                        if( $flink ): 
                        $flink_url = $flink['url'];
                        $flink_title = $flink['title'];
                        $flink_target = $flink['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="ctaBtn" href="<?php echo esc_url( $flink_url ); ?>" target="<?php echo esc_attr( $flink_target ); ?>">
                        <?php echo esc_html( $flink_title ); ?></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </li>
        <li>
        <?php 
        $link_3 = get_field('menu_item_name_3','option');
            if( $link_3 ): 
                $slink_url = $link_3['url'];
                $slink_title = $link_3['title'];
                $slink_target = $link_3['target'] ? $link['target'] : '_self';
            ?>
        <a href="<?php echo esc_url( $slink_url ); ?>"><?php echo esc_html( $slink_title ); ?></a>
       <?php endif; ?></li>
       <li>
        <?php 
        $link_4 = get_field('menu_item_name_4','option');
            if( $link_4 ): 
                $slink_url = $link_4['url'];
                $slink_title = $link_4['title'];
                $slink_target = $link_4['target'] ? $link['target'] : '_self';
            ?>
        <a href="<?php echo esc_url( $slink_url ); ?>"><?php echo esc_html( $slink_title ); ?></a>
       <?php endif; ?></li>
       <li>
        <?php 
        $link_5 = get_field('menu_item_name_5','option');
            if( $link_5 ): 
                $slink_url = $link_5['url'];
                $slink_title = $link_5['title'];
                $slink_target = $link_5['target'] ? $link['target'] : '_self';
            ?>
        <a href="<?php echo esc_url( $slink_url ); ?>"><?php echo esc_html( $slink_title ); ?></a>
       <?php endif; ?></li>
       <li>
        <?php 
        $link_6 = get_field('menu_item_name_6','option');
            if( $link_6 ): 
                $slink_url = $link_6['url'];
                $slink_title = $link_6['title'];
                $slink_target = $link_6['target'] ? $link['target'] : '_self';
            ?>
        <a href="<?php echo esc_url( $slink_url ); ?>"><?php echo esc_html( $slink_title ); ?></a>
       <?php endif; ?></li>
    </ul>
    </div>
       <?php
		// wp_nav_menu(
		//  array(
        // 'menu' => 'primary-menu',
        // 'container' => '',
        // 	'items_wrap' => '<ul class="menuList d-lg-flex justify-content-between align-items-center"> %3$s</ul>'
		//     )
		// );
		?>  
          <div class="searchBox"><button class="search_btn search"></button></div>
           <div class="wishBox">
           <a href="https://astralbathware.com/cart/"> <i class="fa fa-heart-o" style="color: #fff;
    font-size: 20px;
}"></i></a>
<div id="mini-cart-count-two"><div id="mini-cart-count"></div>
</div>
        </div>
      </div>
    </header>