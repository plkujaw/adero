class OurTeam {
  constructor() {
    this.selectionsWrapper = document.querySelector(
      '.team-members__selections'
    );
    // this.membersList = document.querySelector('.team-members__list');
    // this.memberCards = [
    //   ...document.querySelectorAll('.team-member-card-wrapper')
    // ];
    // this.loadMoreBtn = document.querySelector('.js-load-more');
    // this.windowWidth =
    //   window.innerWidth ||
    //   document.documentElement.clientWidth ||
    //   document.body.clientWidth;
    // this.page = 1;
    // if (this.windowWidth < 960) {
    //   this.shown = this.page * 4;
    // } else {
    //   this.shown = this.page * 9;
    this.events();
  }
  // }

  events() {
    document.addEventListener(
      'facetwp-loaded',
      this.displaySelections.bind(this)
    );

    document.addEventListener(
      'facetwp-loaded',
      this.animateElements.bind(this)
    );

    // document.addEventListener(
    //   'facetwp-loaded',
    //   this.hideSpotlightMemberOnSearch.bind(this)
    // );

    // document.addEventListener('facetwp-loaded', () => this.loadMore.bind(this));

    // document.addEventListener(
    //   'facetwp-loaded',
    //   this.updateMemberCards.bind(this)
    // );

    // if (this.loadMoreBtn) {
    // this.hideLoadMoreBtn();
    // this.loadMoreBtn.addEventListener('click', () => {
    //   this.loadMore();
    // });
  }
  // }

  // updateMemberCards() {
  //   this.memberCards = [
  //     ...document.querySelectorAll('.team-member-card-wrapper')
  //   ];
  //   console.log(this.memberCards);
  // }

  // hideLoadMoreBtn() {
  //   if (this.windowWidth < 960 && this.memberCards.length <= 4) {
  //     this.loadMoreBtn.style.display = 'none';
  //   } else if (this.windowWidth >= 960 && this.memberCards.length <= 9) {
  //     this.loadMoreBtn.style.display = 'none';
  //   } else {
  //     this.loadMoreBtn.style.display = 'block';
  //   }
  // }

  // loadMore() {
  //   if (this.windowWidth < 960) {
  //     const toShow = this.memberCards.slice(this.shown, this.shown + 4);
  //     toShow.forEach(member => {
  //       member.style.display = 'block';
  //     });
  //     this.shown += 4;
  //   } else {
  //     const toShow = this.memberCards.slice(this.shown, this.shown + 9);
  //     toShow.forEach(member => {
  //       member.style.display = 'block';
  //     });
  //     this.shown += 9;
  //   }
  //   if (this.memberCards.length - this.shown < 1) {
  //     this.loadMoreBtn.style.display = 'none';
  //   }
  //   this.page++;
  // }

  // hideSpotlightMemberOnSearch() {
  //   const spotlightMember = document.querySelector('.team-members__spotlight');
  //   if (spotlightMember && window.location.href.indexOf('team_search') != -1) {
  //     spotlightMember.style.display = 'none';
  //   }
  // }

  displaySelections() {
    const locations = document.querySelector('[data-name="location"] select');
    const departments = document.querySelector(
      '[data-name="department"] select'
    );
    const selectedLocation = locations.options[locations.selectedIndex];
    const selectedDepartment = departments.options[departments.selectedIndex];
    const selectedLocationName = selectedLocation.text;
    const selectedDepartmentName = selectedDepartment.text;
    if (
      selectedDepartment !== departments.options[0] &&
      selectedLocation !== locations.options[0]
    ) {
      return (this.selectionsWrapper.innerHTML = `<span>${selectedDepartmentName}&nbsp; / &nbsp;${selectedLocationName}</span>`);
    }
    if (selectedLocation !== locations.options[0]) {
      return (this.selectionsWrapper.innerHTML = `<span>${selectedLocationName}</span>`);
    }
    if (selectedDepartment !== departments.options[0]) {
      return (this.selectionsWrapper.innerHTML = `<span>${selectedDepartmentName}</span>`);
    }
    if (
      selectedDepartment == departments.options[0] &&
      selectedLocation == locations.options[0]
    ) {
      return (this.selectionsWrapper.innerHTML = '');
    }
  }

  animateElements() {
    const animatedElements = [
      ...document.querySelectorAll('.team-members__list .js-anim')
    ];
    animatedElements.forEach(element => {
      if (!element.classList.contains('active')) {
        element.classList.add('active');
      }
    });
  }
}
