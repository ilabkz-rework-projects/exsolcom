/*!
	---------- ilab - jQuery Plugin exclusively for Bitrix
	---------- version: 0.0.1 Beta (Aug 2016)
	---------- @requires jQuery v2.1.3
	----------
	---------- Copyright.php 2016 iLab - info@ilab.kz
	$.ilab() = function | Вызов - $.ilab();
	$.fn.ilab() = function | Вызов - $('selector').ilab();
!*/

(function( ilab, $, undefined ) {
	"use strict";

// ---------------------------------------------------------------------------------------------------- Prototype
	Array.prototype._deleteEach = function ( v ) {
		for ( var i = this.length;i; this[ --i ] === v && this.splice( i, 1 ));
		return this;
	};
// ---------------------------------------------------------------------------------------------------- Prototype








	

// ---------------------------------------------------------------------------------------------------- Private Property
	var __DIR__ = '/local/templates/exsolcom/ilab/modules/compare/';

// ---------------------------------------------------------------------------------------------------- Public Property

// ---------------------------------------------------------------------------------------------------- Public params
	ilab.params['CompareModal'] = {
		vKEY					: 'CompareModal_v0.0.1',

		this					: undefined,
	}
	ilab.params['CompareToggle'] = {
		vKEY					: 'CompareToggle_v0.0.1',

		this					: undefined,
		iblock_id				: false,
		id						: false,
		button_class			: false,
		loader_class			: false,
		change_class			: false,
		count_class				: '.j_ct_count',
		stiker_class			: '.j_item_compare_stiker',
		change_text				: false,
		remove_second			: false,
	}
	ilab.params['CompareAdd'] = {
		vKEY					: 'CompareAdd_v0.0.1',

		this					: undefined,
		iblock_id				: false,
		id						: false,
		button_class			: false,
		loader_class			: false,
		change_class			: false,
		count_class				: '.j_ct_count',
		stiker_class			: '.j_item_compare_stiker',
		change_text				: false,
		remove_second			: false,
	}
	ilab.params['CompareRemove'] = {
		vKEY					: 'CompareRemove_v0.0.1',

		this					: undefined,
		iblock_id				: false,
		id						: false,
		remove_all				: false,
		button_class			: false,
		loader_class			: false,
		change_class			: false,
		count_class				: '.j_ct_count',
		stiker_class			: '.j_item_compare_stiker',
		change_text				: false
	}
	ilab.params['InputHidden'] = {
		vKEY					: 'InputHidden_v0.0.1',

		compare					: {
			input				: false,
			input_id			: 'ilab_compare',
			update_button		: false,
			button_class		: undefined,
			change_class		: undefined,
			stiker_class		: '.j_item_compare_stiker',
			change_text			: false
		},
		basket					: {
			input				: false,
			input_id			: 'ilab_basket',
			update_button		: false,
			button_class		: undefined,
			change_class		: undefined,
			change_text			: false
		}
	}
	ilab.params['UpdateButton'] = {
		vKEY					: 'UpdateButton_v0.0.1',

		compare					: {
			input_id			: 'ilab_compare',
			button_class		: undefined,
			change_class		: undefined,
			stiker_class		: '.j_item_compare_stiker',
			change_text			: false
		},
		basket					: {
			input_id			: 'ilab_basket',
			button_class		: undefined,
			change_class		: undefined,
			change_text			: false
		}
	}
// ---------------------------------------------------------------------------------------------------- Public info Method
	ilab.info['CompareModal'] = function ( o,s ) {
		console.groupCollapsed('Help method : CompareModal');
			console.info(
				'Method : CompareModal \n'+
				'IncludeComponent: bitrix:catalog.compare.result'
			);
			console.groupCollapsed('Options :');
				_F._log('\tthis: (this || $(this)) - object button, NOTE - only $.ilab() method,', 'g');
			console.groupEnd();
			console.groupCollapsed('this function :');
				console.log(this);
			console.groupEnd();
			console.groupCollapsed('this :');
				console.log(o.this);
			console.groupEnd();
			console.groupCollapsed('option :');
				console.log(o);
			console.groupEnd();
		console.groupEnd();

		return s;
	}
	ilab.info['CompareToggle'] = function( o,s ) {
		console.groupCollapsed('Help method : CompareToggle');
			console.info(
				'Method : CompareToggle \n'+
				'IncludeComponent: bitrix:catalog.compare.list'
			);
			console.groupCollapsed('Options :');
				_F._log('\tthis: (this || $(this)) - object button, NOTE - only $.ilab() method,', 'g');
				_F._log('\t*iblock_id: (iblock_id) - product,', 'r');
				_F._log('\t*id: (id) - product,', 'r');
				_F._log('\tbutton_class: (classname) - button class \'add compare\',', 'b');
				_F._log('\tloader_class: (classname) - loader class,', 'b');
				_F._log('\tchange_class: (classname) - this.addClass(classname) to button,', 'b');
				_F._log('\tchange_text: (something text) || {class:(children classname), txt_default:(something text), txt_change:(something text)} - change_text to button,', 'b');
				_F._log('\tremove_second: (true) - remove second click' , 'g');
			console.groupEnd();
			console.groupCollapsed('this function :');
				console.log(this);
			console.groupEnd();
			console.groupCollapsed('this :');
				console.log(o.this);
			console.groupEnd();
			console.groupCollapsed('option :');
				console.log(o);
			console.groupEnd();
		console.groupEnd();

		return s;
	}
	ilab.info['CompareAdd'] = function( o,s ) {
		console.groupCollapsed('Help method : CompareAdd');
			console.info(
				'Method : addCompare \n'+
				'IncludeComponent: bitrix:catalog.compare.list'
			);
			console.groupCollapsed('Options :');
				_F._log('\tthis: (this || $(this)) - object button, NOTE - only $.ilab() method,', 'g');
				_F._log('\t*iblock_id: (iblock_id) - product,', 'r');
				_F._log('\t*id: (id) - product,', 'r');
				_F._log('\tbutton_class: (classname) - button class \'add compare\',', 'b');
				_F._log('\tloader_class: (classname) - loader class,', 'b');
				_F._log('\tchange_class: (classname) - this.addClass(classname) to button,', 'b');
				_F._log('\tchange_text: (something text) || {class:(children classname), txt_default:(something text), txt_change:(something text)} - change_text to button,', 'b');
				_F._log('\tremove_second: (true) - remove second click' , 'g');
			console.groupEnd();
			console.groupCollapsed('this function :');
				console.log(this);
			console.groupEnd();
			console.groupCollapsed('this :');
				console.log(o.this);
			console.groupEnd();
			console.groupCollapsed('option :');
				console.log(o);
			console.groupEnd();
		console.groupEnd();

		return s;
	}
	ilab.info['CompareRemove'] = function ( o,s ) {
		console.groupCollapsed('Help method : CompareAdd');
			console.info(
				'Method : CompareAdd \n'+
				'$_SESSION delete method'
			);
			console.groupCollapsed('Options :');
				_F._log('\tthis: (this || $(this)) - object button, NOTE - only $.ilab() method,', 'g');
				_F._log('\tiblock_id: (iblock_id) - product,', 'r');
				_F._log('\tid: (id) || (array [id, id, id]) - product,', 'r');
				_F._log('\tremove_all: (true) remove all product from compare list,', 'b');
				_F._log('\tbutton_class: (classname) - button class \'add compare\',', 'b');
				_F._log('\tloader_class: (classname) - loader class,', 'b');
				_F._log('\tchange_class: (classname) - this.removeClass(classname) to button,', 'b');
				_F._log('\tchange_text: (something text) || {class:(children classname), txt_default:(something text), txt_change:(something text)} - change_text to button', 'b');
			console.groupEnd();
			console.groupCollapsed('this function :');
				console.log(this);
			console.groupEnd();
			console.groupCollapsed('this :');
				console.log(o.this);
			console.groupEnd();
			console.groupCollapsed('option :');
				console.log(o);
			console.groupEnd();
		console.groupEnd();

		return s;
	}
	ilab.info['InputHidden'] = function ( o,s ) {
		console.groupCollapsed('Help method : InputHidden');
			console.info(
				'Method : InputHidden \n'+
				'Append before body input hidden. Change compare button.'
			);
			console.groupCollapsed('Options :');
				_F._log(
				'compare: { \n'+
					'\tinput: (true) add <input type=hidden> end of the page, \n'+
					'\tupdate_button: (true) update compare button, \n'+
					'\tinput_class: (#id) default='+o.compare.input_id+', \n'+
					'\tbutton_class: (classname) - button class \'add compare\', \n'+
					'\tchange_class: (classname) - this.addClass(classname) to button after reloading the page, \n'+
					'\tchange_text: {class:(children classname), txt_default:(something text), txt_change:(something text)} \n'+
				'},');
				_F._log(
				'basket: { \n'+
					'\tinput: (true) add <input type=hidden> end of the page, \n'+
					'\tupdate_button: (true) update compare button, \n'+
					'\tinput_class: (#id) default='+o.basket.input_id+', \n'+
					'\tbutton_class: (classname) - button class \'add compare\', \n'+
					'\tchange_class: (classname) - this.addClass(classname) to button after reloading the page, \n'+
					'\tchange_text: {class:(children classname), txt_default:(something text), txt_change:(something text)} \n'+
				'}');
			console.groupEnd();
			console.groupCollapsed('this function :');
				console.log(this);
			console.groupEnd();
			console.groupCollapsed('this :');
				console.log(o.this);
			console.groupEnd();
			console.groupCollapsed('option :');
				console.log(o);
			console.groupEnd();
		console.groupEnd();

		return s;
	}
	ilab.info['UpdateButton'] = function ( o,s ) {
		console.groupCollapsed('Help method : CompareUpdateButton');
			console.info(
				'Method : CompareUpdateButton \n'+
				'Change compare button.'
			);
			console.groupCollapsed('Options :');
				_F._log('\tinput_class: (#id) default='+o.compare.input_id+',');
				_F._log('\tbutton_class: (classname) - button class \'add compare\',');
				_F._log('\tchange_class: (classname) - this.addClass(classname) to button after reloading the page,');
				_F._log('\tchange_text: {class:(children classname), txt_default:(something text), txt_change:(something text)}');
			console.groupEnd();
			console.groupCollapsed('this function :');
				console.log(this);
			console.groupEnd();
			console.groupCollapsed('this :');
				console.log(o.this);
			console.groupEnd();
			console.groupCollapsed('option :');
				console.log(o);
			console.groupEnd();
		console.groupEnd();

		return s;
	}
// ---------------------------------------------------------------------------------------------------- Public Method
	ilab.methods['CompareModal'] = function( o,s )
	{

		if( _F._cInput().data('co')>1 )
		{

			//_F._GetCss(__DIR__+'css/iCompareModal.css');// Style
			$('html').css('overflow','hidden');

			$.ajax({
				type		: 'POST',
				url			: __DIR__+'ajax/iCompareModal.php',
				data		: { KEY: o.vKEY },
				async		: false,
				success		: function(z)
				{
					if( z )
					{
						$('body').append('<div class="ilab_compare j_compare" style="display:none">'+
											'<div class="ilab_compare_close j_compare_close"></div>'+
											'<div class="ilab_compare_result j_compare_result"></div>'+
										'</div>').find('.j_compare_result').html(z);

						$('.j_compare').fadeIn(function(){
							_F._sw_comp_4();
							_F._sw_prop_4();
						});

						$(window).on('resize', _F._compResize);
					}

					// bitrix
					/*if( $('#bx-panel').length )
						$('.j_compare').css('top', '170px');*/

					s = true;
				}
			});

		} else {
			_F._hide();
			$('.j_compare_one').fadeIn().delay(10000).fadeOut(400);
		}

		return s;

	}
	ilab.methods['CompareToggle'] = function( o,s )
	{

		if( o.id && o.iblock_id )
		{

			var c		= _F._cInput();
			var setting = o;

			setting.onBefore = undefined;// TODO bugFix вызываются двойные отложенные функции onAfter/onBefore

			if( !c || c && o.remove_second && $.inArray(o.id, c.data('id'))==-1 )
			{

				setting.vKEY = 'CompareAdd_v0.0.1';
				setting.method = 'CompareAdd';

				s = $.ilab('CompareAdd', setting);

			} else if ( c && o.remove_second && $.inArray(o.id, c.data('id'))!=-1 ) {

				setting.vKEY = 'CompareRemove_v0.0.1';
				setting.method = 'CompareRemove';

				s = $.ilab('CompareRemove', setting);

			}

			setting.onAfter = undefined;// TODO bugFix вызываются двойные отложенные функции onAfter/onBefore

		} else
			console.error('Add the option to method CompareToggle.  Call in the console method $.ilab(\'CompareToggle\', { help: true }) for help.');

		return s;

	}
	ilab.methods['CompareAdd'] = function( o,s )
	{

		if( o.id && o.iblock_id )
		{

			var c = _F._cInput();

			$.ajax({
				type		: 'POST',
				url			: __DIR__+'ajax/iCompareAdd.php',
				data		: { iblock_id: o.iblock_id, id: o.id, KEY: o.vKEY, action: 'ADD_TO_COMPARE_LIST' },
				//async		: false,
				beforeSend	: function()
				{
					// loader
					if( o.this && o.loader_class )
						$(o.button_class+'[data-id='+o.id+']').addClass(o.loader_class);
				},
				success		: function(z)
				{

					if( o.this )
					{
						// change text button
						if( $.isPlainObject(o.change_text) && o.change_text.class && o.change_text.txt_change )
							$(o.button_class+'[data-id='+o.id+']').children(o.change_text.class).text(o.change_text.txt_change);
						else if( o.change_text )
							$(o.button_class+'[data-id='+o.id+']').text(o.change_text);

						// change class button
						if( o.change_class )
							$(o.button_class+'[data-id='+o.id+']').addClass(o.change_class);

						// stiker_class
						if( o.stiker_class && $(o.stiker_class+'[data-id='+o.id+']') )
							$(o.stiker_class+'[data-id='+o.id+']').fadeIn();

						// loader
						if( o.loader_class )
							$(o.button_class+'[data-id='+o.id+']').removeClass(o.loader_class);
					}

					_F._cCount( 'add',o.id );
					_F._cSSS_show(o.this);

					s = true;
				}
			});

			/*if( !c || c && o.remove_second && $.inArray(o.id, c.data('id'))==-1 )
			{



			} else if ( c && o.remove_second && $.inArray(o.id, c.data('id'))!=-1 ) {

				var setting					= o;
					setting.vKEY			= 'CompareRemove_v0.0.1';

					setting.onBefore		= undefined;// TODO bugFix вызываются двойные отложенные функции onAfter/onBefore
				s = $.ilab('CompareRemove', setting);
					setting.onAfter			= undefined;// TODO bugFix вызываются двойные отложенные функции onAfter/onBefore

			}*/

		} else
			console.error('Add the option to method CompareAdd.  Call in the console method $.ilab(\'CompareAdd\', { help: true }) for help.');

		return s;

	}
	ilab.methods['CompareRemove'] = function ( o,s )
	{

		if( o.id && o.iblock_id )
		{

			var c = _F._cInput();
			_F._hide();

			$.ajax({
				type		: 'POST',
				url			: __DIR__+'ajax/iCompareRemove.php',
				data		: { iblock_id: o.iblock_id, id: o.id, KEY: o.vKEY },
				//async		: false,
				beforeSend	: function()
				{
					// loader
					if( o.this && o.loader_class )
						$(o.button_class+'[data-id='+o.id+']').addClass(o.loader_class);
				},
				success		: function(z)
				{
					if( o.this )
					{
						// change class button
						if( o.change_class )
							$(o.button_class+'[data-id='+o.id+']').removeClass(o.change_class);

						// change text button
						if( $.isPlainObject(o.change_text) && o.change_text.class && o.change_text.txt_default )
							$(o.button_class+'[data-id='+o.id+']').children(o.change_text.class).text(o.change_text.txt_default);


						// stiker_class
						if( o.stiker_class && $(o.stiker_class+'[data-id='+o.id+']') )
							$(o.stiker_class+'[data-id='+o.id+']').fadeOut();

						// loader
						if( o.loader_class )
							$(o.button_class+'[data-id='+o.id+']').removeClass(o.loader_class);
					}

					_F._cCount( 'remove',o.id );

					s = true;
				}
			});

		} else if( o.remove_all ) {

			var c = _F._cInput();
			_F._hide();

			$.ajax({
				type		: 'POST',
				url			: __DIR__+'ajax/iCompareRemove.php',
				data		: { remove_all: o.remove_all, KEY: o.vKEY },
				//async		: false,
				success		: function(z)
				{
					if( c && o.button_class )
					{
						$.each(c.data('id'), function(i,v) {
							var e = $(o.button_class+'[data-id='+v+']');
							if( e )
							{
								// o.change_class of data('change_class')
								if( !o.change_class && e.data('change_class') )
									o.change_class = e.data('change_class');
								// change_class button
								if( o.change_class )
									e.removeClass(o.change_class);

								// o.change_text of data('change_text')
								if( o.change_text && e.data('change_text') && typeof(e.data('change_text'))=='object' && typeof(o.change_text)=='object' )
									o.change_text = $.extend(true, {}, e.data('change_text'), o.change_text);// combine 2 objects
								// change text button
								if( $.isPlainObject(o.change_text) && o.change_text.class && o.change_text.txt_default )
									e.children(o.change_text.class).text(o.change_text.txt_default);

								// stiker_class
								if( o.stiker_class && $(o.stiker_class+'[data-id='+v+']') )
									$(o.stiker_class+'[data-id='+v+']').fadeOut();
							}
						});

						_F._cCount( 'remove_all',o.id );

					}

					s = true;
				}
			});

		} else
			console.error('Add the option to method - CompareRemove. Call in the console method $.ilab(\'CompareRemove\', { help: true }) for help.');

		return s;

	}
	/* OLD 08.2018
	ilab.methods['CompareAdd'] = function( o,s )
	{

		if( o.id && o.iblock_id )
		{

			var c = _cInput();

			if( !c || c && o.remove_second && $.inArray(o.id, c.data('id'))==-1 )
			{

				$.ajax({
					type		: 'POST',
					url			: __DIR__+'ajax/iCompareAdd.php',
					data		: { iblock_id: o.iblock_id, id: o.id, KEY: o.vKEY, action: 'ADD_TO_COMPARE_LIST' },
					//async		: false,
					beforeSend	: function()
					{
						// loader
						if( o.this && o.loader_class )
							$(o.this).addClass(o.loader_class);
					},
					success		: function(z)
					{
						if( o.this )
						{
							// change text button
							if( $.isPlainObject(o.change_text) && o.change_text.class && o.change_text.txt_change )
								$(o.this).children(o.change_text.class).text(o.change_text.txt_change);
							else if( o.change_text )
								$(o.this).text(o.change_text);

							// change class button
							if( o.change_class )
								$(o.this).addClass(o.change_class);

							// loader
							if( o.loader_class )
								$(o.this).removeClass(o.loader_class);
						}

						_cCount( 'add',o.id );
						_cSSS(o.this);

						s = true;
					}
				});

			} else if ( c && o.remove_second && $.inArray(o.id, c.data('id'))!=-1 ) {

				var setting					= o;
				setting.vKEY			= 'CompareRemove_v0.0.1';
				s = $.ilab('CompareRemove', setting);

			}

		} else
			console.error('Add the option to method CompareAdd.  Call in the console method $.ilab(\'CompareAdd\', { help: true }) for help.');

		return s;

	}*/
	/* OLD 08.2018
	ilab.methods['CompareRemove'] = function ( o,s )
	{

		if( o.id && o.iblock_id )
		{

			var c = _cInput();
			_hide();

			$.ajax({
				type		: 'POST',
				url			: __DIR__+'ajax/iCompareRemove.php',
				data		: { iblock_id: o.iblock_id, id: o.id, KEY: o.vKEY },
				//async		: false,
				beforeSend	: function()
				{
					// loader
					if( o.this && o.loader_class )
						$(o.this).addClass(o.loader_class);
				},
				success		: function(z)
				{
					if( o.this )
					{
						// change text button
						if( $.isPlainObject(o.change_text) && o.change_text.class && o.change_text.txt_default )
							$(o.this).children(o.change_text.class).text(o.change_text.txt_default);

						// change class button
						if( o.change_class )
							$(o.this).removeClass(o.change_class);

						// loader
						if( o.loader_class )
							$(o.this).removeClass(o.loader_class);
					}

					_cCount( 'remove',o.id );

					s = true;
				}
			});

		} else if( o.remove_all ) {

			var c = _cInput();
			_hide();

			$.ajax({
				type		: 'POST',
				url			: __DIR__+'ajax/iCompareRemove.php',
				data		: { remove_all: o.remove_all, KEY: o.vKEY },
				//async		: false,
				success		: function(z)
				{
					if( c && o.button_class )
					{
						$.each(c.data('id'), function(i,v) {
							var e = $(o.button_class+'[data-id="'+v+'"]');
							if( e )
							{
								// o.change_class of data('change_class')
								if( !o.change_class && e.data('change_class') )
									o.change_class = e.data('change_class');
								// change_class button
								if( o.change_class )
									e.removeClass(o.change_class);

								// o.change_text of data('change_text')
								if( o.change_text && e.data('change_text') && typeof(e.data('change_text'))=='object' && typeof(o.change_text)=='object' )
									o.change_text = $.extend(true, {}, e.data('change_text'), o.change_text);// combine 2 objects
								// change text button
								if( $.isPlainObject(o.change_text) && o.change_text.class && o.change_text.txt_default )
									e.children(o.change_text.class).text(o.change_text.txt_default);
							}
						});

						_cCount( 'remove_all',o.id );

					}

					s = true;
				}
			});

		} else
			console.error('Add the option to method - CompareRemove. Call in the console method $.ilab(\'CompareRemove\', { help: true }) for help.');

		return s;

	}*/
	ilab.methods['InputHidden'] = function ( o,s )
	{

		if( o.compare.input || o.basket.input )
		{

			$.ajax({
				type		: 'POST',
				url			: __DIR__+'ajax/iInputHidden.php',
				data		: { compare: o.compare.input, KEY: o.vKEY },
				async		: false,
				dataType	: 'json',
				success		: function(obj)
				{
					if( o.compare.input )
					{
						$('body').append('<input type="hidden" id="'+o.compare.input_id+'" data-id="['+obj.compare.id+']" data-co="'+obj.compare.count+'">');

						if( o.compare.update_button )
						{
							var o_compare			= o;
							o_compare.vKEY			='UpdateButton_v0.0.1';
							o_compare.compare.id	= obj.compare.id;

							ilab.methods['UpdateButton'].call(this, o_compare, s);
						}
					}

					if( o.basket.input )
					{
						/*if( !$.isEmptyObject(b_id) )
						{
							$.each(b_id, function(i,v){
								$('.j_buy[jq_id="'+v+'"]').hide(0)
										.siblings('.j_bought').fadeIn(400);
							});
						}*/
					}

					s = true;
				}
			});

			return s;

		} else
			console.error('Add the option to method - InputHidden. Call in the console method $.ilab(\'InputHidden\', { help: true }) for help.');

	}
	ilab.methods['UpdateButton'] = function ( o,s )
	{

		if( o.vKEY=='UpdateButton_v0.0.1' )
		{

			if( !o.compare.id && $('#'+o.compare.input_id).length )
				o.compare.id = $('#'+o.compare.input_id).data('id');

			if( o.compare.id && o.compare.button_class )
			{
				$.each(o.compare.id, function(i,v) {
					var e = $(o.compare.button_class+'[data-id='+v+']');
					if( e )
					{
						// o.compare.change_class of data('change_class')
						if( !o.compare.change_class && e.data('change_class') )
							o.compare.change_class = e.data('change_class');
						// change_class button
						if( o.compare.change_class )
							e.addClass(o.compare.change_class);

						// o.compare.change_text of data('change_text')
						if( !o.compare.change_text && e.data('change_text') )
							o.compare.change_text = e.data('change_text');
						else if( o.compare.change_text && e.data('change_text') && typeof(e.data('change_text'))=='object' && typeof(o.compare.change_text)=='object' )
							o.compare.change_text = $.extend(true, {}, e.data('change_text'), o.compare.change_text);// combine 2 objects
						// change text button
						if( $.isPlainObject(o.compare.change_text) )
							e.children(o.compare.change_text.class).text(o.compare.change_text.txt_change);
						else if( e && o.compare.change_text )
							e.text(o.compare.change_text);

						// stiker_class
						if( o.compare.stiker_class && $(o.compare.stiker_class+'[data-id='+v+']') )
							$(o.compare.stiker_class+'[data-id='+v+']').fadeIn();
					}
				});
			} else if ( false ) {

			}

		} else
			console.error('Add the option to method - UpdateButton. Call in the console method $.ilab(\'UpdateButton\', { help: true }) for help.');

		return s;
	}
// ---------------------------------------------------------------------------------------------------- Private Method
	var _F = {
		// Get style
		// Клик вне элемента
		_outsideElementHide : function ( cl )
		{
			$(document).click( function(ev) {
				if( $(ev.target).closest(cl).length ) 
					return;
				_F._hide();
				_F._close();
				ev.stopPropagation();
			});
		},
		_GetCss : function ( url )
		{
			if( url && !$('link[href="'+url+'"]').length )
				$('head').append('<link href="'+url+'" type="text/css" rel="stylesheet" >');
			else
				return false;
		},
		/*_GetScript : function (url)
		{
			if( url )
				$.ajax({
					type: 'GET',
					url: url,
					dataType:"script",
					cache: true
				});
			else
				return false;
		},*/
		// Console.log()
		_log : function ( m,s )
		{
			var style = {
				'r': 'font-weight:bold;font-size:120%;color:#FA3535;',
				'b': 'font-weight:bold;font-size:120%;color:#111111;',
				'g': 'font-weight:bold;font-size:120%;color:#5B945B;',
				'd': 'font-weight:bold;font-size:120%;color:#9F9F9F;'
			}
			if ( !style[s] )
				s = 'd';
			console.log ( '%c'+m, style[s] );
		},
		// Input hidden
		_cInput : function ()
		{
			if( $('#ilab_compare').length )
				return $('#ilab_compare');
			else
				return false;
		},
		_cCount : function ( s,id )
		{
			if( $('#ilab_compare').length )
			{

				var c	= $('#ilab_compare');
				var cco	= $('.j_comp_count:first');
				var ccfp = $('.j_fp_comp_count');

				// add id input hidden
				if( s=='add' )
				{
					c.data('co', c.data('co')+1);
					c.data('id').push(id);
				} else if( s=='remove' ) {
					c.data('co', c.data('co')-1);
					c.data('id', c.data('id')._deleteEach(id));
				} else if( s=='remove_all' ) {
					c.data('co', 0);
					c.data('id', []);
				}

				if( cco.length )
				{
					$('.j_comp_count').each(function(){
						var th = $(this);
						var un = th.siblings('.j_comp_cunit');

						th.text( c.data('co') );

						if( un.length )
							un.text( _F._plural(c.data('co'), th.data('message')) );
					});					
				}

				/* OLD 08.2018
				if( cco.length )
					$('.j_comp_count').text( c.data('co')+' '+_F._plural(c.data('co'), cco.data('message')) );*/

				if( ccfp.length )
				{
					if($(window).width() > 1400)
						$('.j_fp_comp_count').text('('+c.data('co')+')');
					else
						$('.j_fp_comp_count').text(c.data('co'));
				}

			} else
				return false;
		},
/* ---------------------------------------------------------------------------------------------------- TODO*/
		_cSSS_message : function ( th )
		{
			var c = _F._cInput();

			if( c.data('co') < 2)
				th.find('.j_me2').hide().siblings('.j_me1').show();
			else
				th.find('.j_me1').hide().siblings('.j_me2').show();
		},
		_cSSS_show : function ( th )
		{
			var cs = th.siblings('.j_compare_success').length ? th.siblings('.j_compare_success') : $('.j_compare_success[data-id='+th.data('id')+']');

			if( cs.length )
			{
				_F._hide();
				_F._cSSS_message(cs);

				// cs.fadeIn().delay(10000).fadeOut(400);
			} else
				return false;
		},
		_cSSS_toggle : function ( th )
		{
			var cs = $('.j_compare_success[data-id='+th.data('id')+']');/*th.siblings('.j_compare_success').length ? th.siblings('.j_compare_success') :*/

			if( cs.length )
			{
				if( $('.j_favorite_success[data-id='+th.data('id')+']').length )
					$('.j_favorite_success[data-id='+th.data('id')+']').fadeOut();

				_F._cSSS_message(cs);

				cs.clearQueue().fadeToggle();/* TODO if animated */
			} else
				return false;
		},
		/* OLD 08.2018
		_cSSS : function ( th )
		{
			var cs = $('.j_compare_success[data-id='+th.data('id')+']');//th.siblings('.j_compare_success').length ? th.siblings('.j_compare_success') :
			var c = _F._cInput();

			if( cs.length && c )
			{
				_F._hide();

				if( c.data('co') < 2)
					cs.find('.j_me2').hide().siblings('.j_me1').show();
				else
					cs.find('.j_me1').hide().siblings('.j_me2').show();

				cs.fadeIn().delay(10000).fadeOut(400);
			} else
				return false;
		}*/
		/* OLD 2018
		_cSSS : function ( th )
		{
			var c = _cInput();

			if( th.siblings('.j_compare_succes').length && c )
			{
				_hide();

				if( c.data('co') < 2)
					th.siblings('.j_compare_succes').find('.j_me2').hide().siblings('.j_me1').show();
				else
					th.siblings('.j_compare_succes').find('.j_me1').hide().siblings('.j_me2').show();

				th.siblings('.j_compare_succes').fadeIn().delay(10000).fadeOut(400);
			} else
				return false;
		},*/
/* ---------------------------------------------------------------------------------------------------- TODO*/
		// Закрытие СПС окон
		_hide : function ()
		{
			// $('.j_compare_success, .j_compare_one').clearQueue().stop().fadeOut(400);// очистка очереди
		},
		// Закрытие модальных окон
		_close : function () {
			$('.j_compare_close').click();
		},
		_compResize : function ()
		{
			var ch = Math.round( $('.j_compare').height()-$('.j_pinfo').height() );
			$('.j_property, .j_nproperty').css('height', ch+'px');

			setTimeout(function(){
				window.swiperCompare.update();
				window.swiperProperty.update();
//				window.swipernProperty.update();
			});
		},
		// Склонение числительных
		_plural : function ( number, titles )
		{
			var cases = [2, 0, 1, 1, 1, 2];
			return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
		},
		// Swiper Product
		_sw_comp_2 : function ()
		{
			window.swiperCompare = $('.j_products').swiper({
				wrapperClass			: 'swiper-wrapper',
				slideClass				: 'swiper-slide',
				slideActiveClass		: 'swiper-slide-active',
				slideVisibleClass		: 'swiper-slide-visible',

				mode					: 'horizontal',
				slidesPerView			: 'auto',
				//resistance				: '100%',
				resizeReInit			: true,
				grabCursor				: true,

				scrollbar: {
					container			: '.j_ph_scroll',
					hide				: false
				},
				onSwiperCreated			: function(){// Fix problem scrollbar at resize window for swiperProperty
					setTimeout(function(){
						_F._compResize();
					});
				}
			});
			$('body').on('click', '.j_ph_right', function(e){
				e.preventDefault();
				window.swiperCompare.swipeNext();
			});	
			$('body').on('click', '.j_ph_left', function(e){
				e.preventDefault();
				window.swiperCompare.swipePrev();
			});
		},
		// Swiper Property
		_sw_prop_2 : function ()
		{
			window.swiperProperty = $('.j_property').swiper({
				wrapperClass			: 'swiper-wrapper',
				slideClass				: 'swiper-slide',
				slideActiveClass		: 'swiper-slide-active',
				slideVisibleClass		: 'swiper-slide-visible',

				mode					: 'vertical',
				slidesPerView			: 'auto',
				//resistance				: '100%',
				//resizeReInit			: true,

				scrollbar: {
					container			: '.j_pv_scroll',
					hide				: false,
				},
				mousewheelControl		: true,
				onSwiperCreated			: function(){// Fix problem scrollbar at resize window for swiperProperty
					setTimeout(function(){
						_F._compResize();
					});
				}
			});

			$('body').on('click', '.j_pv_top', function(e){
				e.preventDefault();
				window.swiperProperty.swipePrev();
			});
			$('body').on('click', '.j_pv_bottom', function(e){
				e.preventDefault();
				window.swiperProperty.swipeNext();
			});
		},
		// Swiper Product
		_sw_comp_3 : function ()
		{
			window.swiperCompare = new Swiper('.j_products', {
				direction			: 'horizontal',
				slidesPerView		: 'auto',

				setWrapperSize		: true,
				grabCursor			: true,

				nextButton			: '.j_ph_right',
				prevButton			: '.j_ph_left',
				scrollbarHide		: false,
				scrollbarDraggable	: true,
				scrollbar			: '.j_ph_scroll',

				onInit				: function(){// Fix problem scrollbar at resize window for swiperProperty
					//console.log('swiperCompare');
					setTimeout(function(){
						_F._compResize();
					});
				}
			});
		},
		// Swiper Property
		_sw_prop_3 : function ()
		{
			window.swiperProperty = new Swiper('.j_property', {
				direction				: 'vertical',
				slidesPerView			: 'auto',

				setWrapperSize			: true,
				grabCursor				: true,

				nextButton				: '.j_pv_bottom',
				prevButton				: '.j_pv_top',
				scrollbarHide			: false,
				scrollbarDraggable		: true,
				scrollbar				: '.j_pv_scroll',

				mousewheelControl		: true,
				mousewheelSensitivity	: 3,

				onInit					: function(){// Fix problem scrollbar at resize window for swiperProperty
					//console.log('swiperProperty');
					setTimeout(function(){
						_F._compResize();
					});
				}
			});
/*
			window.swipernProperty = new Swiper('.j_nproperty', {
				direction			: 'vertical',
				slidesPerView		: 'auto',

				setWrapperSize		: true,
				grabCursor			: true,

				nextButton			: '.j_pv_bottom',
				prevButton			: '.j_pv_top',
				scrollbarHide		: false,
				scrollbarDraggable	: true,
				scrollbar			: '.j_pv_scroll',

				onInit				: function(swiper){// Fix problem scrollbar at resize window for swiperProperty
					//console.log('swiperProperty');
					setTimeout(function(){
						_F._compResize();
					});
				},
			});

			window.swiperProperty.params.control = window.swipernProperty;
			window.swipernProperty.params.control = window.swiperProperty;
*/
		},
		// Swiper Product
		_sw_comp_4 : function ()
		{
			window.swiperCompare = new Swiper('.j_products', {
				direction			: 'horizontal',
				slidesPerView		: 'auto',

				setWrapperSize		: true,
				grabCursor			: true,

				navigation: {
					nextEl			: '.j_ph_right',
					prevEl			: '.j_ph_left'
				},

				scrollbar: {
					el				: '.j_ph_scroll',
					hide			: false,
					draggable		: true
				},

				on: {
					init: function()// Fix problem scrollbar at resize window for swiperProperty
					{
						//console.log('swiperCompare');
						setTimeout(function(){
							_F._compResize();
						});
					}
				}
			});
		},
		// Swiper Property
		_sw_prop_4 : function ()
		{
			window.swiperProperty = new Swiper('.j_property', {
				direction			: 'vertical',
				slidesPerView		: 'auto',

				setWrapperSize		: true,
				grabCursor			: true,

				navigation: {
					nextEl			: '.j_pv_bottom',
					prevEl			: '.j_pv_top'
				},

				scrollbar: {
					el				: '.j_pv_scroll',
					hide			: false,
					draggable		: true
				},

				mousewheel: {
					invert			: false,
					sensitivity 	: 5
				},

				on: {
					init: function()// Fix problem scrollbar at resize window for swiperProperty
					{
						//console.log('swiperProperty');
						setTimeout(function(){
							_F._compResize();
						});
					}
				}
			});
/*
			window.swipernProperty = new Swiper('.j_nproperty', {
				direction			: 'vertical',
				slidesPerView		: 'auto',

				setWrapperSize		: true,
				grabCursor			: true,

				nextButton			: '.j_pv_bottom',
				prevButton			: '.j_pv_top',
				scrollbarHide		: false,
				scrollbarDraggable	: true,
				scrollbar			: '.j_pv_scroll',

				onInit				: function(swiper){// Fix problem scrollbar at resize window for swiperProperty
					//console.log('swiperProperty');
					setTimeout(function(){
						_F._compResize();
					});
				},
			});

			window.swiperProperty.params.control = window.swipernProperty;
			window.swipernProperty.params.control = window.swiperProperty;
*/
		}
	}
/*
		// Проверка целого цисла
		_isInteger = function ( num )
		{
			return (num ^ 0) === num;
		},
*/
		// Resize
//		_onResize = function ( m ) {},

// ---------------------------------------------------------------------------------------------------- Esc
	$(document).keydown(function(e) {
		if (e.keyCode == 27)
			_F._close();
	});

	$(document).ready(function(){
//		methods.InputHidden();
//		$.ilab('CompareModal');

		_F._outsideElementHide('.j_compare, .j_compare_success, .j_open_compare, .j_compare_one, .j_item_compare_stiker');
// ---------------------------------------------------------------------------------------------------- Compare
		$('body')
		// Закрытие окна succes покупки
		.on('click', '.j_cs_close', function(){
			// $('.j_compare_success, .j_compare_one').stop().fadeOut(400);// FADEOUT(очистка очереди)
		})
// Close CompareModal
		.on('click', '.j_compare_close', function(){
			$(window).off('resize', _F._compResize);
			$('.j_compare').fadeOut(function(){
				$(this).remove();
				$('html').removeAttr('style');
			});
		})
		// CompareRemove modal
		.on('click', '.j_remove_compare', function(){

			var th	= $(this);
			var id	= th.data('id');
			var i	= th.parents('.swiper-slide').index();
			var c	= _F._cInput();

			th.addClass('i_remove_compare_load');// loader

		//	var $col = $('#ilab_compare').data('co');
		//	$('.j_h_comp_col').html($col);

			if( $('.j_item_compare[data-id='+id+']').length )
			{
				$('.j_item_compare[data-id='+id+']').ilab('CompareRemove', {
					change_class	: 'i_item_compare_act',
					change_text		: { class : 'span' },
					button_class	: '.j_item_compare',
				});
			} else {
				th.ilab('CompareRemove');
			}

			window.swiperCompare.removeSlide(i);// Удалим элемент через swipe по index'у

			if( !$('.j_ilab_prop_empty').length )
			{
				$('.j_prop_value[data-id='+id+']').remove();// Удалим характеристики

				// Удалим столбец характеристики если нет ни одного значения
				var i=1;$('.j_property .swiper-slide').each(function(indx){
					var swco = $(this).children('.j_prop_value').length;
					var swem = $(this).children('.j_prop_value:empty').length;
					//console.log( indx+' | '+i+' | '+((indx+1)-i)+' | '+swco+' | '+swem );
					if(swco == swem)
					{
						window.swiperProperty.removeSlide((indx+1)-i);
	//					window.swipernProperty.removeSlide((indx+1)-i);
						i++;
					}// Удалим столбец
				});
			}

			if( window.swiperCompare.slides.length==1 )// Если пред-последний элемент то закрыть окно
			{
				$('body').removeAttr('style');
				$('.j_compare_close').click();
			} else {
				_F._compResize();

				window.swiperCompare.slideTo( window.swiperCompare.activeIndex );// run to active slider
				window.swiperProperty.slideTo( window.swiperProperty.activeIndex );// run to active slider
			}

			th.removeClass('i_remove_compare_load');// loader

			return false;

		})
		.on('click', '.j_item_compare_stiker', function(){
			_F._cSSS_toggle($(this));
		});
// ---------------------------------------------------------------------------------------------------- Compare

	});

}( window.ilab = window.ilab || {}, jQuery ));