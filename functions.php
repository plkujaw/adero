<?php

/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adero
 * @since Adero 1.0
 */


if (!function_exists('theme_style')) :

  function theme_style()
  {
    wp_enqueue_style(
      'scrollbar',
      'https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/css/OverlayScrollbars.min.css',
      null,
      null,
    );
    wp_enqueue_style(
      'theme-style',
      get_stylesheet_directory_uri() . '/assets/dist/css/main.min.css',
      array(),
      filemtime(get_stylesheet_directory() . '/assets/dist/css/main.min.css'),
    );
    wp_enqueue_style('theme-style');
  }

endif;

if (!function_exists('theme_scripts')) :

  function theme_scripts()
  {
    wp_enqueue_script(
      'lottie',
      'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie_light.min.js',
      null,
      null,
      true
    );

    wp_enqueue_script(
      'scrollbar',
      'https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/js/OverlayScrollbars.min.js',
      null,
      null,
      true
    );

    wp_enqueue_script(
      'swiperJS',
      'https://unpkg.com/swiper@8/swiper-bundle.min.js',
      null,
      null,
      true
    );

    wp_enqueue_script(
      'rellax',
      get_stylesheet_directory_uri() . '/assets/src/js/vendor/rellax.min.js',
      null,
      null,
      true
    );

    wp_enqueue_script(
      'theme-script',
      get_stylesheet_directory_uri() . '/assets/dist/js/main.min.js',
      array(),
      filemtime(get_stylesheet_directory() . '/assets/dist/js/main.min.js'),
      true
    );
  }

endif;

add_action('wp_enqueue_scripts', 'theme_style');
add_action('wp_enqueue_scripts', 'theme_scripts');


if (!function_exists('theme_support')) :

  function theme_support()
  {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(
      array(
        'main_nav' => __('Header Menu'),
        'footer_nav' => __('Footer Menu')
      )
    );
    // Register Image sizes
    add_image_size('icon', 60); // 60 pixels wide (and unlimited height)
    add_image_size('entry', 800); // 800 pixels wide (and unlimited height)
    add_image_size('entry-large', 1250); // 1250 pixels wide (and unlimited height)
    add_image_size('entry-small', 400); // 400 pixels wide (and unlimited height)
    add_image_size('hero', 2000); // 2000 pixels wide (and unlimited height)


    if (function_exists('acf_add_options_page')) {
      acf_add_options_page(array(
        'page_title'   => 'Website Settings',
        'menu_title'  => 'Website Settings',
        'position' => 61,
      ));
    }
  }
endif;

add_action('after_setup_theme', 'theme_support');


if (!function_exists('theme_preload_webfonts')) :
  function theme_preload_webfonts()
  {
?>
    <link rel="preload" href="<?php echo esc_url(get_theme_file_uri('assets/fonts/Epilogue.woff2')); ?>" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo esc_url(get_theme_file_uri('assets/fonts/SteradianBold.woff2')); ?>" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo esc_url(get_theme_file_uri('assets/fonts/SteradianLight.woff2')); ?>" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo esc_url(get_theme_file_uri('assets/fonts/SteradianRegular.woff2')); ?>" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo esc_url(get_theme_file_uri('assets/fonts/SteradianThin.woff2')); ?>" as="font" type="font/woff2" crossorigin>
  <?php
  }

endif;

if (!function_exists('add_bugherd')) :
  function add_bugherd()
  {
  ?>
    <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=hx4cbi86wfxqzkybvsl6mw" async="true"></script>
  <?php
  }

endif;

add_action('wp_head', 'theme_preload_webfonts');
// add_action('wp_head', 'add_bugherd');

function theme_google_tag_manager()
{ ?>

  <!-- Google Tag Manager -->

  <!-- GTM SCRIPT CODE GOES HERE -->

  <!-- End Google Tag Manager -->

  <!-- Google Tag Manager (noscript) -->

  <!-- GTM NOSCRIPT CODE GOES HERE -->

  <!-- End Google Tag Manager (noscript) -->

<?php }

// add_action('wp_body_open', 'theme_google_tag_manager');



// Implement Additional files
//==========
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Custom Posts file
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Load Custom Taxonomies file
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Load Cleanup file
 */
require get_template_directory() . '/inc/wordpress-cleanup.php';
