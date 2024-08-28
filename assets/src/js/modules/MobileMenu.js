class MobileMenu {
  constructor() {
    this.mobileMenuBtn = document.querySelector('.js-mobile-menu-trigger');
    this.mobileMenu = document.querySelector('.mobile-menu');
    this.events();
  }

  events() {
    this.mobileMenuBtn.addEventListener('click', () => this.openMenu());
  }

  openMenu() {
    document.body.classList.toggle('no-scroll');
    this.mobileMenu.classList.toggle('mobile-menu--open');
    this.mobileMenuBtn.classList.toggle('burger--open');
    this.mobileMenuBtn.getAttribute('aria-expanded') === 'false'
      ? this.mobileMenuBtn.setAttribute('aria-expanded', 'true')
      : this.mobileMenuBtn.setAttribute('aria-expanded', 'false');
  }
}
