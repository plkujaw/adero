class ImageCarousel {
  constructor() {
    this.images = new Swiper('.carousel.carousel--images', {
      loop: true,
      speed: 800,
      navigation: {
        prevEl: '.carousel__arrow--prev',
        nextEl: '.carousel__arrow--next'
      },
      pagination: {
        el: '.carousel__pagination',
        clickable: true
      }
    });
  }
}
