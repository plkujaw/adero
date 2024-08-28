<?php
get_header();
$position = get_field('person_position');
$location = get_field('person_location');
$linkedin = get_field('person_linkedin');
$bio = get_field('person_bio');
$video = get_field('person_video');
$full_name = get_the_title();
$first_name = explode(' ', $full_name)[0];
$questionnaire = get_field('person_questionnaire');
$execPos = get_field('person_position_executive');
?>
<div class="single-person__video-wrapper js-person-video-wrapper">
  <div class="video-wrapper-inner">
    <div class="container">
      <div class="single-person__video-close-wrapper">
        <button class="single-person__video-close" type="button">
          <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d_1595_349)">
              <rect x="6" y="5" width="32" height="32" rx="16" fill="white" />
              <line x1="15.9628" y1="27.2993" x2="27.7924" y2="15.4697" stroke="#022D2C" stroke-width="1.5" />
              <line x1="16.5303" y1="15.4697" x2="28.3599" y2="27.2992" stroke="#022D2C" stroke-width="1.5" />
            </g>
            <defs>
              <filter id="filter0_d_1595_349" x="0" y="0" width="46" height="46" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                <feOffset dx="1" dy="2" />
                <feGaussianBlur stdDeviation="3.5" />
                <feComposite in2="hardAlpha" operator="out" />
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" />
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1595_349" />
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1595_349" result="shape" />
              </filter>
            </defs>
          </svg>
        </button>
      </div>
      <div class="single-person__video responsive-media">
      </div>
    </div>
  </div>
</div>
<div class="container single-person__main">
  <div class="single-person__wrapper">
    <div class="single-person__info hidden-desktop">
      <div class="person-name">
        <h1><?php the_title(); ?><span><?php 
			$designation = get_field('person_designation', get_the_ID());
			if ($designation) {
				echo '<span>' . $designation . '</span>';
			}?></span></h1>
      </div>
      <div class="person-work-info">
        <h2><?php 
			if ($execPos) {
				echo $execPos;
			}
			if ($position && $execPos){
				echo ' | ';
			}
			echo $position;
		?></h2>
        <h3>
          <?php if (count($location) > 1) {
            foreach ($location as $location_item) {
              echo "<span>$location_item->post_title</span>";
            }
          } else {
            echo $location[0]->post_title;
          }
          ?>
        </h3>
      </div>
    </div>
    <div class="single-person__col single-person__col--1">
      <picture class="single-person__photo">
        <?php echo get_the_post_thumbnail('', 'entry', array('class' => 'show')); ?>
		<?php echo wp_get_attachment_image(
			get_field('person_additional_image', get_the_ID()),
			'entry-small',
			'',
			array(
				'class' => 'image-2'
			)
		); ?>
      </picture>

      <?php if ($video) { ?>
        <div class="single-person__meet-btn">
          <span class="js-person-video" data-video="<?php echo (esc_attr($video)); ?>">Meet <?php echo $first_name; ?></span>
        </div>
      <?php } ?>

	  <div class="single-person__image-switch-btns hidden-desktop">
		<button id="personImgBtn1" class="active"></button>
		<button id="personImgBtn2"></button>
	  </div>
	  <!-- /.single-person__image-switch-btns hidden-desktop -->

      <div class="single-person__dots hidden-mobile">
        <svg width="100%" height="100%">
          <defs>
            <pattern id="polka-dots--malachite" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
              <circle fill="#022d2c" cx="1" cy="1" r="1" opacity="0.6" />
            </pattern>
          </defs>
          <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots--malachite)" />
        </svg>
      </div>
    </div>
    <div class="single-person__col single-person__col--2">
      <div class="single-person__info hidden-mobile">
        <div class="person-name">
          <h1><?php the_title(); ?><span><?php 
			$designation = get_field('person_designation', get_the_ID());
			if ($designation) {
				echo '<span>' . $designation . '</span>';
			}?></span></h1>
        </div>
        <div class="person-work-info">
          <h2><?php 
			if ($execPos) {
				echo $execPos;
			}
			if ($position && $execPos){
				echo ' | ';
			}
			echo $position;
		  ?></h2>
          <h3>
            <?php if (count($location) > 1) {
              foreach ($location as $location_item) {
                echo "<span>$location_item->post_title</span>";
              }
            } else {
              echo $location[0]->post_title;
            }
            ?>
          </h3>
        </div>
      </div>
      <?php if ($bio) { ?>
        <article class="single-person__bio wysiwyg">
          <?php echo $bio; ?>
        </article>
      <?php } ?>
      <div class="single-person__questionnaire">
        <?php foreach ($questionnaire as $question) { ?>
          <div class="accordion js-accordion-panel">
            <div class="accordion__summary js-accordion-summary">
              <div class="accordion__summary-inner">
                <div class="accordion-title">
                  <h3><?php echo $question['questionnaire_question']; ?></h3>
                </div>
                <div class="accordion-control">
                  <div class="accordion-control__icon">
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion__content js-accordion-content wysiwyg">
              <?php echo $question['questionnaire_answer']; ?>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="single-person__social hidden-desktop">
        <a href="<?php echo esc_url($linkedin); ?>" class="btn  btn--arrow-1" target="_blank">LinkedIn<svg class="arrow-1 hidden-desktop" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.75 1C9.75 0.585787 9.41421 0.25 9 0.25L2.25 0.25C1.83579 0.25 1.5 0.585786 1.5 1C1.5 1.41421 1.83579 1.75 2.25 1.75H8.25V7.75C8.25 8.16421 8.58579 8.5 9 8.5C9.41421 8.5 9.75 8.16421 9.75 7.75L9.75 1ZM1.53033 9.53033L9.53033 1.53033L8.46967 0.46967L0.46967 8.46967L1.53033 9.53033Z" fill="" />
          </svg>
        </a>
      </div>
      <div class="single-person__back">
        <button class="btn btn--dark btn--arrow-2" onclick="history.back();"><svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23743 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46446 6.59619 0.989591 6.3033 0.696697C6.01041 0.403804 5.53553 0.403804 5.24264 0.696697L0.469669 5.46967ZM29 5.25L1 5.25L1 6.75L29 6.75L29 5.25Z" fill="#F4F0EF" />
          </svg>Back to Our Team
        </button>
      </div>
    </div>
    <div class="single-person__social hidden-mobile">
      <a href="<?php echo esc_url($linkedin); ?>" class="btn btn--arrow-1 btn--desktop-sm" target="_blank">LinkedIn<svg class="arrow-1 hidden-mobile" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.5 1C9.5 0.723858 9.27614 0.5 9 0.5L4.5 0.5C4.22386 0.5 4 0.723858 4 1C4 1.27614 4.22386 1.5 4.5 1.5L8.5 1.5L8.5 5.5C8.5 5.77614 8.72386 6 9 6C9.27614 6 9.5 5.77614 9.5 5.5L9.5 1ZM1.35355 9.35355L9.35355 1.35355L8.64645 0.646447L0.646447 8.64645L1.35355 9.35355Z" fill="" />
        </svg></a>
    </div>
  </div>
</div>

<?php get_footer();
