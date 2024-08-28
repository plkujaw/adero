class ResourcesCarousel {
  constructor() {
    this.resources = new Swiper('.carousel.carousel--resources', {
      slidesPerView: 1.5,
      spaceBetween: 20,
      speed: 800,
      freeMode: true,
      breakpoints: {
        769: {
          slidesPerView: 2.3
        },
        960: {
          slidesPerView: 3.3
        },
        1200: {
          slidesPerView: 4.3
        }
      },
      navigation: {
        prevEl: '.carousel__arrow--prev',
        nextEl: '.carousel__arrow--next'
      }
    });
  }
}
