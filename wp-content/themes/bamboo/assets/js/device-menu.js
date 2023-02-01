var $ = jQuery.noConflict();
$(() => {
	/* Responsive Jquery Navigation */
	$('.hamburger').click(function (event) {
		$('.mbnav').toggleClass('is-open');
		$('body').toggleClass('scroll-fixed');
		$(this).toggleClass('active');
	});

	var clickable = $('.mbnav__state').attr('data-clickable');
	$('.mbnav li:has(ul)').addClass('has-sub');
	$('.mbnav .has-sub>a').after('<em class="caret">');
	$('.mbnav .has-sub>a[href="#"]').parents('.has-sub').addClass('clickable');
	$('.mbnav .has-sub>a:not([href])').parents('.has-sub').addClass('clickable');

	if (clickable == 'true') {
		$('.mbnav .has-sub>.caret').addClass('trigger-caret');
	} else {
		$('.mbnav .has-sub>a').addClass('trigger-caret').attr('href', 'javascript:;');
	}

	// $('.mbnav__inner .quick-contact').clone($('.mbnav__inner').prpend());
	$('.mbnav__inner .quick-contact').appendTo( ".mbnav__inner" );

	/* menu open and close on single click */
	$('.mbnav .has-sub>.trigger-caret').click(function () {
		var element = $(this).parent('li');
		if (element.hasClass('is-open')) {
			console.log('if');
			element.removeClass('is-open').find('li').removeClass('is-open');
			element.find('.caret + .mega-menu-wrapper, .caret + ul').stop().slideUp(200,function(){
				$(this).height('auto');
			});
		} else {
			console.log('else');
			element.parents('.mega-menu-wrapper').height('auto');
			element.addClass('is-open').siblings('li').removeClass('is-open');
			element.find('> .mega-menu-wrapper, > ul').stop().slideDown(200,function(){
				// $(this).height('auto');
			});
			element.siblings('li').removeClass('is-open').find('li').removeClass('is-open');
			element.siblings('li').find('.caret + .mega-menu-wrapper, .caret + ul').stop().slideUp(200);

		}
	});
	$('.mbnav .mbnav__state > .mbnav__inner').css('padding-top', $('.main-header').outerHeight());
});