<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and start of the <body> section
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=5.0 user-scalable=1">

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WSDXCT6');</script>
  <!-- End Google Tag Manager -->

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSDXCT6"
  height="0" width="0" style=“display:none;visibility:hidden”></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php get_template_part('inc/template-parts/mobile-menu'); ?>
  <header class="header">
    <div class="container">
      <div class="header__row">
        <div class="header__logo">
          <a href="<?php echo esc_url(site_url()); ?>">
            <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo-full.svg')); ?>">
          </a>
        </div>
        <div class="header__nav">
          <?php get_template_part('inc/template-parts/main-nav'); ?>
        </div>
        <div class="header__login">
          <button class="btn btn--dark login-btn js-login-btn">Client Login<svg width='13' height='9' viewBox='0 0 13 9' fill='none' xmlns='http://www.w3.org/2000/svg'>
              <path d='M1 1L6.5 7L12 1' stroke='#F4F0EF' stroke-width='1.5' />
            </svg>
          </button>
          <div class="login-links">
            <div class="login-links-inner">
              <?php get_template_part('inc/template-parts/client-login-link'); ?>
            </div>
          </div>
        </div>
        <div class="header__menu">
          <button class="burger js-mobile-menu-trigger" type="button" aria-expanded="false">
            <span class="screen-reader-text">Open menu</span>
            <span class="burger__line burger__line--1"></span>
            <span class="burger__line burger__line--2"></span>
          </button>
        </div>
      </div>
    </div>
  </header>
  <main>