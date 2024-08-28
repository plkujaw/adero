<?php

/**
 * Custom posts for use with this theme
 *
 *
 */
// Register Custom Post Type
function register_post_types()
{

  $person_labels = array(
    'name'                  => 'Team Members',
    'singular_name'         => 'Team Member',
    'menu_name'             => 'Team Members',
    'name_admin_bar'        => 'Team Members',
    'archives'              => 'Team Members',
    'attributes'            => 'Team Member Attributes',
    'parent_item_colon'     => '',
    'all_items'             => 'All Team Members',
    'add_new_item'          => 'Add New Team Member',
    'add_new'               => 'Add New Team Member',
    'new_item'              => 'New Team Member',
    'edit_item'             => 'Edit Team Member',
    'update_item'           => 'Update Team Member',
    'view_item'             => 'View Team Member',
    'view_items'            => 'View Team Members',
    'search_items'          => 'Search Team Members',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into Team Member',
    'uploaded_to_this_item' => 'Uploaded to this Team Member',
    'items_list'            => 'Team Members list',
    'items_list_navigation' => 'Team Members list navigation',
    'filter_items_list'     => 'Filter Team Members list',
  );

  $person_args = array(
    'label'                 => 'Team Member',
    'description'           => 'Team Member',
    'labels'                => $person_labels,
    'supports'              => array('title', 'thumbnail', 'editor'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 21,
    'menu_icon'             => 'dashicons-admin-users',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
    'rewrite'               => array(
      'slug' => 'our-team',
    )
  );

  $location_labels = array(
    'name'                  => 'Locations',
    'singular_name'         => 'Location',
    'menu_name'             => 'Locations',
    'name_admin_bar'        => 'Locations',
    'archives'              => 'Locations',
    'attributes'            => 'Location Attributes',
    'parent_item_colon'     => '',
    'all_items'             => 'All Locations',
    'add_new_item'          => 'Add New Location',
    'add_new'               => 'Add New',
    'new_item'              => 'New Location',
    'edit_item'             => 'Edit Location',
    'update_item'           => 'Update Location',
    'view_item'             => 'View Location',
    'view_items'            => 'View Locations',
    'search_items'          => 'Search Locations',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into Location',
    'uploaded_to_this_item' => 'Uploaded to this Location',
    'items_list'            => 'Locations list',
    'items_list_navigation' => 'Locations list navigation',
    'filter_items_list'     => 'Filter Locations list',
  );

  $location_args = array(
    'label'                 => 'Location',
    'description'           => 'Location',
    'labels'                => $location_labels,
    'supports'              => array('title','editor'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 21,
    'menu_icon'             => 'dashicons-location',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
  );

  register_post_type('person', $person_args);
  register_post_type('location', $location_args);
}
add_action('init', 'register_post_types', 0);

