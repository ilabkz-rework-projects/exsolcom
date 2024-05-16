window.addEventListener('DOMContentLoaded', function() {
	const swiperPersonal = new Swiper(".swiper-container.personal", {
		effect: "coverflow",
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: "auto",
		initialSlide: 2,
		coverflowEffect: {
			rotate: 0,
			stretch: -14 ,
			depth: 30,
			modifier: 10,
			slideShadows: false
		},
		navigation: {
			nextEl: ".swiper-personal-button-next",
			prevEl: ".swiper-personal-button-prev",
		},
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