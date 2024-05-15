window.addEventListener('DOMContentLoaded', function() {
	const swiper = new Swiper(".swiper-container.personal", {
		effect: "coverflow",
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: "auto",
		centeredSlides: true,
		loop: true,
		initialSlide: 1,
		coverflowEffect: {
			rotate: 0,
			stretch: -30,
			depth: 100,
			modifier: 10,
			initialSlide: 5,
			slideShadows: false
		}
	});

});