<?php
get_header();
$top_banner_title_row_1 = get_field('top_banner_title_row_1', 'option');
$top_banner_title_row_2 = get_field('top_banner_title_row_2', 'option');
$top_banner_intro = get_field('top_banner_intro_copy', 'option');
$top_banner_media = get_field('top_banner_media', 'option');
$intro_background_image = get_field('page_intro_background_image', 'option');
$intro_copy = get_field('page_intro_copy', 'option');
$section_title = get_field('our_team_section_title', 'option');
$partners_title = get_field('partners_title', 'option');
$partners_copy = get_field('partners_copy', 'option');
$partners_carousel_images = get_field('partners_carousel_images', 'option');
$partners_logos_1 = get_field('partners_logos_1', 'option');
$partners_logos_2 = get_field('partners_logos_2', 'option');
?>
<section class="top-banner top-banner--our-team">
  <div class="container">
    <div class="top-banner__inner">
      <div class="top-banner__copy js-slide-left">
        <div class="top-banner__title">
          <h1><span class="top-banner__title-row-1"><?php echo $top_banner_title_row_1; ?></span><br><span class="top-banner__title-row-2"><?php echo $top_banner_title_row_2; ?></span></h1>
        </div>
        <div class="top-banner__intro">
          <?php echo $top_banner_intro; ?>
        </div>
        <div class="top-banner__line">
        </div>
      </div>
      <div class="top-banner__media js-lottie-animation">
      </div>
    </div>
  </div>
</section>
<section class="page-intro">
  <div class="page-intro__bg">
    <?php echo wp_get_attachment_image($intro_background_image, 'hero'); ?>
    <div class="page-intro__bg-overlay"></div>
  </div>
  <div class="page-intro__dots hidden-mobile">
    <svg width="100%" height="100%">
      <defs>
        <pattern id="polka-dots--white" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
          <circle fill="#fff" cx="1" cy="1" r="1" opacity="0.6" />
        </pattern>
      </defs>
      <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots--white)" />
    </svg>
  </div>
  <div class="container page-intro__copy">
    <p class="js-anim js-rise-in"><?php echo $intro_copy; ?></p>
  </div>
</section>
<section class="team-members">
  <div class="container">
    <div class="archive-person">
      <div class="team-members__title">
        <h2><?php echo $section_title; ?></h2>
        <a href="<?php echo site_url('/contact-us#careers'); ?>" class="btn btn--gradient btn--arrow-3 hidden-mobile">Join Our Team<svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76256 28.5303 5.46967L23.7574 0.696699C23.4645 0.403806 22.9896 0.403806 22.6967 0.696699C22.4038 0.989593 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM0 6.75L28 6.75V5.25L0 5.25L0 6.75Z" fill="#022D2C" />
          </svg></a>
      </div>
      <div class="team-members__filters">
        <?php echo do_shortcode("[facetwp facet='department']"); ?>
        <?php echo do_shortcode("[facetwp facet='location']"); ?>
        <?php echo do_shortcode("[facetwp facet='team_search']"); ?>
      </div>
      <div class="team-members__selections">
      </div>
      <section class="team-members__list">
        <?php if (have_posts()) {
          // $spotlight_member = $posts[array_rand($posts, 1)];
          // $id = $spotlight_member->ID;
          // $name = $spotlight_member->post_title;
          // $position = get_field('person_position', $id);
          // $questionnaire = get_field('person_questionnaire', $id);
          // $questionnaire_item = rand(0, count($questionnaire) - 1);
        ?>
          <!-- <section class="team-members__spotlight js-anim js-slide-left">
            <a href="<?php echo get_permalink($id); ?>" class="spotlight-member">
              <div class="spotlight-member__info">
                <picture class="spotlight-member__image">
                  <?php echo get_the_post_thumbnail($id, 'entry'); ?>
                </picture>
                <div class="team-member-card__info">
                  <span>SPOTLIGHT</span>
                  <div class="spotlight-member__meta">
                    <h2><?php echo $name; ?></h2>
                    <h3><?php echo $position; ?></h3>
                  </div>
                </div>
              </div>
              <div class="spotlight-member__questionnaire">
                <h3><?php echo $questionnaire[$questionnaire_item]['questionnaire_question']; ?></h3>
                <p><?php echo $questionnaire[$questionnaire_item]['questionnaire_answer']; ?></p>
              </div>
            </a>
          </section> -->
          <?php while (have_posts()) {
            the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="team-member-card-wrapper">
              <div class="team-member-card js-anim js-fade-in">
                <picture class="team-member-card__image">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'entry-small'); ?>
                  <?php echo wp_get_attachment_image(
                    get_field('person_additional_image', get_the_ID()),
                    'entry-small',
                    '',
                    array(
                      'class' => 'team-member-card__image--additional hidden-mobile'
                    )
                  ); ?>
                </picture>
                <div class="team-member-card__info">
                  <h2><?php the_title(); ?><?php 
						$designation = get_field('person_designation', get_the_ID());
						if ($designation) {
							echo '<span>, ' . $designation . '</span>';
						}?></h2>

                  <h3><?php 

					$execPos = get_field('person_position_executive', get_the_ID());
					$personPos = get_field('person_position', get_the_ID());

					if ($execPos) {
						$words = explode(' ', $execPos);
						$acronym = '';
						foreach ($words as $word) {
							$acronym .= mb_substr($word, 0, 1);
						}
						echo $acronym;
					}
					if ($personPos && $execPos){
						echo ' | ';
					}
					echo $personPos;
					
				  ?></h3>
                </div>
              </div>
            </a>
          <?php } ?>
      </section>
    <?php } else { ?>
      <span class="no-results">No results found.</span>
    <?php }
    ?>
    </div>
    <div class="team-members__load-more">
      <?php echo do_shortcode("[facetwp facet='load_more']"); ?>
    </div>
    <div class="team-members__join hidden-desktop">
      <a href="<?php echo site_url('/contact-us#careers'); ?>" class="btn btn--gray btn--arrow-3">Join Our Team<svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76256 28.5303 5.46967L23.7574 0.696699C23.4645 0.403806 22.9896 0.403806 22.6967 0.696699C22.4038 0.989593 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM0 6.75L28 6.75V5.25L0 5.25L0 6.75Z" fill="#022D2C" />
        </svg></a>
    </div>
  </div>
</section>

<div style="background-color: #f4f0ef;">
  <section class="partners container container--full">
    <div class="partners__inner">
      <div class="partners__col partners__col--1">
        <div class="container">
          <div class="partners-copy js-slide-left">
            <h2><?php echo $partners_title; ?></h2>
            <p><?php echo $partners_copy; ?></p>
          </div>
          <div class="partners-logos">
            <?php foreach ($partners_logos_1 as $logo) echo
            "<div class='logo-wrapper'>" .
              wp_get_attachment_image($logo, 'entry-small') . "</div>"; ?>
          </div>
        </div>
      </div>
      <div class="partners__col partners__col--2">
        <div class="container">
          <div class="partners__carousel">
            <div class="carousel carousel--images">
              <picture class="swiper-wrapper">
                <?php foreach ($partners_carousel_images as $image) echo
                wp_get_attachment_image($image, 'entry', false, array('class' => 'swiper-slide')); ?>
              </picture>
              <div class="carousel__navigation">
                <button class="carousel__arrow carousel__arrow--prev"></button>
                <button class="carousel__arrow carousel__arrow--next"></button>
              </div>
            </div>
            <div class="carousel__pagination"></div>
          </div>
        </div>
      </div>
      <div class="link-block">
        <div class="container">
          <div class="link-block__inner">
            <a href="<?php echo site_url('/what-we-do'); ?>">What We Do <svg width="631" height="12" viewBox="0 0 631 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M630.53 6.53033C630.823 6.23744 630.823 5.76256 630.53 5.46967L625.757 0.696699C625.464 0.403806 624.99 0.403806 624.697 0.696699C624.404 0.989593 624.404 1.46447 624.697 1.75736L628.939 6L624.697 10.2426C624.404 10.5355 624.404 11.0104 624.697 11.3033C624.99 11.5962 625.464 11.5962 625.757 11.3033L630.53 6.53033ZM0 6.75H630V5.25H0V6.75Z" fill="url(#paint0_linear_914_2020)" />
                <defs>
                  <linearGradient id="paint0_linear_914_2020" x1="0" y1="6" x2="0.214999" y2="18.147" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#F6921E" />
                    <stop offset="1" stop-color="#F26F21" />
                  </linearGradient>
                </defs>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<?php get_footer();
