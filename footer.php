<?php

/**
 * The template for displaying the footer
 *
 *
 */
$footer_title = get_field('footer_title', 'option');
$main_email = get_field('main_email_address', 'option');
$main_phone = get_field('main_phone_number', 'option');
$additional_phone = get_field('additional_phone_number', 'option');
$footer_links = get_field('footer_links', 'option');
$footer_additional_links =
  get_field('footer_additional_links', 'option');
?>

</main>
<footer class="footer">
  <div class="container">
    <section class="footer__group footer__group-1">
      <div class="footer__tagline">
        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/footer-tagline.svg')); ?>">
      </div>
      <div class="footer__nav">
        <?php wp_nav_menu(array(
          'theme_location' => 'footer_nav',
          'menu_class' => '',
          'container' => 'nav',
        )); ?>
      </div>
      <div class="footer__contact">
        <ul>
          <li>P &nbsp;<a href="tel:<?php echo '+1 ' . str_replace('.', '', $main_phone); ?>"><?php echo $main_phone; ?></a></li>
          <li>F &nbsp;<?php echo $additional_phone; ?></li>
          <li><a href="mailto:<?php echo $main_email; ?>"><?php echo $main_email; ?></a></li>
        </ul>
      </div>
      <div class="footer__main-links">
        <ul>
          <?php foreach ($footer_links as $link) { ?>
            <li><a href="<?php echo esc_url($link['footer_link']['url']) ?>" target="<?php echo $link['footer_link']['target'] ?>"><?php echo $link['footer_link']['title'] ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </section>

    <section class="footer__group footer__group-2">
      <div class="footer__logo">
        <picture>
          <a href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo-logomark.svg')); ?>"></a>
        </picture>
      </div>
      <div class="footer__additional-links">
        <ul>
          <?php foreach ($footer_additional_links as $link) { ?>
            <li><a href="<?php echo esc_url($link['footer_additional_link']['url']) ?>" target="<?php echo $link['footer_additional_link']['target'] ?>"><?php echo $link['footer_additional_link']['title'] ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="footer__copyright">
        <span>© <?php the_time('Y') ?> Adero Partners. All Rights Reserved.</span>
      </div>
    </section>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>