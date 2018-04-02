jQuery(document).ready(function($) {
	//move nav element position according to window width
	moveNavigation();
	//check window with and add or remove id = "background" for section class = "main_bg"
	check_window_width();
	function check_background() {
		if ($("header").hasClass('nav-is-visible')) {
			$("#background").fadeOut(300);
		} else {
			$("#background").fadeIn(300);
		}
	}
	function check_mobile_menu() {
		if ($('header').hasClass('nav-is-visible')) $('.moves-out').removeClass('moves-out');
		check_background();
		$('#mobile-menu').toggleClass('is-visible');
		$('header').toggleClass('nav-is-visible');
		//$('.cd-main-nav').toggleClass('nav-is-visible');
	}
	//mobile version - open/close navigation
	$('.cd-nav-trigger').on('click', function (event) {
		event.preventDefault();
		check_mobile_menu();
	});

	function moveNavigation() {
		var navigation = $('.cd-main-nav-wrapper');
		var screenSize = checkWindowWidth();
		if (screenSize) {
			//desktop screen - insert navigation inside header element
			navigation.detach();
			navigation.insertBefore('.cd-nav-trigger');
		} else {
			//mobile screen - insert navigation after .cd-main-content element
			navigation.detach();
			navigation.insertAfter('.cd-main-content');
		}
	}

	function checkWindowWidth() {
		var mq = window.getComputedStyle(document.querySelector('header'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
		return ( mq == 'mobile' ) ? false : true;
	}

	var formModal = $('.cd-user-modal'),
		formLogin = formModal.find('#cd-login'),
		formSignup = formModal.find('#cd-signup'),
		formForgotPassword = formModal.find('#cd-reset-password'),
		formModalTab = $('.cd-switcher'),
		tabLogin = formModalTab.children('li').eq(0).children('a'),
		tabSignup = formModalTab.children('li').eq(1).children('a'),
		forgotPasswordLink = formLogin.find('.cd-form-bottom-message a'),
		backToLoginLink = formForgotPassword.find('.cd-form-bottom-message a'),
		mainNav = $('.main-nav');

	//open modal
	mainNav.on('click', function (event) {
		$(event.target).is(mainNav) && mainNav.children('ul').toggleClass('is-visible');
	});

	//open login-form form
	$("header").on('click', '.cd-signin', login_selected);

	//close modal
	formModal.on('click', function (event) {
		if ($(event.target).is(formModal) || $(event.target).is('.cd-close-form')) {
			formModal.removeClass('is-visible');
		}
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function (event) {
		if (event.which == '27') {
			formModal.removeClass('is-visible');
		}
	});

	//switch from a tab to another
	formModalTab.on('click', function (event) {
		event.preventDefault();
		( $(event.target).is(tabLogin) ) ? login_selected() : signup_selected();
	});

	//show forgot-password form 
	forgotPasswordLink.on('click', function (event) {
		event.preventDefault();
		forgot_password_selected();
	});

	//back to login from the forgot-password form
	backToLoginLink.on('click', function (event) {
		event.preventDefault();
		login_selected();
	});

	function login_selected() {
		mainNav.children('ul').removeClass('is-visible');
		formModal.addClass('is-visible');
		formLogin.addClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.removeClass('is-selected');
		tabLogin.addClass('selected');
		tabSignup.removeClass('selected');
	}

	function forgot_password_selected() {
		formLogin.removeClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.addClass('is-selected');
	}

	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if (!Modernizr.input.placeholder) {
		$('[placeholder]').focus(function () {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
			}
		}).blur(function () {
			var input = $(this);
			if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
			}
		}).blur();
		$('[placeholder]').parents('form').submit(function () {
			$(this).find('[placeholder]').each(function () {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
				}
			})
		});
	}

	//module for swipe and drag

	$(window).on('resize', function () {
		check_window_width();
	});

	$('.carousel').owlCarousel({
		items:1,
		autoplay: true,
		autoplayTimeout: 5500,
		smartSpeed:800,
		loop:true,
		mouseDrag: false,
		touchDrag: false,
		margin:0,
	});

	$(".accordion").accordion();

	$("#background").click(function(){
		$("body").removeClass();
		$("header").removeClass("nav-is-visible");
		$(this).fadeOut(300);
	});

	jQuery.fn.putCursorAtEnd = function () {
		return this.each(function () {
			// If this function exists...
			if (this.setSelectionRange) {
				// ... then use it (Doesn't work in IE)
				// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
				var len = $(this).val().length * 2;
				this.focus();
				this.setSelectionRange(len, len);
			} else {
				// ... otherwise replace the contents with itself
				// (Doesn't work in Google Chrome)
				$(this).val($(this).val());
			}
		});
	};
	$(".cd-signin").click(function () {
		if ($("body").attr("class") == "menu-active") {
			check_mobile_menu();
			$('body').toggleClass('menu-active');
		}
	});
	//onclick functions for p elements in aside swipe menu
	$("#debit").click(function () {
		window.location.href = "https://www.google.ru";
	});
	$("#dram-sharj").click(function () {
		window.location.href = "/dramarkkhi_sharj";
	});
	$("#toPdf").click(function () {
		$('table').tableExport({type:'pdf',escape:'true'});
	});
	$("#toExcel").click(function(e) {
		e.preventDefault();

		//getting data from our table
		var data_type = 'data:application/vnd.ms-excel';
		var table_div = document.getElementById('table_wrapper');
		var table_html = table_div.outerHTML.replace(/ /g, '%20');

		var a = document.createElement('a');
		a.href = data_type + ', ' + table_html;
		a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
		a.click();
	});
});

function check_window_width() {
	if ($("body").width() >= 1008) {
		$("body").removeClass();
		$("header").removeClass();
		$("section.main_bg").removeAttr("id");
	} else if ($("body").width() <= 1007.99) {
		$("section.main_bg").attr("id", "background");
		if ($("header").hasClass("nav-is-visible")) {
			$("#background").fadeIn(300);
		} else {
			$("#background").fadeOut(300);
		}
		(function () {
			
			var $menu_trigger = $(".cd-nav-trigger");
			var $body = $("body");
			if (typeof ($menu_trigger) != 'undefined') {
				$menu_trigger.on("click", function () {
					$body.toggleClass("menu-active");
				});
			}
			var options = {
				dragLockToAxis: true,
				dragBlockHorizontal: true,
				preventDefault: true
			};
			var resim = document.getElementById('kaydir');
			Hammer(resim).on("swiperight", function (ev) {
				$body.attr("class", 'menu-active');
				$("#background").fadeIn(300);
				$("header").addClass("nav-is-visible");
			}, options);
			Hammer(resim).on("swipeleft", function (ev) {
				$body.attr("class", '');
				$("#background").fadeOut(300);
				$("header").removeClass("nav-is-visible");
			}, options);
			var resim_2 =  document.getElementById('mobile-menu');
			Hammer(resim_2).on("swipeleft", function (ev) {
				$body.attr("class", '');
				$("#background").fadeOut(300);
				$("header").removeClass("nav-is-visible");
			}, options);
		}).call(this);
		$("main").removeAttr("style");
	}
}