<?php

// Template Name: Contact

get_header();
$top_banner_title_row_1 = get_field('top_banner_title_row_1');
$top_banner_title_row_2 = get_field('top_banner_title_row_2');
$top_banner_intro = get_field('top_banner_intro_copy');
$form = get_field('form_shortcode');
$main_email = get_field('main_email_address', 'option');
$main_phone = get_field('main_phone_number', 'option');
$additional_phone = get_field('additional_phone_number', 'option');
$careers_copy = get_field('careers_copy');
$careers_title = get_field('careers_title');
$vacancies = get_field('careers_vacancies');
?>
<section class="top-banner top-banner--contact">
  <div class="container">
    <div class="top-banner__inner">
      <div class="top-banner__copy js-anim js-slide-left">
        <div class="top-banner__title">
          <h1><span class="top-banner__title-row-1"><?php echo $top_banner_title_row_1; ?></span><br><span class="top-banner__title-row-2"><?php echo $top_banner_title_row_2; ?></span></h1>
        </div>
        <div class="top-banner__intro">
          <?php echo $top_banner_intro; ?>
        </div>
      </div>
      <div class="top-banner__form"><?php echo apply_shortcodes($form); ?>
      </div>
    </div>
  </div>
</section>

<section class="contact-main">
  <div class="container container--full">
    <div class="contact-main__inner">
      <div class="contact-details">
        <div class="container">
          <h2>Contact Info</h2>
          <ul>
            <li>P &nbsp;<?php echo $main_phone; ?></li>
            <li>F &nbsp;<?php echo $additional_phone; ?></li>
            <li><a href="mailto: <?php echo $main_email; ?>"><?php echo $main_email; ?></a></li>
          </ul>
        </div>
      </div>


      <div class="contact-locations">
        <div class="container">
          <h2>Locations</h2>
          <div class="locations__wrapper">
           
			<?php
			$featured_posts = get_field('_contact_locations');
			if( $featured_posts ): ?>
				<?php foreach( $featured_posts as $post ): 

					// Setup this post for WP functions (variable must be named $post).
					setup_postdata($post); ?>
					<div class="location">
						<h3><?php the_title(); ?></h3>
						<?php the_field('location_details'); ?>
					</div>
					<!-- /.location -->
				<?php endforeach; ?>
				<?php 
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contact-careers" id="careers">
  <div class="careers-dots hidden-mobile">
    <svg width="100%" height="100%">
      <defs>
        <pattern id="polka-dots--malachite" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
          <circle fill="#022d2c" cx="1" cy="1" r="1" opacity="0.6"></circle>
        </pattern>
      </defs>
      <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots--malachite)"></rect>
    </svg>
  </div>
  <div class="container">
    <div class="careers-inner">
      <div class="careers-text">
        <h2><?php echo $careers_title; ?></h2>
        <?php echo $careers_copy; ?>
      </div>
      <div class="careers-vacancies">
        <?php foreach ($vacancies as $vacancy) {
        ?>
          <div class="vacancy-wrapper">
            <a href="<?php echo esc_url($vacancy['position_link']); ?>" target="_blank" class="vacancy">
              <span class="position-title"><?php echo $vacancy['position_title']; ?></span><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.75 1C9.75 0.585787 9.41421 0.25 9 0.25L2.25 0.25C1.83579 0.25 1.5 0.585786 1.5 1C1.5 1.41421 1.83579 1.75 2.25 1.75H8.25V7.75C8.25 8.16421 8.58579 8.5 9 8.5C9.41421 8.5 9.75 8.16421 9.75 7.75L9.75 1ZM1.53033 9.53033L9.53033 1.53033L8.46967 0.46967L0.46967 8.46967L1.53033 9.53033Z" fill="#022D2C" />
              </svg>
              <br><span class="position-location"><?php echo $vacancy['position_location']; ?></span>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>


<?php get_footer();
