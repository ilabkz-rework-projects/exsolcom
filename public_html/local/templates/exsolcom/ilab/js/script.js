window.addEventListener('DOMContentLoaded', function() {

	BX.addCustomEvent('OnEditorInitedBefore', function(toolbar) {
		var _this = this;

		console.log(this)

		// отучаю резать тэги
		BX.addCustomEvent(this, 'OnGetParseRules', BX.proxy(function() {
			_this.rules.tags.span   = {};
			_this.rules.tags.svg    = {};
			_this.rules.tags.use    = {};
			_this.rules.tags.path    = {};
		}, this));
	})

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

document.addEventListener('DOMContentLoaded', (event) =>{
	// Отвечает за переключение с светлой темы на темную и наоборот
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

	// Отвечает за расскрытие блока выбора языка
	const language = document.getElementById('language');
	const textOptions = document.querySelectorAll('.text-option');
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

	// Отвечает за раскрытие блока контакт ватсап в Header
	const circle = document.getElementById('myCircles');
	const closeButton = document.querySelector('.close_hide_menu');

	circle.addEventListener('click', () =>{
		if(!circle.classList.contains('wide')){
			circle.classList.add('wide');
		}
		language.classList.remove('expanded');
	});

	closeButton.addEventListener('click', (event) => {
		event.stopPropagation();
		circle.classList.remove('wide');
	});

	// Отвечает за раскрытие блока контакт ватсап в Footer c 1330px до 1100px
	const circle2 = document.getElementById('myCircles2');
	const closeButton2 = document.querySelector('.close_hide_menu2');

	circle2.addEventListener('click', () =>{
		if(!circle2.classList.contains('wide')){
			circle2.classList.add('wide');
		}
	});

	closeButton2.addEventListener('click', (event) => {
		event.stopPropagation();
		circle2.classList.remove('wide');
	});

	// Отвечает за раскрытие блока контакт ватсап в Footer c 1100px до 360px
	const circle3 = document.getElementById('myCircles3');
	const closeButton3 = document.querySelector('.close_hide_menu3');

	circle3.addEventListener('click', () =>{
		if(!circle3.classList.contains('wide')){
			circle3.classList.add('wide');
		}
	});

	closeButton3.addEventListener('click', (event) => {
		event.stopPropagation();
		circle3.classList.remove('wide');
	});

	// Отвечает за раскрытие блока поиска в header
	const searchWrapper = document.querySelector('.i_search-wrapper');
	const titleSearch = document.getElementById('title-search');
	const closeSearch = document.querySelector('.i_search-close');

	searchWrapper.addEventListener('click', () => {
		if (!searchWrapper.classList.contains('widely')){
			searchWrapper.classList.add('widely');
		}

		closeSearch.addEventListener('click', (event) => {
			event.stopPropagation();
			searchWrapper.classList.remove('widely');
		});

	});

	// Получаем данные для модальных окон
	const servicesItems = document.querySelectorAll('.i_services-item');
	const overlay = document.querySelector('.i_overlay')
	const modal = document.querySelector('.i_modal')
	const modalClose = document.querySelector('.i_modal .i_modal-close')
	//SIDE MENU

	const sideMenu = document.querySelector('.i_side-menu')
	const sideMenuButton = document.querySelectorAll('.i_header-burger')
	const sideMenuClose = document.querySelector('.i_side-menu-close')

	sideMenuButton.forEach(item => {
		item.addEventListener('click', () =>{
			sideMenu.classList.add('show')
		})
	})

	sideMenuClose.addEventListener('click', () =>{
		sideMenu.classList.remove('show')
	})

	servicesItems.forEach(item => {
		item.addEventListener('click', ()=>{
			fetch('/local/templates/exsolcom/ilab/ajax/getServicesModalContent.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({id : item.getAttribute('id')})
			})
				.then(response => response.json())
				.then(data => {
					console.log(data)
					overlay.classList.add('active')
					modal.classList.add('active')
					modal.querySelector('.i_modal-content').innerHTML = data.CONTENT
					modal.querySelector('.i_modal-img').innerHTML = `<img src="${data.IMAGE}" alt="${data.NAME}">`
				})
		})
	})

	//OVERLAY
	document.addEventListener('keydown', (event) => {
		if(event.key === 'Escape'){
			overlay.classList.remove('active')
			modal.classList.remove('active')
			sideMenu.classList.remove('show')
		}
	})

	document.addEventListener('click', (event) => {
		if(event.target.classList.contains('i_overlay')){
			overlay.classList.remove('active')
			modal.classList.remove('active')
		}
	})

	modalClose.addEventListener('click', () => {
		overlay.classList.remove('active')
		modal.classList.remove('active')
	})

});
