class PersonVideo {
  constructor() {
    this.personVideoBtn = document.querySelector('.js-person-video');
    this.videoWrapper = document.querySelector('.js-person-video-wrapper');
    this.videoInner = this.videoWrapper.querySelector('.single-person__video');
    if (this.personVideoBtn) {
      this.videoIframe = this.personVideoBtn.dataset.video;
    }
    this.events();
  }

  events() {
    if (this.personVideoBtn) {
      this.personVideoBtn.addEventListener('click', event => {
        this.showVideo(event);
      });
    }
    document.addEventListener('click', event => {
      this.hideVideo(event);
    });
  }

  showVideo(event) {
    event.stopPropagation();
    this.videoWrapper.style.display = 'block';
    this.videoWrapper.style.zIndex = '999';
    this.videoInner.innerHTML = this.videoIframe;
    document.body.classList.add('no-scroll');
  }

  hideVideo(event) {
    if (!this.videoInner.contains(event.target)) {
      this.videoWrapper.style.display = 'none';
      this.videoInner.innerHTML = '';
      document.body.classList.remove('no-scroll');
    }
  }
}
