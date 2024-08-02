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
		breakpoints:{
			360:{
				slidesPerView:1,
				coverflowEffect: {
					rotate: 0,
					stretch: -10,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			480:{
				slidesPerView:2,
				coverflowEffect: {
					rotate: 0,
					stretch: -12,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			760:{
				slidesPerView:3,
				coverflowEffect: {
					rotate: 0,
					stretch: -14,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			1000:{
				slidesPerView:4,
				coverflowEffect: {
					rotate: 0,
					stretch: -16,
					depth: 30,
					modifier: 10,
					slideShadows: false
				},
			},
			1330:{
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
		sideMenu.classList.remove('show');
		circle2.classList.remove('wide');
		titleSearch2.classList.remove('active');
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


	//SIDE MENU

	const sideMenu = document.querySelector('.i_side-menu')
	const sideMenuButton = document.querySelectorAll('.i_header-burger')
	const sideMenuButtonFooter = document.querySelectorAll('.i_footer-right-more-icon_2')
	const sideMenuClose = document.querySelector('.i_side-menu-close')

	sideMenuButton.forEach(item => {
		item.addEventListener('click', () => {
			sideMenu.classList.add('show');
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
			sideMenu.classList.add('show');
		});
	})

	sideMenuClose.addEventListener('click', () => {
		sideMenu.classList.remove('show');
	})


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

	modalKpBtn.forEach(item => {
		item.addEventListener('click', () => {
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

			// Добавляем контент на страницу
			fetch('/local/templates/exsolcom/ilab/ajax/getModalKpContent.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({id: item.getAttribute('data-id')})
			})
				.then(response => response.json())
				.then(data => {
					let content = data.CONTENT;
					content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

					const img = data.IMAGE

					if(!content){
						modalKp.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT;
					}else{
						modalKp.querySelector('.i_modal-content').innerHTML = content;
					}

					if(data.PRICE){
						modalKp.querySelector('.i_modal-footer-price').classList.remove('idn')
					}else{
						modalKp.querySelector('.i_modal-footer-price').classList.add('idn')
					}

					modalKp.querySelector('.i_modal-img').innerHTML = `<img src="${img}" />`;
					modalKp.querySelector('.i_modal-footer-price').innerHTML = `<span>${data.PRICE} ₸<span class="text">(электронная версия)</span></span>`;
				})
		})
	})


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

	// FORM KP

	const formKp = document.querySelectorAll('#form-kp-btn')
	const formKpSecond = document.querySelectorAll('#form-kp-btnSecond')
	const formKpModal = document.querySelector('.i_form-kp')
	const formKpCloseBtn = formKpModal.querySelector('.i_submit-close')

	const formVcModal = document.querySelector('.i_form-vc')
	const formVcCloseBtn = formVcModal.querySelector('.i_form-vc-close')


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
		}
	})

	modalClose.addEventListener('click', () => {
		overlay.classList.remove('active')
		modal.classList.remove('active')
		documentBody.classList.remove('lock')
		modalKpFooter.classList.remove('idn')
	})

	// I_BLOG DROPDOWN

	const blogMenu = document.querySelector('.i_blog-menu')
	blogMenu?.addEventListener('click', () => {
		blogMenu.parentElement.classList.toggle('i_blog-open-dropdown');
	})


	// HISTORY
	const iSeoTabs = document.querySelectorAll('.i_seo-dates-switch')
	const iSeoDates = document.querySelectorAll('.i_seo-dates')

	iSeoTabs.forEach(item => {
		item.addEventListener('click', () => {
			iSeoTabs.forEach(tab => tab.classList.remove('check'));
			item.classList.add('check');
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
				body: JSON.stringify({id: item.getAttribute('data-id')})
			})
				.then(response => response.json())
				.then(data => {
					const content = data.CONTENT;
					document.querySelector('.i_seo-events').innerHTML = content;
				})
		})
	})

	// Модалка для услуг
	servicesItems.forEach(item => {
		item.addEventListener('click', () => {
			fetch('/local/templates/exsolcom/ilab/ajax/getServicesModalContent.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({id: item.getAttribute('data-id')})
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

					if(content){
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

						if(matchPreviewContent){
							// Совпадение найдено
							modalPreviewContentContent = matchPreviewContent[0];
							// Остальной контент
							otherContent = content.replace(modalPreviewContentContent, '').trim();
						}

						if(matchPreviewEnding){
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
						} else{
							// Совпадение не найдено, все содержимое остается в otherContent
							otherContent = content;
						}


						modal.querySelector('.i_modal-header-content').innerHTML += modalPreviewContent;
						modal.querySelector('.i_modal-header-bottom').innerHTML += modalPreviewContentContent;
						modal.querySelector('.i_modal-header-bottom').innerHTML += modalPreviewContentEnding;

						modal.querySelector('.i_modal-content').innerHTML = otherContent


						modal.querySelectorAll('.i_modal-content #form-kp-btn').forEach(item => {
							item.addEventListener('click', ()=>{
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

					}else{
						modal.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT
						modal.querySelector('.i_modal-header-content').innerHTML = data.NAME
					}

					modal.querySelector('.i_modal-img').innerHTML = `<img src="${data.IMAGE}" alt="${data.NAME}">`
				})
		})
	})

	function openDetailModal(item, detailItem){
		item.addEventListener('click', () => {
			fetch('/local/templates/exsolcom/ilab/ajax/getProjectElementModalContent.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					id: detailItem ? item.getAttribute('data-id') : item.getAttribute('id'),
					iblockId: item.getAttribute('data_iblock_id')
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

					if(!content){
						modalKp.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT;
					}else{
						modalKp.querySelector('.i_modal-content').innerHTML = content;
					}

					modalKp.querySelector('.i_modal-img').innerHTML = `<img src="${data.IMAGE}" alt="${data.NAME}">`

					if(!detailItem){
						footerKpBtn.classList.add('idn')
						footerKpBtnSecond.classList.add('idn')
						footerProgrammBtn.classList.remove('idn')

						// навешиваем обработчик на кнопку для перехода на страницу с программным продуктом
						footerProgrammBtn.addEventListener('click', () => {
							window.location.href = `http://new.exsolcom.kz/programm-products/?programm_id=${data.PROGRAMM_LINK !== null ? data.PROGRAMM_LINK : ''}`
						})
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
			const programmId = params.get('programm_id');

			if(programmId){
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
					body: JSON.stringify({id: programmId})
				})
					.then(response => response.json())
					.then(data => {
						let content = data.CONTENT;
						content = content !== false ? content.replace(/<\?[\s\S]*?\?>/g, '') : false;

						const img = data.IMAGE

						if(!content){
							modalKp.querySelector('.i_modal-content').innerHTML = data.PREVIEW_TEXT;
						}else{
							modalKp.querySelector('.i_modal-content').innerHTML = content;
						}

						if(data.PRICE){
							modalKp.querySelector('.i_modal-footer-price').classList.remove('idn')
						}else{
							modalKp.querySelector('.i_modal-footer-price').classList.add('idn')
						}

						modalKp.querySelector('.i_modal-img').innerHTML = `<img src="${img}" />`;
						modalKp.querySelector('.i_modal-footer-price').innerHTML = `<span>${data.PRICE} ₸<span class="text">(электронная версия)</span></span>`;
					})
			}

		} else {
			return null;
		}
	}

	// Вызов функции
	getProgrammId();


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
        resize: function (){
            this.programmItems.forEach((product) => {
                const width = product.getBoundingClientRect().width;
                product.style.height = `${width}px`;
            });
        }
    };

    window.addEventListener('resize', () => programm.resize());

    programm.resize();



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
				items = Math.min(items + 2, productsLength); // Гарантируем, что items не превысит productsLength
				const visItems = array.slice(0, items);
				const boxBtn = document.querySelector('.i_snippet-multi-table-btn');

				visItems.forEach(el => el.classList.add('is-visible'));

				// Скрываем кнопку "Показать больше" и показываем кнопку "Свернуть список", когда показаны все элементы
				if (items >= productsLength) {
					showMore.style.display = 'none';
					showLess.style.display = 'block';
					boxBtn.style.padding = '50px 0 60px 0';
				}
			});

			showLess.addEventListener('click', () => {
				items = productsLength - 3; // Показать все кроме последних 3
				const visItems = array.slice(0, items);
				const boxBtn = document.querySelector('.i_snippet-multi-table-btn');

				array.forEach(el => el.classList.remove('is-visible'));
				visItems.forEach(el => el.classList.remove('is-visible'));

				showMore.style.display = 'block';
				showLess.style.display = 'none';
				boxBtn.style.padding = 'unset';
			});

			observer.disconnect(); // Останавливаем наблюдение после нахождения элемента
		}
	});

	observer.observe(document.body, { childList: true, subtree: true });

});

