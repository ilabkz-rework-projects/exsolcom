window.addEventListener('DOMContentLoaded', function() {
	const swiper = new Swiper(".swiper-container.personal", {
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
	});

});