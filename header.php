<?php
/** HEADER  */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,width=device-width">
  <meta http-equiv="X-UA-Compatible" content="IE=8" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="icon" href="/wp-content/themes/nea_v2/images/favicon.ico" type="image/x-icon" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/wow.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/nea-child.js"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="site-wrapper" class="site-wrapper">
  <div class="main-nav-mobile popup">
      <div class="close-mobile-menu"><div class="x"></div></div>
      <?php wp_nav_menu( array('menu' => 'Header Menu', 'menu_class'=> 'sf-menu-mobile',  'theme_location' => 'main_menu' ) ); ?>
  </div>
  <div id="site-container" class="container-wrapper">
      <div class="clear"></div>
      <div class="row" id="site-top-bar">
        <div class="small-12 large-6 columns">
            <a href="/"><img id="logo" src="<?php echo get_stylesheet_directory_uri();?>/images/icon/nea-logo-primary.svg"></a>
            <a class="mobile" id="logo-mobile" href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/nea-logo-primary-mobile.svg"></a>
            <a href="#" class="mobile" id="mobile-menu-icon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/menu-icon.svg">
        </div>
        <div class="small-12 large-6 columns">
            <div id="social-icons" class="small-12 large-12">
                <a href="https://www.youtube.com/c/nationaleczema" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/youtube.svg"></a>
                <a href="https://www.facebook.com/nationaleczema" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/facebook.svg"></a>
                <a href="https://twitter.com/nationaleczema" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/twitter.svg"></a>
                <a href="https://www.inspire.com/groups/national-eczema-association/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/images/home/support-forum-header.png"></a>
                <a href="#" id="search-toggle"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/search.svg"></a>
              <?php get_search_form(); ?>
            </div>
            <div id="sign-up" class="small-12 large-12 columns">
                <p>Get the tools and support you need to best manage your eczema</p>
                <div id="header-email-capture">
                    <!-- form below for live site only -->
                    <?php gravity_form(44, false, false, false, '', true, 200); ?>
                </div>
                <!-- form below for dev server only -->
                <!-- <div id="header-email-capture">
                    <?php gravity_form(3, false, false, false, '', true, 200); ?>
                </div> -->
                <!-- form below for local dev only, make sure form numbers match -->
                <!-- <div id="header-email-capture">
                    <?php gravity_form(5, false, false, false, '', true, 200); ?>
                </div> -->
            </div>
        </div>
    </div>
    <header class="site-header" role="banner">
        <div class="header-wrapper">
            <div class="grid">
                    <div class="col-3-4 left">
                        <div class="main-nav-desktop">
                            <?php wp_nav_menu( array('menu' => 'Header Menu', 'menu_class'=> 'sf-menu',  'theme_location' => 'main_menu' ) ); ?>
                        </div>
                        <div class="main-nav-mobile">
                        </div>
					</div>
                </div>
            </div>
	</header><!-- #masthead -->
