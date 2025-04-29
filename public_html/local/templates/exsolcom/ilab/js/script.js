window.addEventListener('DOMContentLoaded', function () {

	BX.addCustomEvent('OnEditorInitedBefore', function (toolbar) {
		var _this = this;

		console.log(this)

		// отучаю резать тэги
		BX.addCustomEvent(this, 'OnGetParseRules', BX.proxy(function () {
			_this.rules.tags.span = {};
			_this.rules.tags.svg = {};
			_this.rules.tags.use = {};
			_this.rules.tags.path = {};
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
		},
		breakpoints: {
			360: {
				slidesPerView: 1,
				coverflowEffect: {
					rotate: 0,
					stretch: -10,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			480: {
				slidesPerView: 2,
				coverflowEffect: {
					rotate: 0,
					stretch: -12,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			760: {
				slidesPerView: 3,
				coverflowEffect: {
					rotate: 0,
					stretch: -14,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			1000: {
				slidesPerView: 4,
				coverflowEffect: {
					rotate: 0,
					stretch: -16,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			1330: {
				slidesPerView: "auto",
				coverflowEffect: {
					rotate: 0,
					stretch: -18,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			}
		}
	});


	const swiperProducts = new Swiper(".swiper.products-swiper", {
		navigation: {
			nextEl: ".swiper-products-button-next",
			prevEl: ".swiper-products-button-prev",
		},
		breakpoints: {
			360: {
				slidesPerView: 1,
				spaceBetween: 30,
			},
			480: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			780: {
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1150: {
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
		navigation: {
			nextEl: ".swiper-projects-button-next",
			prevEl: ".swiper-projects-button-prev",
		},
		breakpoints: {
			360: {
				slidesPerView: 2,
				spaceBetween: 10,
			},
			480: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			760: {
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1000: {
				slidesPerView: 4,
				spaceBetween: 40,
			},
			1330: {
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

document.addEventListener('DOMContentLoaded', (event) => {
	'use strict';

	const themeToggle = document.getElementById("theme-toggle");
	const themeToggle2 = document.getElementById("theme-toggle-2");

	function toggleTheme() {
		let theme = document.documentElement.getAttribute('data-theme');
		theme = (theme === 'light') ? 'dark' : 'light';
		document.documentElement.setAttribute('data-theme', theme);
		localStorage.setItem('theme', theme);
	}

	if (themeToggle) themeToggle.addEventListener("click", toggleTheme);
	if (themeToggle2) themeToggle2.addEventListener("click", toggleTheme);

	window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
		const newTheme = event.matches ? 'dark' : 'light';
		document.documentElement.setAttribute('data-theme', newTheme);
		localStorage.setItem('theme', newTheme);
	});

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
		sideMenu.classList.remove('show');
		circle2.classList.remove('wide');
		titleSearch2.classList.remove('active');
	});

	function getBasePath(url) {
		const match = url.match(/\/(about-us|contacts|programm-products|projects|services|partners|vacantion|blog|news|search)\/?/);
		return match ? match[0] : '/';
	}

	textOptions.forEach(option => {
		option.addEventListener('click', (event) => {
			const requestURI = document.querySelector('.i_header-more .i_url').textContent
			const formattedURI = getBasePath(requestURI)
			console.log(formattedURI)
			event.stopPropagation();
			selectedText.textContent = option.textContent;
			const locationToRedirect = option.getAttribute('data-value').toLowerCase()

			if(locationToRedirect !== 'ru'){
				window.location.href = `https://exsolcom.kz/${locationToRedirect}${formattedURI}`
			}else{
				window.location.href = `https://exsolcom.kz${formattedURI}`
			}
			language.classList.remove('expanded');
		});
	});

	// Отвечает за раскрытие блока контакт ватсап в Header
	const circle = document.getElementById('myCircles');
	const closeButton = document.querySelector('.close_hide_menu');

	circle.addEventListener('click', () => {
		if (!circle.classList.contains('wide')) {
			circle.classList.add('wide');
		}
		language.classList.remove('expanded');
		sideMenu.classList.remove('show');
		titleSearch2.classList.remove('active');
		circle3.classList.remove('wide');
		circle2.classList.remove('wide');
	});

	closeButton.addEventListener('click', (event) => {
		event.stopPropagation();
		circle.classList.remove('wide');
	});

	// Отвечает за раскрытие блока контакт ватсап в Footer c 1330px до 1100px
	const circle2 = document.getElementById('myCircles2');
	const closeButton2 = document.querySelector('.close_hide_menu2');

	circle2.addEventListener('click', () => {
		if (!circle2.classList.contains('wide')) {
			circle2.classList.add('wide');
		}
		sideMenu.classList.remove('show');
		language.classList.remove('expanded');
		circle.classList.remove('wide');
		titleSearch.classList.remove('active');
		titleSearch2.classList.remove('active');
	});

	closeButton2.addEventListener('click', (event) => {
		event.stopPropagation();
		circle2.classList.remove('wide');
	});

	// Отвечает за раскрытие блока контакт ватсап в Footer c 1100px до 360px
	const circle3 = document.getElementById('myCircles3');
	const closeButton3 = document.querySelector('.close_hide_menu3');

	circle3.addEventListener('click', () => {
		if (!circle3.classList.contains('wide')) {
			circle3.classList.add('wide');
		}
		sideMenu.classList.remove('show');
		language.classList.remove('expanded');
		titleSearch.classList.remove('active')
		circle.classList.remove('wide');
	});

	closeButton3.addEventListener('click', (event) => {
		event.stopPropagation();
		circle3.classList.remove('wide');
	});

	// Отвечает за раскрытие формы поиска в Footer
	const searchWrapperFooter = document.getElementById('i_search-wrapper2');
	const titleSearch2 = document.querySelector('#title-search2');
	const searchClose2 = document.querySelector('.i_search-close2');

	searchWrapperFooter.addEventListener('click', () => {
		titleSearch2.classList.toggle('active');
		sideMenu.classList.remove('show');
		language.classList.remove('expanded')
		titleSearch.classList.remove('active');
		circle.classList.remove('wide');
		circle2.classList.remove('wide');
	});

	searchClose2.addEventListener('click', () => {
		titleSearch2.classList.remove('active')
	})


	// Отвечает за раскрытие формы поиска в header
	const searchWrapper = document.querySelector('.i_search-wrapper');
	const titleSearch = document.querySelector('#title-search');
	const searchClose = document.querySelector('.i_search-close');

	searchWrapper.addEventListener('click', () => {
		titleSearch.classList.toggle('active');
		sideMenu.classList.remove('show');
		language.classList.remove('expanded');
		titleSearch2.classList.remove('active');
		circle3.classList.remove('wide');
		circle2.classList.remove('wide');
	});

	searchClose.addEventListener('click', () => {
		titleSearch.classList.remove('active')
	});


	// Получаем данные для модальных окон
	const servicesItems = document.querySelectorAll('.i_services-modal-item');
	const projectsItems = document.querySelectorAll('.i_projects-element__item');
	const detailModalItem = document.querySelectorAll('.i_detail-modal-item')
	const overlay = document.querySelector('.i_overlay')
	const modal = document.querySelector('.i_modal')
	const modalClose = document.querySelector('.i_modal .i_modal-close')
	const documentBody = document.querySelector('body')


	// MODAL KP

	const modalKpBtn = document.querySelectorAll('#modal-kp')
	const modalKp = document.querySelector('.i_modal-kp')
	const modalKpCloseBtn = modalKp.querySelector('.i_modal-close')
	const footerKpBtn = modalKp.querySelector('.i_modal-footer-btn #form-kp-btn')
	const footerKpBtnSecond = modalKp.querySelector('.i_modal-footer-btn #form-kp-btnSecond')
	const vacationBtn = modalKp.querySelector('.i_modal-footer-btn #form-reply-btn')
	const footerProgrammBtn = modalKp.querySelector('.i_modal-footer-btn #form-programm-btn')
	const modalKpFooter = modalKp.querySelector('.i_modal-footer')
	const languageID = document.querySelector('.i_language-id').value;

	//SIDE MENU

	const sideMenu = document.querySelector('.i_side-menu')
	const sideMenuButton = document.querySelectorAll('.i_header-burger')
	const sideMenuButtonFooter = document.querySelectorAll('.i_footer-right-more-icon_2')
	const sideMenuClose = document.querySelector('.i_side-menu-close')

	sideMenuButton.forEach(item => {
		item.addEventListener('click', () => {
			sideMenu.classList.toggle('show');
			circle.classList.remove('wide');
			circle2.classList.remove('wide');
			circle3.classList.remove('wide');
			language.classList.remove('expanded')
			titleSearch.classList.remove('active');
			titleSearch2.classList.remove('active');
			language.classList.remove('expanded');
		});
	});

	sideMenuButtonFooter.forEach(item => {
		item.addEventListener('click', () => {
			sideMenu.classList.toggle('show');
		});
	});

	sideMenuClose.addEventListener('click', () => {
		sideMenu.classList.remove('show');
	});


	// SUBMIT FORM

	const submitBtn = document.querySelectorAll('#submit-btn')
	const submitModal = document.querySelector('.i_submit')
	const submitCloseBtn = submitModal.querySelector('.i_submit-close')

	submitBtn.forEach(item => {
		item.addEventListener('click', () => {
			modal.classList.remove('active')
			submitModal.classList.add('active')
			overlay.classList.add('active')
			sideMenu.classList.remove('show')
			language.classList.remove('expanded');
			titleSearch.classList.remove('active');
			titleSearch2.classList.remove('active');
			circle.classList.remove('wide');
			circle2.classList.remove('wide');
			circle3.classList.remove('wide');
			footerProgrammBtn.classList.add('idn')
			footerKpBtn.classList.remove('idn')
			footerKpBtnSecond.classList.remove('idn')
			documentBody.classList.add('lock')
			vacationBtn.classList.add('idn')
			modalKpFooter.classList.remove('idn')
		});

	})


	submitCloseBtn.addEventListener('click', (event) => {
		submitModal.classList.remove('active')
		overlay.classList.remove('active')
		vacationBtn.classList.add('idn')
		documentBody.classList.remove('lock')
	})

	function openModalKp(item){
		modal.classList.remove('active')
		submitModal.classList.remove('active')
		formKpModal.classList.remove('active')
		modalKp.classList.add('active')
		overlay.classList.add('active')
		footerKpBtn.classList.remove('idn')
		footerKpBtnSecond.classList.remove('idn')
		documentBody.classList.add('lock')
		vacationBtn.classList.add('idn')
		modalKpFooter.classList.remove('idn')

		modalKp.querySelector('.i_modal-content').innerHTML = '';

		let langMessage1 = ''
		let langMessage2 = ''

		switch (languageID) {
			case "ru" :
				langMessage1 = '(электронная версия)'
				langMessage2 = 'Цена по запросу'
				break;
			case "kz" :
				langMessage1 = '(электрондық нұсқа)'
				langMessage2 = 'Сұрау бойынша баға'
				break;
			case "en" :
				langMessage1 = '(electronic version)'
				langMessage2 = 'Price on request'
				break;
			default:
				langMessage1 = '(электронная версия)'
				langMessage2 = 'Цена по запросу'
		}

		// Добавляем контент на страницу
		fetch('/local/templates/exsolcom/ilab/ajax/getModalKpContent.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({code: item.getAttribute('data-id'), language: languageID})
		})
			.then(response => response.json())
			.then(data => {
				let content = data.CONTENT;
				content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

				const img = data.IMAGE

				if (!content) {
					modalKp.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT;
				} else {
					modalKp.querySelector('.i_modal-content').innerHTML = content;
				}

				modalKp.querySelector('.i_modal-footer-price').classList.remove('idn')
				modalKp.querySelector('.i_modal-img').innerHTML = `<img src="${img}" />`;

				if (data.PRICE !== null) {
					modalKp.querySelector('.i_modal-footer-price').innerHTML = `<span>${data.PRICE} ₸<span class="text">${langMessage1}</span></span>`;
				} else {
					modalKp.querySelector('.i_modal-footer-price').innerHTML = `<span>${langMessage2}</span>`;
				}

				const url = new URL(window.location.href);
				url.searchParams.set('product', data.CODE); // Добавляем параметр "param" со значением "value"

				// Обновляем URL в адресной строке без перезагрузки страницы
				history.pushState(null, '', url.toString());

			})

	}

	modalKpBtn.forEach(item => {
		item.addEventListener('click', ()=>{openModalKp(item)})
	})

	const modalKpList = document.querySelectorAll('.i_modal-kp .i_container');
	const modalSerList = document.querySelectorAll('.i_modal .i_container');

	modalKpCloseBtn.addEventListener('click', (event) => {
		submitModal.classList.remove('active')
		overlay.classList.remove('active')
		formKpModal.classList.remove('active')
		modalKp.classList.remove('active')
		footerKpBtn.classList.remove('idn')
		footerKpBtnSecond.classList.remove('idn')
		footerProgrammBtn.classList.add('idn')
		documentBody.classList.remove('lock')
		vacationBtn.classList.add('idn')
		modalKpFooter.classList.remove('idn')
	})

	projectsItems.forEach((itemModal) => {
		itemModal.addEventListener('click', () => {
			modalKpList.forEach((modal) => {
				modal.scrollTop = 0;
			});

			console.log(123);
		});
	});


	const serviceModal = document.querySelectorAll('.i_services-item')
	const vacationModal = document.querySelectorAll('.i_vacantion-item')
	const mainServiceModal = document.querySelectorAll('.i_our-services-block')
	const blogModal = document.querySelectorAll('.product-item')
	const newsModal = document.querySelectorAll('.news-page-item')

	serviceModal.forEach((itemSer) => {
		itemSer.addEventListener('click', () => {
			modalSerList.forEach((modal) => {
				modal.scrollTop = 0;
			});
		})
	});
	vacationModal.forEach((itemVAc) => {
		itemVAc.addEventListener('click', () => {
			modalKpList.forEach((modal) => {
				modal.scrollTop = 0;
			});
		})
	});
	mainServiceModal.forEach((itemVAc) => {
		itemVAc.addEventListener('click', () => {
			modalSerList.forEach((modal) => {
				modal.scrollTop = 0;
			});
		})
	});
	blogModal.forEach((itemVAc) => {
		itemVAc.addEventListener('click', () => {
			modalKpList.forEach((modal) => {
				modal.scrollTop = 0;
			});
		})
	});
	newsModal.forEach((itemVAc) => {
		itemVAc.addEventListener('click', () => {
			modalKpList.forEach((modal) => {
				modal.scrollTop = 0;
			});
		})
	});
	// FORM KP

	const formKp = document.querySelectorAll('#form-kp-btn')
	const formKpSecond = document.querySelectorAll('#form-kp-btnSecond')
	const formKpModal = document.querySelector('.i_form-kp')
	const formKpCloseBtn = formKpModal.querySelector('.i_submit-close')

	const formVcModal = document.querySelector('.i_form-vc')
	const formVcCloseBtn = formVcModal.querySelector('.i_form-vc-close')

	// Функция для удаления параметров из ссылки
	function deleteParamsFromUrl(){
		// Получаем текущий URL
		const currentUrl = new URL(window.location.href);
		// Удаляем все параметры
		currentUrl.search = '';
		// Обновляем URL без перезагрузки страницы
		history.replaceState(null, '', currentUrl.href);
	}


	formKp.forEach(item => {
		item.addEventListener('click', () => {
			modal.classList.remove('active')
			modalKp.classList.remove('active')
			submitModal.classList.remove('active')
			formKpModal.classList.add('active')
			overlay.classList.add('active')
			sideMenu.classList.remove('show')
			language.classList.remove('expanded');
			circle.classList.remove('wide');
			circle2.classList.remove('wide');
			circle3.classList.remove('wide');
			footerProgrammBtn.classList.add('idn')
			footerKpBtn.classList.remove('idn')
			footerKpBtnSecond.classList.remove('idn')
			vacationBtn.classList.add('idn')
			documentBody.classList.add('lock')
		})
	})

	// BTN abridged version
	formKpSecond.forEach(item => {
		item.addEventListener('click', () => {
			formKpModal.classList.add('active')
			modalKp.classList.remove('active')
		})
	})

	formKpCloseBtn.addEventListener('click', (event) => {
		submitModal.classList.remove('active')
		overlay.classList.remove('active')
		formKpModal.classList.remove('active')
		documentBody.classList.remove('lock')
		vacationBtn.classList.add('idn')
		modalKpFooter.classList.remove('idn')

		deleteParamsFromUrl()
	})


	//OVERLAY
	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			overlay.classList.remove('active')
			modal.classList.remove('active')
			sideMenu.classList.remove('show')
			submitModal.classList.remove('active')
			formKpModal.classList.remove('active')
			modalKp.classList.remove('active')
			footerKpBtn.classList.remove('idn')
			footerKpBtnSecond.classList.remove('idn')
			footerProgrammBtn.classList.add('idn')
			documentBody.classList.remove('lock')
			vacationBtn.classList.add('idn')
			modalKpFooter.classList.remove('idn')
			formVcModal.classList.remove('active')

			deleteParamsFromUrl()
		}
	})

	document.addEventListener('click', (event) => {
		if (event.target.classList.contains('i_overlay')) {
			overlay.classList.remove('active')
			modal.classList.remove('active')
			submitModal.classList.remove('active')
			formKpModal.classList.remove('active')
			modalKp.classList.remove('active')
			footerKpBtn.classList.remove('idn')
			footerKpBtnSecond.classList.remove('idn')
			footerProgrammBtn.classList.add('idn')
			documentBody.classList.remove('lock')
			vacationBtn.classList.add('idn')
			modalKpFooter.classList.remove('idn')
			formVcModal.classList.remove('active')

			deleteParamsFromUrl()
		}

		// if(!event.target.classList.contains('i_side-menu') || !event.target.closest('.i_side-menu')
		// 	&& !event.target.classList.contains('i_header-burger') || !event.target.closest('.i_header-burger')){
		// 	sideMenu.classList.remove('show')
		// }

		if (
			(!event.target.classList.contains('i_header-burger') && !event.target.closest('.i_header-burger'))
			&&
			(!event.target.classList.contains('i_side-menu') && !event.target.closest('.i_side-menu'))
			&&
			(!event.target.classList.contains('i_footer-right-more-icon_2') && !event.target.closest('.i_footer-right-more-icon_2'))

		) {
			sideMenu.classList.remove('show')
		}
	})

	modalClose.addEventListener('click', () => {
		overlay.classList.remove('active')
		modal.classList.remove('active')
		documentBody.classList.remove('lock')
		modalKpFooter.classList.remove('idn')

		deleteParamsFromUrl()
	})

	// I_BLOG DROPDOWN

	const blogMenu = document.querySelector('.i_blog-menu')
	blogMenu?.addEventListener('click', () => {
		blogMenu.parentElement.classList.toggle('i_blog-open-dropdown');
	})


	// HISTORY
	const iSeoTabs = document.querySelectorAll('.i_seo-dates-switch')
	const iSeoDates = document.querySelectorAll('.i_seo-dates')
	const iSeoBlock = document.querySelector('.i_seo-events')

	iSeoTabs.forEach(item => {
		item.addEventListener('click', () => {
			iSeoTabs.forEach(tab => tab.classList.remove('check'));
			item.classList.add('check');
			// iSeoBlock.scrollIntoView({
			// 	behavior: 'smooth',
			// 	block: 'start'
			// });
		});

	});

	iSeoTabs.forEach(item => {
		item.addEventListener('click', () => {
			// iSeoTabs.classList.add('check');
			fetch('/local/templates/exsolcom/ilab/ajax/getHistoryContent.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({id: item.getAttribute('data-code'), language: languageID})
			})
				.then(response => response.json())
				.then(data => {
					const content = data.CONTENT;
					iSeoBlock.innerHTML = content;

					const url = new URL(window.location.href);
					url.searchParams.set('year', data.CODE); // Добавляем параметр "param" со значением "value"
					history.pushState(null, '', url.toString());
				})
		})
	})

	function initHistoryContent(){
		if(iSeoBlock){
			const params = new URLSearchParams(window.location.search);
			let year  = params.get("year")

			fetch('/local/templates/exsolcom/ilab/ajax/getHistoryContent.php', {
				method: 'POST',
				headers:{
					'Content-Type': 'application/json'
				},
				body:JSON.stringify({id: year, language: languageID})
			})
				.then(response => response.json())
				.then(data => {

					const content = data.CONTENT;
					iSeoBlock.innerHTML = content;

					if(data.status === false){
						year = 2025
					}

					const currentYear = document.querySelector(`div[data-code="${year}"]`);

					if(currentYear){
						if(params.get("year") !== null){
							currentYear.scrollIntoView({
								behavior: "smooth",
								block: "center"
							});
						}
						currentYear.classList.add('check')
					}

					initObservers();
				});
		}

	}



	initHistoryContent()


	// Модалка для услуг
	servicesItems.forEach(item => {
		item.addEventListener('click', () => {
			fetch('/local/templates/exsolcom/ilab/ajax/getServicesModalContent.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({id: item.getAttribute('data-id'), language: languageID})
			})
				.then(response => response.json())
				.then(data => {
					modal.querySelector('.i_modal-header-content').innerHTML = '';
					modal.querySelector('.i_modal-header-bottom').innerHTML = '';
					modal.querySelector('.i_modal-header-bottom').innerHTML = '';
					modal.querySelector('.i_modal-content').innerHTML = ''
					modal.querySelector('.i_modal-img').innerHTML = ''

					overlay.classList.add('active')
					modal.classList.add('active')
					vacationBtn.classList.add('idn')
					documentBody.classList.add('lock')

					let content = data.CONTENT;
					content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

					if (content) {
						// Регулярное выражение для поиска <div class="i_modal-preview">...</div>
						const modalPreviewRegex = /<div class="i_modal-preview">[\s\S]*?<\/div>/;
						const modalPreviewContentRegex = /<span class="i_modal-preview-content">[\s\S]*?<\/span>/;
						const modalPreviewEndingRegex = /<span class="i_modal-preview-ending">[\s\S]*?<\/span>/;
						// Найти совпадение
						const matchPreview = content.match(modalPreviewRegex);
						const matchPreviewContent = content.match(modalPreviewContentRegex);
						const matchPreviewEnding = content.match(modalPreviewEndingRegex);

						let modalPreviewContent = '';
						let modalPreviewContentContent = '';
						let modalPreviewContentEnding = '';
						let otherContent = '';

						if (matchPreviewContent) {
							// Совпадение найдено
							modalPreviewContentContent = matchPreviewContent[0];
							// Остальной контент
							otherContent = content.replace(modalPreviewContentContent, '').trim();
						}

						if (matchPreviewEnding) {
							// Совпадение найдено
							modalPreviewContentEnding = matchPreviewEnding[0];
							// Остальной контент
							otherContent = content.replace(modalPreviewContentEnding, '').trim();
						}

						if (matchPreview) {
							// Совпадение найдено
							modalPreviewContent = matchPreview[0];
							// Остальной контент
							otherContent = content.replace(modalPreviewContent, '').trim();
						} else {
							// Совпадение не найдено, все содержимое остается в otherContent
							otherContent = content;
						}


						modal.querySelector('.i_modal-header-content').innerHTML += modalPreviewContent;
						modal.querySelector('.i_modal-header-bottom').innerHTML += modalPreviewContentContent;
						modal.querySelector('.i_modal-header-bottom').innerHTML += modalPreviewContentEnding;

						modal.querySelector('.i_modal-content').innerHTML = otherContent


						modal.querySelectorAll('.i_modal-content #form-kp-btn').forEach(item => {
							item.addEventListener('click', () => {
								modal.classList.remove('active')
								modalKp.classList.remove('active')
								submitModal.classList.remove('active')
								formKpModal.classList.add('active')
								overlay.classList.add('active')
								sideMenu.classList.remove('show')
								language.classList.remove('expanded');
								circle.classList.remove('wide');
								circle2.classList.remove('wide');
								circle3.classList.remove('wide');
								vacationBtn.classList.add('idn')
							})
						})

					} else {
						modal.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT
						modal.querySelector('.i_modal-header-content').innerHTML = data.NAME
					}

					modal.querySelector('.i_modal-img').innerHTML = `<img src="${data.IMAGE}" alt="${data.NAME}">`

					const url = new URL(window.location.href);
					url.searchParams.set('service', data.CODE); // Добавляем параметр "param" со значением "value"

					// Обновляем URL в адресной строке без перезагрузки страницы
					history.pushState(null, '', url.toString());
				})
		})
	})

	function openDetailModal(item, detailItem) {
		item.addEventListener('click', () => {
			fetch('/local/templates/exsolcom/ilab/ajax/getProjectElementModalContent.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					id: detailItem ? item.getAttribute('data-id') : item.getAttribute('id'),
					iblockId: item.getAttribute('data_iblock_id'),
					language: languageID
				})
			})
				.then(response => response.json())
				.then(data => {
					modalKp.querySelector('.i_modal-footer-price').classList.add('idn')
					modalKp.querySelector('.i_modal-content').innerHTML = ''
					modalKp.querySelector('.i_modal-img').innerHTML = ''

					overlay.classList.add('active')
					modalKp.classList.add('active')
					documentBody.classList.add('lock')

					let content = data.CONTENT;

					content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

					if (!content) {
						modalKp.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT;
					} else {
						modalKp.querySelector('.i_modal-content').innerHTML = content;
					}

					modalKp.querySelector('.i_modal-img').innerHTML = `<img src="${data.IMAGE}" alt="${data.NAME}">`

					if (!detailItem) {
						footerKpBtn.classList.add('idn')
						footerKpBtnSecond.classList.add('idn')
						footerProgrammBtn.classList.remove('idn')

						const url = new URL(window.location.href);
						url.searchParams.set('projects', data.CODE); // Добавляем параметр "param" со значением "value"

						// Обновляем URL в адресной строке без перезагрузки страницы
						history.pushState(null, '', url.toString());

						// навешиваем обработчик на кнопку для перехода на страницу с программным продуктом
						footerProgrammBtn.addEventListener('click', () => {
							let link = ''

							if(languageID === 'ru'){
								link = `http://exsolcom.kz/programm-products/?product=${data.PROGRAMM_LINK !== null ? data.PROGRAMM_LINK : ''}`
							}else{
								link = `http://exsolcom.kz/${languageID}/programm-products/?product=${data.PROGRAMM_LINK !== null ? data.PROGRAMM_LINK : ''}`
							}
							window.location.href = link
						})
					}else{
						const url = new URL(window.location.href);
						url.searchParams.set(item.getAttribute('data_modal_name'), data.CODE); // Добавляем параметр "param" со значением "value"

						// Обновляем URL в адресной строке без перезагрузки страницы
						history.pushState(null, '', url.toString());
					}
				})
		})
	}

	detailModalItem?.forEach(item => openDetailModal(item, true))
	projectsItems?.forEach(item => openDetailModal(item, false))

	function getProgrammId() {
		// Получаем текущий URL
		const url = new URL(window.location.href);

		// Проверяем, находимся ли мы на странице programm-products
		if (url.pathname.includes('programm-products')) {
			// Создаем объект URLSearchParams
			const params = new URLSearchParams(url.search);

			// Получаем значение параметра programm_id
			const programmId = params.get('product');

			let langMessage1 = ''
			let langMessage2 = ''

			switch (languageID) {
				case "ru" :
					langMessage1 = '(электронная версия)'
					break;
				case "kz" :
					langMessage1 = '(электрондық нұсқа)'
					break;
				case "en" :
					langMessage1 = '(electronic version)'
					break;
				default:
					langMessage1 = '(электронная версия)'
			}

			if (programmId && programmId !== 'undefined') {
				modal.classList.remove('active')
				submitModal.classList.remove('active')
				formKpModal.classList.remove('active')
				modalKp.classList.add('active')
				overlay.classList.add('active')
				documentBody.classList.add('lock')
				footerKpBtn.classList.remove('idn')
				vacationBtn.classList.add('idn')

				modalKp.querySelector('.i_modal-content').innerHTML = '';

				// Добавляем контент на страницу
				fetch('/local/templates/exsolcom/ilab/ajax/getModalKpContent.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({code: programmId, language: languageID})
				})
					.then(response => response.json())
					.then(data => {
						let content = data.CONTENT;
						content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

						const img = data.IMAGE

						if (!content) {
							modalKp.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT;
						} else {
							modalKp.querySelector('.i_modal-content').innerHTML = content;
						}

						if (data.PRICE) {
							modalKp.querySelector('.i_modal-footer-price').classList.remove('idn')
						} else {
							modalKp.querySelector('.i_modal-footer-price').classList.add('idn')
						}


						modalKp.querySelector('.i_modal-img').innerHTML = `<img src="${img}" />`;
						modalKp.querySelector('.i_modal-footer-price').innerHTML = `<span>${data.PRICE} ₸<span class="text">${langMessage1}</span></span>`;
					})
			}

		} else {
			return null;
		}
	}

	// Вызов функции
	getProgrammId();

	function getDetailId(param, iblockID, detailItem, vacantion, partners){
		// Получаем текущий URL
		const url = new URL(window.location.href);

		// Проверяем, находимся ли мы на странице programm-products
		if (url.pathname.includes(param)) {
			// Создаем объект URLSearchParams
			const params = new URLSearchParams(url.search);

			// Получаем значение параметра programm_id
			const ID = params.get(param);

			if (ID) {
				modal.classList.remove('active')
				submitModal.classList.remove('active')
				formKpModal.classList.remove('active')
				modalKp.classList.add('active')
				overlay.classList.add('active')
				documentBody.classList.add('lock')
				footerKpBtn.classList.remove('idn')
				vacationBtn.classList.add('idn')
				modalKpFooter.classList.add('idn')
				modalKp.querySelector('.i_modal-content').innerHTML = '';
				modalKp.classList.add('pad')

				// Добавляем контент на страницу
				fetch('/local/templates/exsolcom/ilab/ajax/getProjectElementModalContentWithCode.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({code: ID, iblockId: iblockID, language: languageID})
				})
					.then(response => response.json())
					.then(data => {
						modalKp.querySelector('.i_modal-footer-price').classList.add('idn')
						modalKp.querySelector('.i_modal-content').innerHTML = ''
						modalKp.querySelector('.i_modal-img').innerHTML = ''

						overlay.classList.add('active')
						modalKp.classList.add('active')
						documentBody.classList.add('lock')

						let content = data.CONTENT;

						content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

						if (!content) {
							modalKp.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT;
						} else {
							modalKp.querySelector('.i_modal-content').innerHTML = content;
						}

						modalKp.querySelector('.i_modal-img').innerHTML = `<img src="${data.IMAGE}" alt="${data.NAME}">`

						if (!detailItem) {
							footerKpBtn.classList.add('idn')
							footerKpBtnSecond.classList.add('idn')
							footerProgrammBtn.classList.remove('idn')
							modalKpFooter.classList.remove('idn')
							modalKp.classList.remove('pad')


							// навешиваем обработчик на кнопку для перехода на страницу с программным продуктом
							footerProgrammBtn.addEventListener('click', () => {
								let link = '';

								if(languageID === 'ru'){
									link = `http://exsolcom.kz/programm-products/?product=${data.PROGRAMM_LINK !== null ? data.PROGRAMM_LINK : ''}`
								}else{
									link = `http://exsolcom.kz/${languageID}/programm-products/?product=${data.PROGRAMM_LINK !== null ? data.PROGRAMM_LINK : ''}`
								}
								window.location.href = link
							})
						}

						if(vacantion){
							vacationBtn.classList.remove('idn')
							footerKpBtn.classList.add('idn')
							footerKpBtnSecond.classList.add('idn')
							footerProgrammBtn.classList.add('idn')
							modalKpFooter.classList.remove('idn')
							modalKp.classList.remove('pad')
						}

						if(partners){
							modalKp.querySelector('#form-kp-btn').classList.remove('idn')
							footerProgrammBtn.classList.add('idn')
						}
					})
			}

		} else {
			return null;
		}
	}

	getDetailId('news', 1, true)
	getDetailId('blog', 2, true)
	getDetailId('projects', 5, false)
	getDetailId('our-cases', 11, false)
	getDetailId('vacantion', 8, false, true)
	getDetailId('partner', 4, false, false, true)


	function getServicesCode(){
		// Получаем текущий URL
		const url = new URL(window.location.href);

		// Проверяем, находимся ли мы на странице programm-products
		if (url.pathname.includes('services')) {
			// Создаем объект URLSearchParams
			const params = new URLSearchParams(url.search);

			// Получаем значение параметра programm_id
			const code = params.get('service');

			if (code) {
				fetch('/local/templates/exsolcom/ilab/ajax/getServicesModalContentWithCode.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({code: code, language: languageID})
				})
					.then(response => response.json())
					.then(data => {
						modal.querySelector('.i_modal-header-content').innerHTML = '';
						modal.querySelector('.i_modal-header-bottom').innerHTML = '';
						modal.querySelector('.i_modal-header-bottom').innerHTML = '';
						modal.querySelector('.i_modal-content').innerHTML = ''
						modal.querySelector('.i_modal-img').innerHTML = ''

						overlay.classList.add('active')
						modal.classList.add('active')
						vacationBtn.classList.add('idn')
						documentBody.classList.add('lock')

						let content = data.CONTENT;
						content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

						if (content) {
							// Регулярное выражение для поиска <div class="i_modal-preview">...</div>
							const modalPreviewRegex = /<div class="i_modal-preview">[\s\S]*?<\/div>/;
							const modalPreviewContentRegex = /<span class="i_modal-preview-content">[\s\S]*?<\/span>/;
							const modalPreviewEndingRegex = /<span class="i_modal-preview-ending">[\s\S]*?<\/span>/;
							// Найти совпадение
							const matchPreview = content.match(modalPreviewRegex);
							const matchPreviewContent = content.match(modalPreviewContentRegex);
							const matchPreviewEnding = content.match(modalPreviewEndingRegex);

							let modalPreviewContent = '';
							let modalPreviewContentContent = '';
							let modalPreviewContentEnding = '';
							let otherContent = '';

							if (matchPreviewContent) {
								// Совпадение найдено
								modalPreviewContentContent = matchPreviewContent[0];
								// Остальной контент
								otherContent = content.replace(modalPreviewContentContent, '').trim();
							}

							if (matchPreviewEnding) {
								// Совпадение найдено
								modalPreviewContentEnding = matchPreviewEnding[0];
								// Остальной контент
								otherContent = content.replace(modalPreviewContentEnding, '').trim();
							}

							if (matchPreview) {
								// Совпадение найдено
								modalPreviewContent = matchPreview[0];
								// Остальной контент
								otherContent = content.replace(modalPreviewContent, '').trim();
							} else {
								// Совпадение не найдено, все содержимое остается в otherContent
								otherContent = content;
							}


							modal.querySelector('.i_modal-header-content').innerHTML += modalPreviewContent;
							modal.querySelector('.i_modal-header-bottom').innerHTML += modalPreviewContentContent;
							modal.querySelector('.i_modal-header-bottom').innerHTML += modalPreviewContentEnding;

							modal.querySelector('.i_modal-content').innerHTML = otherContent


							modal.querySelectorAll('.i_modal-content #form-kp-btn').forEach(item => {
								item.addEventListener('click', () => {
									modal.classList.remove('active')
									modalKp.classList.remove('active')
									submitModal.classList.remove('active')
									formKpModal.classList.add('active')
									overlay.classList.add('active')
									sideMenu.classList.remove('show')
									language.classList.remove('expanded');
									circle.classList.remove('wide');
									circle2.classList.remove('wide');
									circle3.classList.remove('wide');
									vacationBtn.classList.add('idn')
								})
							})

						} else {
							modal.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT
							modal.querySelector('.i_modal-header-content').innerHTML = data.NAME
						}

						modal.querySelector('.i_modal-img').innerHTML = `<img src="${data.IMAGE}" alt="${data.NAME}">`

						// Обновляем URL в адресной строке без перезагрузки страницы
						history.pushState(null, '', url.toString());
					})
			}

		} else {
			return null;
		}
	}

	getServicesCode()

	document.querySelectorAll('.i_modal-footer-hd').forEach(item => {
		item.addEventListener('click', () => {
			modalKpFooter.classList.add('idn');
			vacationBtn.classList.add('idn')
			modalKp.classList.add('pad'); // убираем padding для карточек новости и блога
		})
	})

	document.querySelectorAll('.i_vacantion-item').forEach(item => {
		item.addEventListener('click', () => {
			footerKpBtn.classList.add('idn')
			vacationBtn.classList.remove('idn')
			footerKpBtnSecond.classList.add('idn')
		})
	})

	vacationBtn.addEventListener('click', () => {
		modal.classList.remove('active')
		submitModal.classList.remove('active')
		formKpModal.classList.remove('active')
		modalKp.classList.remove('active')
		overlay.classList.add('active')
		documentBody.classList.add('lock')
		footerKpBtn.classList.remove('idn')
		vacationBtn.classList.add('idn')
		formVcModal.classList.add('active')
	})

	formVcCloseBtn.addEventListener('click', () => {
		formVcModal.classList.remove('active')
		overlay.classList.remove('active')
	})


	//при изменении размера окна высота элементов .product-item будет автоматически подстраиваться под их ширину.
	const programm = {
		programmItems: document.querySelectorAll('.programm-item'),
		resize: function () {
			this.programmItems.forEach((product) => {
				const width = product.getBoundingClientRect().width;
				product.style.height = `${width}px`;
			});
		}
	};

	window.addEventListener('resize', () => programm.resize());

	programm.resize();
	//при изменении размера окна высота элементов .product-item будет автоматически подстраиваться под их ширину.
	const projects = {
		projectsItems: document.querySelectorAll('.i_projects-item'),
		resize: function () {
			this.projectsItems.forEach((project) => {
				const width = project.getBoundingClientRect().width;
				project.style.height = `${width}px`;
			});
		}
	};

	window.addEventListener('resize', () => projects.resize());

	projects.resize();


	//находим динамическую кномпу развернуть список
	const observer = new MutationObserver((mutationsList, observer) => {
		const showMore = document.querySelector('.show-more');
		const showLess = document.querySelector('.show-less');
		if (showMore && showLess) {
			const productsLength = document.querySelectorAll('.i_snippet-multi-table-item').length;
			let items = 4;

			// Изначально показываем первые 4 элемента
			const array = Array.from(document.querySelector('.i_snippet-multi-table-items').children);
			const initialVisItems = array.slice(0, items);
			initialVisItems.forEach(el => el.classList.remove('is-visible'));

			showMore.addEventListener('click', () => {
				items = Math.min(items + 3, productsLength); // Гарантируем, что items не превысит productsLength
				const visItems = array.slice(0, items);
				const boxBtn = document.querySelector('.i_snippet-multi-table-btn');
				const boxBtn2 = document.querySelector('.i_snippet-multi-table-btnSecond');

				visItems.forEach(el => el.classList.add('is-visible'));

				// Скрываем кнопку "Развернуть весь список" и показываем кнопку "Свернуть список", когда показаны все элементы
				if (items >= productsLength) {
					showMore.style.display = 'none';
					boxBtn.style.padding = '0';
					showLess.style.display = 'block';
					boxBtn2.style.padding = '30px 0';
				}
			});

			showLess.addEventListener('click', () => {
				items = productsLength - 3; // Показать все кроме последних 3
				const visItems = array.slice(0, items);
				const boxBtn = document.querySelector('.i_snippet-multi-table-btn');
				const boxBtn2 = document.querySelector('.i_snippet-multi-table-btnSecond');

				array.forEach(el => el.classList.remove('is-visible'));
				visItems.forEach(el => el.classList.remove('is-visible'));

				showMore.style.display = 'block';
				showLess.style.display = 'none';
				boxBtn.style.padding = '30px 0';
				boxBtn2.style.padding = '0';
			});

			observer.disconnect(); // Останавливаем наблюдение после нахождения элемента
		}
	});

	observer.observe(document.body, {childList: true, subtree: true});

	//Обьявляем переменные для раскрытия программных продуктов

	const showElse = document.querySelector('.show-else');
	const programmList = document.querySelectorAll('.product-item-list-col-3');

	showElse?.addEventListener('click', () => {
		programmList.forEach(item => {
			item.classList.toggle('visible');
			showElse.classList.add('idn');
		});
	});

	document.querySelectorAll('.i_item_compare').forEach((item) => {
		item.addEventListener('click', () => {
			let btn = item.querySelector('.j_item_compare');
			let dataID = btn.getAttribute('data-id');
			let modal = item.querySelector('.j_compare_success')

			if (!btn.classList.contains('i_item_compare_act') && modal.classList.contains('hd')) {
				modal.classList.remove('hd')
			} else if (modal.classList.contains('hd') && btn.classList.contains('i_item_compare_act')) {
				modal.classList.add('hd')
			} else {
				modal.classList.add('hd')
			}


			document.querySelectorAll('.i_item_compare').forEach((subitem) => {
				let subbtn = subitem.querySelector('.j_item_compare');
				let subdataID = subbtn.getAttribute('data-id');
				let submodal = subitem.querySelector('.j_compare_success')

				if (subdataID !== dataID) {
					submodal.classList.add('hd')
				}
			})

			checkActiveCompare()


			setTimeout(() => {
				modal.classList.add('hd')
			}, 8000)
		})
	})

	const checkActiveCompare = () => {
		setTimeout(()=>{
			const itemCompareAct = document.querySelectorAll('.i_item_compare_act')
			if(document.querySelector('#compare-button .count')){
				document.querySelector('#compare-button .count').textContent = `${itemCompareAct.length}`
			}
		}, 100)
	}

	checkActiveCompare()


	let programmItems = document.querySelectorAll('.programm-item');

	programmItems.forEach(item => {
		item.addEventListener('click', ({ target }) => {
			if (target.id !== 'form-kp-btn' &&
				!target.classList.contains('i_compare_but') &&
				!target.parentElement.classList.contains('i_compare_succes') &&
				!target.classList.contains('i_open_compare')) {
				openModalKp(item);
			}
		});
	})


});


$(document).ready(function () {
	// ---------------------------------------------------------------------------------------------------- [Compare]
	if ($.fn.ilab) {
		$.ilab('InputHidden', {
			compare: {
				input: true,
				update_button: true,
				button_class: '.j_item_compare',
				change_class: 'i_item_compare_act',
				change_text: {class: 'span'}
			},
			onBefore: function (o, f) {
			},
			onAfter: function (o, f) {
			}
		});
		$('body').on('click', '.j_item_compare', function () {
			$('.j_favorite_success').hide();
			$(this).ilab('CompareToggle', {
				loader_class: 'i_item_compare_load',
				change_class: 'i_item_compare_act',
				change_text: {class: 'span'},
				remove_second: true,
				button_class: '.j_item_compare',
				onBefore: function (o, f) {
				},
				onAfter: function (o, f) {
				}
			});
			return false;
		});
		$('body').on('click', '.j_open_compare', function () {
			var c = $('.j_compare');

			if (c.length)
				c.find('.j_compare_close').click();
			else {
				$.ilab('CompareModal', {
					onAfter: function () {
						if (typeof (i_buy_buttom) == 'function')
							i_buy_buttom();
					}
				});
			}
		});
	}
})

document.addEventListener('DOMContentLoaded', () => {
	const goTOP = document.querySelector('.go-top');

	goTOP.addEventListener('click', goTop);

	window.addEventListener('scroll', trackScroll);

	function trackScroll() {
		const offset = window.pageYOffset;
		const coords = document.documentElement.clientHeight;
		if (offset > coords) {
			goTOP.classList.add('go-top-show');
		} else {
			goTOP.classList.remove('go-top-show');
		}
	}

	function goTop() {
		if (window.pageYOffset > 0) {
			window.scrollBy(0, -25);
			setTimeout(goTop, 0);
		}
	}

	function activeContentMore() {
		const contentMore = document.querySelectorAll('.i_container-more');

		contentMore.forEach(item => {
			if (!item.dataset.listenerAdded) { // Проверяем, добавлен ли обработчик
				item.addEventListener('click', () => {
					item.classList.toggle('active');
					if(item.classList.contains('active')){
						const contentBlock = item.querySelector('.i_container-more-body')
						const contentBlockHeight = contentBlock.clientHeight + 2;

						item.style.maxHeight = `${contentBlockHeight + 16 + 30}px`
					}else{
						item.style.maxHeight = '20px'
					}
				});
				item.dataset.listenerAdded = "true"; // Отмечаем, что обработчик добавлен
			}
		});
	}

	// Запускаем для уже существующих элементов
	activeContentMore();

	// Создаем MutationObserver
	const observer = new MutationObserver(mutations => {
		mutations.forEach(mutation => {
			if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
				mutation.addedNodes.forEach(node => {
					if (node.nodeType === Node.ELEMENT_NODE) { // Убедимся, что это элемент
						if (node.classList.contains('i_container-more')) {
							// Если добавленный элемент — это i_container-more
							activeContentMore();
						} else {
							// Если элемент может содержать i_container-more внутри
							const nestedItems = node.querySelectorAll('.i_container-more');
							if (nestedItems.length > 0) {
								activeContentMore();
							}
						}
					}
				});
			}
		});
	});

	// Наблюдаем за изменениями в `body`
	observer.observe(document.body, {
		childList: true, // Слежение за добавлением и удалением дочерних узлов
		subtree: true    // Включение наблюдения за всем поддеревом
	});

	document.querySelectorAll('.b24-form-state-text p').forEach(el => {
		el.textContent = 'Благодарим за обращение , мы с Вами вскоре свяжемся !';
	});

});


