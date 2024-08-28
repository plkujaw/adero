class LottieAnimation {
  constructor(page) {
    this.page = page;
    lottie.loadAnimation({
      container: document.querySelector('.js-lottie-animation'), // the dom element that will contain the animation
      renderer: 'svg',
      loop: false,
      autoplay: true,
      path: `../wp-content/themes/adero-theme/assets/lottie/lottie-${page}.json`
      // path: `/adero/wp-content/themes/adero-theme/assets/lottie/lottie-${page}.json`
    });
  }
}