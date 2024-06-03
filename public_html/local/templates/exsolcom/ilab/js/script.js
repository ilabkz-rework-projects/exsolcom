window.addEventListener('DOMContentLoaded', function() {
	const swiperPersonal = new Swiper(".swiper.personal", {
		effect: "coverflow",
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: "auto",
		initialSlide: 2,
		coverflowEffect: {
			rotate: 0,
			stretch: -14,
			depth: 30,
			modifier: 10,
			slideShadows: false
		},
		navigation: {
			nextEl: ".swiper-personal-button-next",
			prevEl: ".swiper-personal-button-prev",
		},
		on: {
			slideChange: function () {
				const activeSlide = this.slides[this.activeIndex];
				activeSlide.classList.add("swiper-slide-active");
			},
		}
	});


	const swiperProducts = new Swiper(".swiper.products-swiper", {
		navigation: {
			nextEl: ".swiper-products-button-next",
			prevEl: ".swiper-products-button-prev",
		},
		breakpoints : {
			360:{
				slidesPerView: 1,
				spaceBetween: 30,
			},
			480:{
				slidesPerView: 2,
				spaceBetween: 20,
			},
			780:{
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1150:{
				slidesPerView: 4,
				spaceBetween: 40,
			}
		},
		on: {
			resize: function () {
				this.slides.forEach((slide) => {
					const width = slide.getBoundingClientRect().width
					slide.style.height = `${width}px`
				})
			}
		}
	});

	const swiperProjects = new Swiper(".swiper.projects-swiper", {
		slidesPerView: 5,
		columnCount: 2,
		grid: {
			rows: 2,
			fill: "row",
		},
		spaceBetween: 30,
		navigation:{
			nextEl: ".swiper-projects-button-next",
			prevEl: ".swiper-projects-button-prev",
		},
		breakpoints : {
			360:{
				slidesPerView: 2,
				spaceBetween: 10,
			},
			480:{
				slidesPerView: 2,
				spaceBetween: 20,
			},
			760:{
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1000:{
				slidesPerView: 4,
				spaceBetween: 40,
			},
			1330:{
				slidesPerView: 5,
				spaceBetween: 40,
			}
		},
		on: {
			resize: function () {
				this.slides.forEach((slide) => {
					const width = slide.getBoundingClientRect().width
					slide.style.height = `${width}px`
				})
			}
		}
	});


});

document.addEventListener('DOMContentLoaded', () => {
	const currentTheme = localStorage.getItem('theme') || 'light';
	document.documentElement.setAttribute('data-theme', currentTheme);

	function toggleTheme() {
		let theme = document.documentElement.getAttribute('data-theme');
		theme = (theme === 'light') ? 'dark' : 'light';
		trans();
		document.documentElement.setAttribute('data-theme', theme);
		localStorage.setItem('theme', theme);
	}

	const themeToggle = document.getElementById("theme-toggle");
	if (themeToggle) themeToggle.addEventListener("click", toggleTheme);

	const themeToggle2 = document.getElementById("theme-toggle-2");
	if (themeToggle2) themeToggle2.addEventListener("click", toggleTheme);

	const trans = () => {
		document.documentElement.classList.add('transition');
		setTimeout(() => document.documentElement.classList.remove('transition'), 1000);
	};
});

document.addEventListener('DOMContentLoaded', (event) =>{
	const circle = document.getElementById('myCircles');
	const closeButton = document.querySelector('.close_hide_menu');

	circle.addEventListener('click', () =>{
		if(!circle.classList.contains('wide')){
			circle.classList.add('wide');
		}
	});

	closeButton.addEventListener('click', (event) => {
		event.stopPropagation();
		circle.classList.remove('wide');
	});
});

document.addEventListener('DOMContentLoaded', () => {
	const language = document.getElementById('language');
	const textOptions = document.querySelector('.text-option');
	const selectedText = document.getElementById('selectedText');

	language.addEventListener('click', () => {
		language.classList.toggle('expanded');
	});

	textOptions.forEach(option => {
		option.addEventListener('click', (event) => {
			event.stopPropagation();
			selectedText.textContent = option.textContent;
			language.classList.remove('expanded');
		});
	});
});