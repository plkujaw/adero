<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Adero
 * @since Adero 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function theme_body_classes($classes)
{
  // Adds a class of group-blog to blogs with more than 1 published author.
  if (is_multi_author()) {
    $classes[] = 'group-blog';
  }

  // Adds a class of hfeed to non-singular pages.
  if (!is_singular()) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter('body_class', 'theme_body_classes');


// Custom login page
add_action('login_enqueue_scripts', 'custom_login_page');

function custom_login_page()
{ ?>
  <style type="text/css">
    @import url(<?php echo get_template_directory_uri() . '/assets/fonts/Epilogue.woff2'; ?>);

    body.login label,
    body.login a {
      font-family: 'Epilogue', sans-serif;
    }

    body.login input {
      border-color: #022d2c;
      outline: #022d2c;
      font-size: 14px !important;
    }

    body.login input:focus {
      border-color: #022d2c;
      box-shadow: none !important;
      outline: 1px solid #022d2c;
    }

    body.login div#login form#loginform p.submit input#wp-submit {
      background: #fff;
      border-color: #022d2c;
      border-radius: 24px;
      color: #022d2c;
      transition: all 0.3s ease-in-out;

    }

    body.login div#login form#loginform p.submit input#wp-submit:hover {
      background: #022d2c;
      color: #fff;
    }

    body.login div#login form#loginform {
      background: #fff;
    }

    body.login #login_error {
      background-color: #fff;
      border-left-color: #f6921e;
      font-family: 'Epilogue', sans-serif;

    }

    body.login .message {
      border-left: 4px solid #f6921e;
      font-family: 'Epilogue', sans-serif;

    }

    body.login div#login h1 a {
      background-image: url(<?php echo get_template_directory_uri() . '/assets/img/logo-full.svg'; ?>);
      background-repeat: no-repeat;
      background-size: contain;
      height: 60px;
      margin-bottom: 0;
      width: 250px;
    }

    body.login a {
      color: #f4f0ef !important;
    }

    body.login a:hover {
      text-decoration: underline !important;
    }

    body.login div#login p#backtoblog {
      display: none;
    }

    body.login {
      background-color: #022d2c;
    }
  </style>
<?php }



// Custom login header link

add_filter('login_headerurl', 'custom_loginlogo_url');

function custom_loginlogo_url($url)
{
  return home_url();
}

/**
 *  Hide dashboard options for not site_admin users
 */

if ($current_user->user_login != 'site_admin') {
  add_action('admin_menu', 'remove_menus');
  add_action('admin_init', 'remove_theme_customisation');
  add_filter('acf/settings/show_admin', '__return_false'); // hides ACF menu
  add_action('admin_head', 'hide_live_preview');
  add_action('admin_head', 'hide_menu_location_settings');
}

function remove_menus()
{
  global $submenu;
  unset($submenu['themes.php'][5]); // disables theme change option
  define('DISALLOW_FILE_EDIT', true); // disables theme editor
  define('DISALLOW_FILE_MODS', false); // disables plugin install/update
}


function remove_theme_customisation()
{
  global $submenu;
  foreach ($submenu as $name => $items) {
    if ($name === 'themes.php') {
      foreach ($items as $i => $data) {
        if (in_array('customize', $data, true)) {
          unset($submenu[$name][$i]);
          return;
        }
      }
    }
  }
}

/**
 * Hide 'Manage with Live Preview'
 */

function hide_live_preview()
{
  echo '<style>
          .hide-if-no-customize {
            display: none;
          }
        </style>';
}

function hide_menu_location_settings()
{
  echo '<style>
          .nav-tab-wrapper .nav-tab:last-child {
            display: none;
          }
          .menu-theme-locations {
            display: none;
        </style>';
}

// remove core gutenberg block but retain modern 'look'
add_filter('allowed_block_types', 'theme_blocks');

function theme_blocks()
{

  return  array();
}

// hide facetwp select counts
add_filter('facetwp_facet_dropdown_show_counts', '__return_false');


// Add Our Team page settings under Team Members
function our_team_page()
{
  if (function_exists('acf_add_options_page')) {
    acf_add_options_sub_page(array(
      'page_title'      => 'Our Team Page',
      'parent_slug'     => 'edit.php?post_type=person',
      'capability' => 'manage_options',
      'position' => 1,
    ));
  }
}

add_action('init', 'our_team_page');

function adjust_queries($query)
{
  if (!is_admin() and is_post_type_archive('person') and $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
  if (!is_admin() and is_post_type_archive('person') and $query->is_main_query() and wp_is_mobile()) {
    $query->set('posts_per_page', get_field('posts_per_page_mobile', 'option'));
  }
}

add_action('pre_get_posts', 'adjust_queries');

//ADDING AN ACTIVE CLASS TO THE CUSTOM POST-TYPE MENU ITEM WHEN VISITING ITS SINGLE POST PAGES
function custom_active_item_classes($classes = array(), $menu_item)
{
  global $post;

  $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item active' : '';
  return $classes;
}
add_filter('nav_menu_css_class', 'custom_active_item_classes', 10, 2);
