<?php

// Template Name: How We Work

get_header();
$process_title = get_field('work_process_title');
$process_main_steps = get_field('work_process_main_steps');
$process_additional_steps = get_field('work_process_additional_steps');
$process_additional_image = get_field('work_process_additional_steps_image');
$top_banner_title_row_1 = get_field('top_banner_title_row_1');
$top_banner_title_row_2 = get_field('top_banner_title_row_2');
$top_banner_intro = get_field('top_banner_intro_copy');
$top_banner_media = get_field('top_banner_media');
?>

<section class="top-banner top-banner--green top-banner--work">
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
      <div class="top-banner__media js-lottie-animation">
      </div>
    </div>
  </div>
</section>

<section class="work-process">
  <div class="container">
    <div class="work-process__title">
      <h2><?php echo $process_title; ?></h2>
    </div>
    <div class="work-process__diagram">
      <div class="work-process__diagram-inner">
        <?php if (have_rows('work_process_main_steps')) {
          while (have_rows('work_process_main_steps')) {
            the_row();
            $icon = get_sub_field('icon');
            $title_row_1 = get_sub_field('title_row_1');
            $title_row_2 = get_sub_field('title_row_2');
            $accent_color = get_sub_field('accent_color');
            $number++;
        ?>
            <article class="work-process__diagram-card">
              <div class="work-process__diagram-card-heading">
                <i class="info-card__icon">
                  <?php echo wp_get_attachment_image($icon, 'icon'); ?>
                </i>
              </div>
              <div class="work-process__diagram-card-body" style="border-color:<?php echo $accent_color ?>;">
                <h2><span><?php echo $title_row_1 ?></span>
                  <?php
                  echo $title_row_2 ? '<span><br />' . $title_row_2 . '</span>' : '' ?>
                </h2>
              </div>
              <div class="work-process__diagram-card-foot">
                <span style="border-color:<?php echo $accent_color ?>;"><?php echo $number; ?></span>
              </div>
            </article>
        <?php }
        } ?>

        <?php if (have_rows('work_process_additional_steps')) { ?>
          <div class="work-process__diagram-additional-steps">
            <?php while (have_rows('work_process_additional_steps')) {
              the_row();
              $icon = get_sub_field('icon');
              $title_row_1 = get_sub_field('title_row_1');
              $title_row_2 = get_sub_field('title_row_2');
              $accent_color = get_sub_field('accent_color');
            ?>
              <article class="work-process__diagram-card work-process__diagram-card--additional">
                <div class="work-process__diagram-card-heading">
                  <i class="info-card__icon">
                    <?php echo wp_get_attachment_image($icon, 'icon'); ?>
                  </i>
                </div>
                <div class="work-process__diagram-card-body" style="border-color:<?php echo $accent_color ?>;">
                  <h2><span><?php echo $title_row_1 ?></span>
                    <?php
                    echo $title_row_2 ? '<span><br />' . $title_row_2 . '</span>' : '' ?>
                  </h2>
                </div>
              </article>
            <?php
            } ?>
            <div class="work-process__diagram-additional-image">
              <?php echo wp_get_attachment_image($process_additional_image, 'entry'); ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section class="work-info-cards">
  <div class="work-info-cards__dots hidden-mobile">
    <svg width="100%" height="100%">
      <defs>
        <pattern id="polka-dots--white" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
          <circle fill="#fff" cx="1" cy="1" r="1" opacity="0.6" />
        </pattern>
      </defs>
      <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots--white)" />
    </svg>
  </div>

  <div class="container container--full">
    <div class="work-info-cards__inner">
      <?php if (have_rows('work_process_main_steps')) {
        $number = 0; ?>
        <div class="container">
          <div class="work-info-cards__cards js-anim js-sequence">
            <?php while (have_rows('work_process_main_steps')) {
              the_row();
              $icon = get_sub_field('icon');
              $title_row_1 = get_sub_field('title_row_1');
              $title_row_2 = get_sub_field('title_row_2');
              $subtitle = get_sub_field('subtitle');
              $copy = get_sub_field('copy');
              $accent_color = get_sub_field('accent_color');
              $number++;
            ?>
              <article class="info-card" style="border-color:<?php echo $accent_color ?>;">
                <div class="info-card__heading">
                  <div class="info-card__number">
                    <span style="background-color:<?php echo $accent_color ?>;"><?php echo $number; ?>
                  </div>
                  <div class="info-card__title">
                    <h2><span><?php echo $title_row_1 ?>&nbsp;</span>
                      <?php
                      echo $title_row_2 ? '<span><br />' . $title_row_2 . '</span>' : '' ?>
                    </h2>
                  </div>
                  <i class="info-card__icon">
                    <?php echo wp_get_attachment_image($icon, 'icon'); ?>
                  </i>
                </div>
                <div class="info-card__copy">
                  <h3><?php echo $subtitle; ?></h3>
                  <p><?php echo $copy; ?></p>
                </div>
              </article>
            <?php
            } ?>
          </div>
        </div>
      <?php
      } ?>
      <div class="link-block">
        <div class="container">
          <div class="link-block__inner">
            <a href="<?php echo site_url('/contact-us'); ?>">Contact Us <svg width="631" height="12" viewBox="0 0 631 12" fill="none" xmlns="http://www.w3.org/2000/svg">
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

  </div>
</section>

<?php get_footer();
