<?php
$login_links = get_field('client_login_links', 'option');

foreach ($login_links as $link) {
  $url = $link['client_login_link']['url'];
  $text = $link['client_login_link']['title'];
  $target = $link['client_login_link']['target'];
?>
  <a href="<?php echo esc_url($url); ?>" class="" target="<?php echo $target; ?>"><?php echo $text ?><svg class="arrow-1 hidden-desktop" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M9.75 1C9.75 0.585787 9.41421 0.25 9 0.25L2.25 0.25C1.83579 0.25 1.5 0.585786 1.5 1C1.5 1.41421 1.83579 1.75 2.25 1.75H8.25V7.75C8.25 8.16421 8.58579 8.5 9 8.5C9.41421 8.5 9.75 8.16421 9.75 7.75L9.75 1ZM1.53033 9.53033L9.53033 1.53033L8.46967 0.46967L0.46967 8.46967L1.53033 9.53033Z" fill="" />
    </svg><svg class="arrow-1 hidden-mobile" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M9.5 1C9.5 0.723858 9.27614 0.5 9 0.5L4.5 0.5C4.22386 0.5 4 0.723858 4 1C4 1.27614 4.22386 1.5 4.5 1.5L8.5 1.5L8.5 5.5C8.5 5.77614 8.72386 6 9 6C9.27614 6 9.5 5.77614 9.5 5.5L9.5 1ZM1.35355 9.35355L9.35355 1.35355L8.64645 0.646447L0.646447 8.64645L1.35355 9.35355Z" fill="" />
    </svg>
  </a>
<?php } ?>