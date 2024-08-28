class Header {
  constructor() {
    this.header = document.querySelector('.header');
    this.headerHeight = document.querySelector('.header').offsetHeight;
    this.headerSubnav = document.querySelector('.header__sub-nav');
    this.doc = document.documentElement;
    this.w = window;
    this.prevScroll = this.w.scrollY || this.doc.scrollTop;
    this.curScroll;
    this.direction;
    this.prevDirection = 0;
    this.events();
  }

  events() {
    window.addEventListener('scroll', () => this.checkScroll());
  }

  checkScroll() {
    /*
     ** Find the direction of scroll
     ** 0 - initial, 1 - up, 2 - down
     */
    this.curScroll = this.w.scrollY || this.doc.scrollTop;
    if (this.curScroll > this.prevScroll) {
      //scrolled up
      this.direction = 2;
    } else if (this.curScroll < this.prevScroll) {
      //scrolled down
      this.direction = 1;
    }
    if (this.direction !== this.prevDirection) {
      this.toggleHeader(this.direction, this.curScroll);
    }
    this.prevScroll = this.curScroll;
  }

  toggleHeader() {
    if (this.direction === 2 && this.curScroll > this.headerHeight) {
      this.header.classList.add('header--hide');
      this.prevDirection = this.direction;
    } else if (this.direction === 1) {
      this.header.classList.remove('header--hide');
      this.prevDirection = this.direction;
    }
  }
}
