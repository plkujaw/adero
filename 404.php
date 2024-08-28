<?php

/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();

?>

<div class="container">
  <div class="page-404">
    <h1>404</h1>
    <h2>Page Not Found</h2>
    <p>We can't find the page you're looking for.</p>
    <a href="<?php echo site_url(); ?>" class="btn btn--dark btn--arrow-3">Go to Homepage<svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76256 28.5303 5.46967L23.7574 0.696699C23.4645 0.403806 22.9896 0.403806 22.6967 0.696699C22.4038 0.989593 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM0 6.75L28 6.75V5.25L0 5.25L0 6.75Z" fill="#022D2C" />
      </svg></a>
  </div>
</div>



<?php
get_footer();
