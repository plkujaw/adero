<?php

/**
 * The template for displaying all single posts
 *
 */

get_header();

if (have_posts()) {
  the_post();

?>
 
<?php
}
get_footer();
