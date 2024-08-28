//=require ./modules/Header.js
//=require ./modules/MobileMenu.js
//=require ./modules/OurTeam.js
//=require ./modules/Accordion.js
//=require ./modules/ImageCarousel.js
//=require ./modules/ResourcesCarousel.js
//=require ./modules/LottieAnimations.js
//=require ./modules/CustomScrollbar.js
//=require ./modules/Animations.js
//=require ./modules/PersonVideo.js

// MUST NOT UNCOMMENT ABOVE LINES

// const header = new Header();
const mobileMenu = new MobileMenu();
const ourTeam = new OurTeam();
const imageCarousel = new ImageCarousel();
const resourcesCarousel = new ResourcesCarousel();
const customScrollbar = new CustomScrollbar();
const animations = new Animations();

// initialize accordion cards

document.querySelectorAll('.js-accordion-panel').forEach(el => {
  new Accordion(el);
});

// initialize lottie animations for pages

if (document.querySelector('body.home')) {
  const homepageLottieAnimations = new LottieAnimation('homepage');
}
if (document.querySelector('body.page-template-page-about')) {
  const whatWeDoLottieAnimations = new LottieAnimation('what-we-do');
}
if (document.querySelector('body.post-type-archive-person')) {
  const ourTeamLottieAnimations = new LottieAnimation('our-team');
}
if (document.querySelector('body.single-person')) {
  const personVideo = new PersonVideo();
}
if (document.querySelector('body.page-template-page-work')) {
  const howWeWorkLottieAnimations = new LottieAnimation('how-we-work');
}

// initialize rellax

if (document.querySelector('.page-intro__bg')) {
  const rellax = new Rellax('.page-intro__bg');
}

// Single Person image swich on mobile

const personImgBtn1 = document.getElementById('personImgBtn1');
const personImgBtn2 = document.getElementById('personImgBtn2');
const personImg1 = document.querySelector('.single-person__photo :nth-child(1)');
const personImg2 = document.querySelector('.single-person__photo :nth-child(2)');

if (personImgBtn1) {
	personImgBtn1.addEventListener('click', function () {
		personImg2.classList.remove('show');
		personImg1.classList.add('show');
		personImgBtn2.classList.remove('active');
		this.classList.add('active');
	});
	personImgBtn2.addEventListener('click', function () {
		personImg1.classList.remove('show');
		personImg2.classList.add('show');
		personImgBtn1.classList.remove('active');
		this.classList.add('active');
	});
}
