class CustomScrollbar {
  constructor() {
    this.wrapper = document.querySelector('.work-process__diagram');
    this.events();
  }
  events() {
    document.addEventListener('DOMContentLoaded', this.initScrollbar());
  }

  initScrollbar() {
    OverlayScrollbars(this.wrapper, {});
  }
}
