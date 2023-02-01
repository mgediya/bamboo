var $ = jQuery.noConflict();
$headerHeight = $('.main-header').outerHeight();

/* Script on ready
------------------------------------------------------------------------------*/
// $('.ts-testimonial').slick({
// 	dots: true,
// 	infinite: false,
// 	speed: 300,
// 	slidesToShow: 2,
// 	slidesToScroll: 1
// });

$(() => {
	/* Do jQuery stuff when DOM is ready */
	if ($('.tabs-wrapper').length) {
		$(".tabs-wrapper").each(function () {
			$(this).find(".tabs-nav").before('<span class="sidebartab-dropdown"></span>');
			$(this).find(".sidebartab-dropdown").html($(this).find('.tabs-nav li h4:first').html());
			$(".tab-content:not(:first-child)").hide();
			$(".tabs-nav .tabs-item:first-child").addClass("active");
			/* if in tab mode */
			$(".tabs-nav .tabs-item").click(function () {
				if (!$(this).hasClass('active')) {
					$(this).parents('.tabs-wrapper').find(".tab-content").hide();
					var activeTab = $(this).find('h4').attr('data-href');
					$(activeTab).fadeIn();
					$(this).addClass("active").siblings().removeClass("active");
					$(this).parents('.tabs-wrapper').find(".sidebartab-dropdown").html($(this).find('h4').html());
					return false;
				}
			});
			$(this).find(".sidebartab-dropdown").click(function () {
				$(this).next(".tabs-nav").stop().slideToggle();
				$(this).toggleClass("active");
				$(".tabs-nav .tabs-item").click(function () {
					$(this).parents(".tabs-nav").stop().slideUp();
					$(".sidebartab-dropdown").removeClass("active");
				});
			})
		});
	}
	/* Contact form start */
	jQuery(document).on('gform_post_render', function (event, form_id, current_page) {
		$(".gform-body .ginput_container input,.gform-body .ginput_container select, .gform-body .ginput_container textarea").each(function () {
			var txtName = $(this).val();
			if (txtName) {
				$(this).parents('.gfield').addClass('focused');
			} else {
				$(this).parents('.gfield').removeClass('focused');
			}
		});
		$(".gform-body .ginput_container input,.gform-body .ginput_container select, .gform-body .ginput_container textarea").focus(function () {
			$(this).parents('.gfield').addClass('focused');
		});
		$(".gform-body .ginput_container input,.gform-body .ginput_container select, .gform-body .ginput_container textarea").blur(function () {
			var $this = $(this);
			var txtName = $this.val();
			if (txtName) {
				$(this).parents('.gfield').addClass('focused');
			} else {
				$(this).parents('.gfield').removeClass('focused');
			}
		});
		$(".gform-body .ginput_container input[type=tel]").blur(function (e) {
			var $this = $(this);
			setTimeout(function () {
				var txtName = $this.val();
				if (txtName) {
					$this.parents('.gfield').addClass('focused');
				} else {
					$this.parents('.gfield').removeClass('focused');
				}
			}, 0);
		});
		$('.gfield_validation_message').text(function () {
			return $(this).text().replace("The reCAPTCHA was invalid. Go back and try it again.", "The reCAPTCHA was invalid.");
		});
		$(".gform-body select").each(function () {
			if (this.value != '') {
				$(this).parents('.gfield').addClass('hide-label');
			} else {
				$(this).parents('.gfield').removeClass('hide-label');
			}
		});
		$(".gform-body select").change(function (e) {
			if (this.value != '') {
				$(this).parents('.gfield').addClass('hide-label');
			} else {
				$(this).parents('.gfield').removeClass('hide-label');
			}
		});
	});
	/* Contact form End */

	$('.accordion-wrapper .list-head').on('click', function () {
		if ($(this).hasClass('active')) {
			$(this).parent().removeClass('active');
			$(this).removeClass('active');
			$(this).next('.list-desc').stop().slideUp();
		} else {
			$('.accordion-single').removeClass('active');
			$('.accordion-wrapper  .list-head').removeClass('active');
			$('.accordion-wrapper  .list-desc').stop().slideUp();
			$(this).parent().addClass('active');
			$(this).addClass('active');
			$(this).next('.list-desc').stop().slideDown();
		}
	});

	// wrap img in press section
	$('.pdh-wrapper img').append('.pdh-wrapper img').wrap('<div class="wrap-img"></div>');

	if ($(".related-news").length) {
		//$(".related-news .bgb-cat-row").before('<span class="sidebartab-dropdown"></span>');
		$(".sidebartab-dropdown").html($('.related-news .bgb-cat-row span:first').html());
		$(".related-news .bgb-cat-row span:first").addClass("selected");

		/* if in tab mode */
		$(".related-news .bgb-cat-row span").click(function () {
			if (!$(this).hasClass('selected')) {
				$(this).addClass("selected").parent().siblings().find('span').removeClass("selected");
				$(".sidebartab-dropdown").html($(this).html());
			}
		});
		$(".related-news .sidebartab-dropdown").click(function () {
			$(this).next(".related-news .bgb-cat-row").stop().slideToggle();
			$(this).toggleClass("selected");
			$('.related-news .bgb-cat-row').toggleClass("is-open");
			$(".related-news .bgb-cat-row span").click(function () {
				$(this).parents(".related-news .bgb-cat-row").stop().slideUp();
				$(".related-news .sidebartab-dropdown").removeClass("selected");
				$(".related-news .sidebartab-dropdown").html($(this).html());
			});
		})
	}

	// resources tabs
	if ($('.drf-wrap').length) {
		$(".drf-wrap").each(function () {
			$(".tab-content:not(:first-child)").hide();
			$(".filterlist .gallery-catlist:first-child").addClass("selected");
			/* if in tab mode */
			$(".filterlist .gallery-catlist").click(function () {
				if (!$(this).hasClass('selected')) {
					$(this).parents('.drf-wrap').find(".tab-content").hide();
					var activeTab = $(this).find('span').attr('data-href');
					$(activeTab).fadeIn();
					$(this).addClass("selected").siblings().removeClass("selected");
					return false;
				}
			});
		});
	}

	if ($('.filterlist').length) {
		const slider = document.querySelector('.filterlist');
		let isDown = false;
		let startX;
		let scrollLeft;

		slider.addEventListener('mousedown', (e) => {
			isDown = true;
			slider.classList.add('active');
			startX = e.pageX - slider.offsetLeft;
			scrollLeft = slider.scrollLeft;
		});
		slider.addEventListener('mouseleave', () => {
			isDown = false;
			slider.classList.remove('active');
		});
		slider.addEventListener('mouseup', () => {
			isDown = false;
			slider.classList.remove('active');
		});
		slider.addEventListener('mousemove', (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - slider.offsetLeft;
			const walk = (x - startX) * 3; //scroll-fast
			slider.scrollLeft = scrollLeft - walk;
		});
	}

	// claim page offset jq
	$(".claim-one").click(function() {
		$('html, body').animate({
			scrollTop: $("#claim2").offset().top - 100
		}, 1000);
	});
	$(".claim-two").click(function() {
		$('html, body').animate({
			scrollTop: $("#claim4").offset().top - 100
		}, 1000);
	});
	$(".get-a-quote").click(function() {
		$('html, body').animate({
			scrollTop: $("#get-a-quote").offset().top
		}, 1000);
	});
	$(".coverage-btn").click(function() {
		$('html, body').animate({
			scrollTop: $("#coverage-part").offset().top - 100
		}, 1000);
	});

});



/* Script on load
------------------------------------------------------------------------------*/
window.onload = () => {
	$('.related-news .bgb-cat-row').on('click', '.filter-btn', function () {
		var filterValue = $(this).attr('data-filter');
		$(this).parents('.related-news').find('.bgb-data-row').isotope({
			filter: filterValue
		});
		$(this).addClass('selected').siblings().removeClass('selected');
	});
	//****************************
	// Isotope Load more button
	//****************************

	// var $container = $('.portfolioContainer');
	if ($('.mcn-post-wrap').length) {
		var $container = $('.mcn-post-wrap').isotope({
			itemSelector: '.grid-item',
			masonry: {
				columnWidth: 0,
			}
		  });

		  // change size of item by toggling gigante class
		  $container.on( 'click', '.grid-item', function() {
			$(this).toggleClass('gigante');
			// trigger layout after item size changes
			$container.isotope('layout');
		  });

		  // filter functions
		  var filterFns = {
			// show if number is greater than 50
			numberGreaterThan50: function() {
			  var number = $(this).find('.number').text();
			  return parseInt(number, 10) > 50;
			},
			// show if name ends with -ium
			ium: function() {
			  var name = $(this).find('.name').text();
			  return name.match(/ium$/);
			}
		  };

		  // bind filter button click
		  $('.portfolioFilter').on('click', 'span', function() {
			$('.portfolioFilter .selected').removeClass('selected');
			$(this).addClass("selected").siblings().removeClass("selected");
			var filterValue = $(this).attr('data-filter');
			// use filterFn if matches value
			filterValue = filterFns[filterValue] || filterValue;
			$container.isotope({
			  filter: filterValue
			});
			$container.isotope('layout');
		  });

		  //****************************
		  // Isotope Load more button
		  //****************************
		  var initShow = 6; //number of items loaded on init & onclick load more button
		  var counter = initShow; //counter for load more button
		  var iso = $container.data('isotope'); // get Isotope instance

		  loadMore(initShow); //execute function onload

		  function loadMore(toShow) {
			$container.find(".hidden").removeClass("hidden");

			var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
			  return item.element;
			});
			$(hiddenElems).addClass('hidden');
			$container.isotope('layout');

			//when no more to load, hide show more button
			if (hiddenElems.length == 0) {
			  jQuery("#load-more").hide();
			} else {
			  jQuery("#load-more").show();
			};

		  }

		  //append load more button
		  $('.portfolioContainer').after('<div class="viewPlan load-more-wrap text-center"><a href="javascript:void(0);" class="btn" id="load-more">Show More News</a></div>');

		  //when load more button clicked
		  $("#load-more").click(function() {
			if ($('.portfolioFilter').data('clicked')) {
			  //when filter button clicked, set initial value for counter
			  counter = initShow;
			  $('.portfolioFilter').data('clicked', false);
			} else {
			  counter = counter;
			};

			counter = counter + initShow;

			loadMore(counter);
		  });

		  //when filter button clicked
		  $(".portfolioFilter").click(function() {
			$(this).data('clicked', true);

			loadMore(initShow);
		  });
	}

};

/* Script on scroll
------------------------------------------------------------------------------*/
window.onscroll = () => {
	/* Do jQuery stuff on Scroll */

	var sticky = $('.main-header'),
      	scroll = $(window).scrollTop();

	if (scroll >= 100) sticky.addClass('fixed');
	else sticky.removeClass('fixed');


	$(".cs-col").each(function () {
		var win_scroll = $(window).scrollTop();
		var win_height = $(window).height();
		var this_off = $(this).offset().top;
		//var view_then = win_scroll + (win_height - (win_height / 1));
		var view_now = win_scroll + (win_height - (win_height / 2));
		if (view_now >= this_off) {
			$(this).addClass("animated");
		}else{
			$(this).removeClass("animated");
		}
	});
};

/* Script on resize
------------------------------------------------------------------------------*/
window.onresize = () => {
	/* Do jQuery stuff on resize */
};


/* Script all functions
------------------------------------------------------------------------------*/
/* Match height */
function sameHeight(elem, heightType) {
	var mhelem = $(elem);
	var maxHeight = 0;
	if (heightType == undefined) {
		heightType = 'min-height';
	} else {
		heightType = 'height';
	}
	mhelem.css(heightType, 'auto');
	mhelem.each(function () {
		if ($(this).height() > maxHeight) {
			maxHeight = $(this).height();
		}
	});
	mhelem.css(heightType, maxHeight);
}

