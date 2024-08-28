<?php
get_header();
$services_section_title = get_field('info_cards_title');
$services_cards = get_field('info_cards');
$top_banner_title_row_1 = get_field('top_banner_title_row_1');
$top_banner_title_row_2 = get_field('top_banner_title_row_2');
$top_banner_intro = get_field('top_banner_intro_copy');
$top_banner_media = get_field('top_banner_media');
?>

<section class="top-banner top-banner--home top-banner--green">
  <div class="container">
    <div class="top-banner__inner">
      <div class="top-banner__copy">
        <div class="top-banner__title js-slide-left">
          <h1><span class="top-banner__title-row-1"><?php echo $top_banner_title_row_1; ?></span><br><span class="top-banner__title-row-2"><?php echo $top_banner_title_row_2; ?></span></h1>
        </div>
        <div class="top-banner__intro js-slide-left">
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
<section class="home-info-cards our-services our-services--home">
  <div class="our-services--home__title">
    <div class="container">
      <p><?php echo $services_section_title; ?></p>
    </div>
  </div>
  <div class="container container--full">
    <div class="home-info-cards__inner">
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
              </article>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="link-block">
        <div class="container">
          <div class="link-block__inner">
            <a href="<?php echo site_url('/our-team'); ?>">Our Team<svg width="631" height="12" viewBox="0 0 631 12" fill="none" xmlns="http://www.w3.org/2000/svg">
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
<?php
get_footer();
