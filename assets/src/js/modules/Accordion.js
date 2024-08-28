class Accordion {
  constructor(el) {
    this.el = el;
    this.summary = el.querySelector('.js-accordion-summary');
    this.content = el.querySelector('.js-accordion-content');
    this.events();
  }

  events() {
    this.summary.addEventListener('click', () => this.togglePanel());
  }

  togglePanel() {
    this.el.classList.toggle('accordion--open');
    if (this.content.style.maxHeight) {
      this.content.style.maxHeight = null;
    } else {
      this.content.style.maxHeight = this.content.scrollHeight + 'px';
    }
  }
}
