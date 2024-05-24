window.addEventListener('DOMContentLoaded', function() {
	const swiperPersonal = new Swiper(".swiper-container.personal", {
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
			}
		}
	});


	const swiperProducts = new Swiper(".swiper.products-swiper", {
		slidesPerView: 4,
		spaceBetween: 40,
		slidesPerColumn: 2,
		navigation: {
			nextEl: ".swiper-products-button-next",
			prevEl: ".swiper-products-button-prev",
		},
	});

	const swiperProjects = new Swiper(".swiper.projects-swiper", {
		slidesPerView: 5,
		grid: {
			rows: 2,
			fill: "row",
		},
		spaceBetween: 30,
		navigation:{
			nextEl: ".swiper-projects-button-next",
			prevEl: ".swiper-projects-button-prev",
		},
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