class Animations {
  constructor() {
    this.slideLeftElements = [...document.querySelectorAll('.js-slide-left')];
    this.fadeInElements = [...document.querySelectorAll('.js-fade-in')];
    this.riseInElements = [...document.querySelectorAll('.js-rise-in')];
    this.sequenceGroup = document.querySelector('.js-sequence');
    this.observerOptions = {
      root: null,
      rootMargin: '-100px 0px -100px 0px',
      threshold: 0
    };
    this.standardObserver = new IntersectionObserver(
      this.standardFade,
      this.observerOptions
    );

    this.sequenceObserver = new IntersectionObserver(
      this.sequenceFade,
      this.observerOptions
    );
    this.events();
  }

  events() {
    this.slideLeftElements.forEach(el => this.standardObserver.observe(el));
    this.fadeInElements.forEach(el => this.standardObserver.observe(el));
    this.riseInElements.forEach(el => this.standardObserver.observe(el));
    if (this.sequenceGroup) {
      [...this.sequenceGroup.children].forEach(el =>
        this.sequenceObserver.observe(el)
      );
    }
  }

  standardFade(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
      }
    });
  }

  sequenceFade(entries) {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting && entry.intersectionRatio > 0) {
        setTimeout(() => {
          entry.target.classList.add('active');
        }, index * 700);
      }
    });
  }
}
