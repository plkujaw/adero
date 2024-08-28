<?php

// Template Name: About

get_header();
$services_section_title = get_field('info_cards_title');
$services_cards = get_field('info_cards');
$top_banner_title_row_1 = get_field('top_banner_title_row_1');
$top_banner_title_row_2 = get_field('top_banner_title_row_2');
$top_banner_intro = get_field('top_banner_intro_copy');
$top_banner_media = get_field('top_banner_media');
$intro_background_image = get_field('page_intro_background_image');
$intro_copy = get_field('page_intro_copy');
$monitor_title_row_1 = get_field('monitor_title_row_1');
$monitor_title_row_2 = get_field('monitor_title_row_2');
$monitor_copy = get_field('monitor_copy');
$monitor_media = get_field('monitor_media');
$resources_title = get_field('resources_title');
$resources = get_field('resources_files');
?>

<section class="top-banner top-banner--about">
  <div class="container">
    <div class="top-banner__inner">
      <div class="top-banner__copy js-slide-left">
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
<section class="page-intro page-intro--high">
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
<section class="info-cards our-services info-cards--about">
  <div class="info-cards__wrapper">
    <div class="container">
      <div class="info-cards__inner js-anim js-sequence">
        <?php foreach ($services_cards as $service) { ?>
          <article class="info-card">
            <div class="info-card__title">
              <h3><?php echo $service['info_card_title']; ?></h3>
            </div>
            <div class="info-card__copy">
              <p><?php echo $service['info_card_copy']; ?></p>
            </div>
            <?php if ($service['info_card_additional_information']) {
              $additional_info = $service['info_card_additional_information']; ?>
              <div class="info-card__additional-information">
                <ul>
                  <?php foreach ($additional_info as $info) { ?>
                    <li><?php echo $info['info_card_additional_information_item']; ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } ?>
          </article>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section class="monitor">
  <div class="container">
    <div class="monitor__inner">
      <div class="monitor__text">
        <div class="monitor__title">
          <h2><span class="monitor__title-row-1"><?php echo $monitor_title_row_1; ?></span><br /><span class="monitor__title-row-2"><?php echo $monitor_title_row_2; ?></span></h2>
        </div>
        <div class="monitor__copy">
          <p><?php echo $monitor_copy; ?></p>
        </div>
      </div>
      <div class="monitor__media">
        <div class="monitor__media-wrapper">
          <?php echo wp_get_attachment_image($monitor_media, 'entry-large'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="resources">
  <div class="resources__dots">
    <svg width="100%" height="100%">
      <defs>
        <pattern id="polka-dots--malachite" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
          <circle fill="#022d2c" cx="1" cy="1" r="1" opacity="0.6" />
        </pattern>
      </defs>
      <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots--malachite)" />
    </svg>
  </div>
  <div class="container container--full">
    <div class="resources__inner">
      <div class="container">
        <div class="resources__title">
          <h2><?php echo $resources_title; ?></h2>
        </div>
        <div class="resources__carousel">
          <div class="carousel carousel--resources">
            <div class="swiper-wrapper">
              <?php foreach ($resources as $resource) { ?>
                <div class="swiper-slide">
                  <div class="resource">
                    <div class="resource__inner">
                      <div class="resource__title">
                        <h3><a href="<?php echo esc_url($resource['resource_file']); ?>" download><?php echo $resource['resource_name']; ?></a></h3>
                      </div>
                      <div class="resource__download">
                        <a href="<?php echo esc_url($resource['resource_file']); ?>" download>
                          <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="resource__download-arrow" d="M10.4291 10.209C10.562 10.343 10.6367 10.5247 10.6367 10.7141C10.6367 10.9036 10.562 11.0852 10.4291 11.2192L8.30186 13.3621C8.16883 13.496 7.98847 13.5712 7.80043 13.5712C7.61239 13.5712 7.43204 13.496 7.299 13.3621L5.17254 11.2192C5.10669 11.1529 5.05446 11.0742 5.01882 10.9875C4.98318 10.9008 4.96484 10.8079 4.96484 10.7141C4.96484 10.6203 4.98318 10.5274 5.01882 10.4408C5.05446 10.3541 5.10669 10.2754 5.17254 10.209C5.23839 10.1427 5.31656 10.0901 5.4026 10.0542C5.48863 10.0183 5.58085 9.99982 5.67397 9.99982C5.76709 9.99982 5.85931 10.0183 5.94534 10.0542C6.03138 10.0901 6.10955 10.1427 6.1754 10.209L7.09195 11.1323V7.14251C7.09195 6.95307 7.16666 6.77139 7.29964 6.63743C7.43262 6.50348 7.61298 6.42822 7.80104 6.42822C7.9891 6.42822 8.16946 6.50348 8.30244 6.63743C8.43542 6.77139 8.51013 6.95307 8.51013 7.14251V11.1323L9.42709 10.209C9.56009 10.0754 9.74027 10.0004 9.92811 10.0004C10.116 10.0004 10.2961 10.0754 10.4291 10.209Z" fill="#022D2C" />
                            <path d="M12.056 14.9999C12.0559 15.1893 11.9811 15.371 11.8482 15.5049C11.7152 15.6388 11.5349 15.7141 11.3469 15.7142H4.25597C4.0679 15.7142 3.88754 15.639 3.75456 15.505C3.62158 15.3711 3.54688 15.1894 3.54688 14.9999C3.54688 14.8105 3.62158 14.6288 3.75456 14.4949C3.88754 14.3609 4.0679 14.2856 4.25597 14.2856H11.3469C11.44 14.2856 11.5322 14.3041 11.6182 14.34C11.7043 14.3759 11.7824 14.4285 11.8483 14.4949C11.9141 14.5612 11.9664 14.6399 12.002 14.7266C12.0376 14.8132 12.056 14.9061 12.056 14.9999Z" fill="#022D2C" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.10786 0.20898C4.17369 0.142697 4.25184 0.0901257 4.33784 0.0542687C4.42384 0.0184117 4.51601 -2.89333e-05 4.60909 3.88911e-08H13.4727C13.7521 -5.35801e-05 14.0287 0.0553364 14.2869 0.163006C14.545 0.270676 14.7795 0.428515 14.9771 0.627509C15.1746 0.826502 15.3313 1.06275 15.4382 1.32276C15.5451 1.58277 15.6 1.86144 15.6 2.14286V17.8571C15.6 18.1385 15.545 18.4172 15.4381 18.6772C15.3312 18.9372 15.1745 19.1734 14.9769 19.3724C14.7794 19.5714 14.5449 19.7292 14.2868 19.8369C14.0287 19.9446 13.7521 20 13.4727 20H2.12727C1.56312 19.9999 1.0221 19.7741 0.623182 19.3723C0.224265 18.9704 0.000107427 18.4254 0 17.8571V4.6449C7.54191e-05 4.45537 0.0748394 4.27362 0.207865 4.13959L4.10786 0.20898ZM3.54545 5.71429H1.41818V17.8571C1.41818 18.0466 1.49289 18.2283 1.62587 18.3622C1.75885 18.4962 1.93921 18.5714 2.12727 18.5714H13.4727C13.5659 18.5715 13.6581 18.553 13.7441 18.5172C13.8302 18.4813 13.9084 18.4287 13.9742 18.3623C14.0401 18.296 14.0923 18.2172 14.1279 18.1306C14.1636 18.0439 14.1819 17.951 14.1818 17.8571V2.14286C14.1818 1.95342 14.1071 1.77174 13.9741 1.63778C13.8411 1.50383 13.6608 1.42857 13.4727 1.42857H5.67273V3.57143C5.67278 3.85285 5.61779 4.13152 5.51091 4.39153C5.40402 4.65154 5.24733 4.88778 5.04978 5.08678C4.85224 5.28577 4.61771 5.44361 4.35959 5.55128C4.10147 5.65895 3.82483 5.71434 3.54545 5.71429Z" fill="#022D2C" />
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="carousel__navigation">
            <button class="btn btn--dark btn--arrow-2 carousel__arrow carousel__arrow--prev"><svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23743 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46446 6.59619 0.989591 6.3033 0.696697C6.01041 0.403804 5.53553 0.403804 5.24264 0.696697L0.469669 5.46967ZM29 5.25L1 5.25L1 6.75L29 6.75L29 5.25Z" fill="#F4F0EF" />
              </svg></button>
            <button class="btn btn--dark btn--arrow-2 carousel__arrow carousel__arrow--next"><svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.5303 6.53034C28.8232 6.23744 28.8232 5.76257 28.5303 5.46967L23.7574 0.696703C23.4645 0.40381 22.9896 0.40381 22.6967 0.696703C22.4038 0.989596 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53034ZM-1.31134e-07 6.75L28 6.75L28 5.25L1.31134e-07 5.25L-1.31134e-07 6.75Z" fill="F4F0EF" />
              </svg>
            </button>
          </div>

        </div>
      </div>
      <div class="link-block">
        <div class="container">
          <div class="link-block__inner">
            <a href="<?php echo site_url('/how-we-work'); ?>">How We Work <svg width="631" height="12" viewBox="0 0 631 12" fill="none" xmlns="http://www.w3.org/2000/svg">
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
