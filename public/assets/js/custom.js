(function ($) {
	"use strict"

	// Page Preloader
	$(window).load(function () {
		$(".loader").delay(300).fadeOut();
		$(".animationload").delay(600).fadeOut("slow");
	});

	// Header Aff
	// $("#header-style-1").affix({
	// 	offset: {
	// 		top: 100,
	// 		bottom: function () {
	// 			return (this.bottom = $('#copyrights').outerHeight(true))
	// 		}
	// 	}
	// })

	function nav_scrollspy() {
		if (document.getElementsByClassName("header-container").length > 0 && $(window).width() >= 576) {
			$(window).on("scroll", function () {
				if ($(this).scrollTop() >= $('.header-mark').offset().top) {
					$('.header-container').addClass('sticky');
					$('.header-mark').addClass('top20');
				} else {
					$('.header-container').removeClass('sticky');
					$('.header-mark').removeClass('top20');
				}
			});
		}
	}
	nav_scrollspy()

	// OWL Carousel
	$("#owl-testimonial").owlCarousel({
		items: 2,
		lazyLoad: true,
		navigation: false,
		autoPlay: false
	});


	$("#owl-testimonial-widget, #owl-blog").owlCarousel({
		items: 1,
		lazyLoad: true,
		navigation: true,
		pagination: false,
		autoPlay: false
	});

	$("#owl_blog_three_line, #owl_portfolio_two_line, #owl_blog_two_line").owlCarousel({
		items: 2,
		lazyLoad: true,
		navigation: true,
		pagination: false,
		autoPlay: false
	});

	$("#owl_shop_carousel, #owl_shop_carousel_1").owlCarousel({
		items: 3,
		lazyLoad: true,
		navigation: true,
		pagination: false,
		autoPlay: false
	});

	$("#services").owlCarousel({
		items: 3,
		lazyLoad: true,
		navigation: false,
		pagination: true,
		autoPlay: false
	});
	$(".service_cate_carousel").owlCarousel({
		loop: true,
		center: false,
		items: 4,
		stagePadding: 0,
		lazyLoad: true,
		autoplay: false,
		dots: false,
		nav: true,
		navText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
		autoplayTimeout: 5000,
		margin: 35,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			768: {
				items: 3
			},
			1000: {
				items: 4
			},
			1200: {
				items: 4
			}
		},
	});
	$(".service-detail-imgs").owlCarousel({
		loop: true,
		items: 1,
		stagePadding: 0,
		lazyLoad: true,
		autoplay: false,
		center: true,
		dots: true,
		nav: true,
		navText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
		autoplayTimeout: 5000,
	});
	$(".partner_carousel").owlCarousel({
		loop: true,
		items: 8,
		nav: false,
		dots: false,
		margin: 5,
		lazyLoad: true,
	});
	$(".employee_carousel").owlCarousel({
		items: 6,
		lazyLoad: true,
		navigation: false,
		pagination: false,
		autoPlay: false,
		loop: true,
		itemsDesktop: [1199, 6],
		itemsDesktopSmall: [980, 4],
		itemsTablet: [768, 4],
		itemsMobile: [479, 2],
	});
	$(".buddy_carousel").owlCarousel({
		items: 9,
		lazyLoad: true,
		navigation: false,
		pagination: true,
		autoPlay: false
	});
	$('.buddy_tooltip').popover({
		container: '.partner_carousel, .buddy_members'
	});

	// Parallax
	$(window).bind('body', function () {
		parallaxInit();
	});

	function parallaxInit() {
		$('#one-parallax').parallax("30%", 0.1);
		$('#two-parallax').parallax("30%", 0.1);
		$('#three-parallax').parallax("30%", 0.1);
		$('#four-parallax').parallax("30%", 0.4);
		$('#five-parallax').parallax("30%", 0.4);
		$('#six-parallax').parallax("30%", 0.4);
		$('#seven-parallax').parallax("30%", 0.4);
	}


	// Fun Facts
	function count($this) {
		var current = parseInt($this.html(), 10);
		current = current + 1; /* Where 50 is increment */

		$this.html(current += 25);
		if (current > $this.data('count')) {
			$this.html($this.data('count'));
		} else {
			setTimeout(function () {
				count($this)
			}, 5);
		}
	}

	$(".stat-count").each(function () {
		$(this).data('count', parseInt($(this).html(), 10));
		$(this).html('0');
		count($(this));
	});

	// WOW
	new WOW({
		offset: 300
	}).init();

	// DM Top
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 1) {
			jQuery('.dmtop').css({
				bottom: "25px"
			});
		} else {
			jQuery('.dmtop').css({
				bottom: "-100px"
			});
		}
	});
	jQuery('.dmtop').click(function () {
		jQuery('html, body').animate({
			scrollTop: '0px'
		}, 800);
		return false;
	});

	// Rotate Text
	$(".rotate").textrotator({
		animation: "fade",
		speed: 1300
	});


	// TOOLTIP
	$('.social-icons, .bs-example-tooltips').tooltip({
		selector: "[data-toggle=tooltip]",
		container: "body"
	})

	// Accordion Toggle Items
	var iconOpen = 'fa fa-minus',
		iconClose = 'fa fa-plus';

	$(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function (e) {
		var $target = $(e.target)
		$target.siblings('.accordion-heading')
			.find('em').toggleClass(iconOpen + ' ' + iconClose);
		if (e.type == 'show')
			$target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
		if (e.type == 'hide')
			$(this).find('.accordion-toggle').not($target).removeClass('active');
	});

})(jQuery);
$(document).ready(function () {
	if ($('.tp-banner-container').length) {
		setTimeout(() => {
			$('.tp-banner-container').css({
				visibility: 'visible'
			});
		}, 100)
	}
	$("#mobile-menu").mmenu({
		offCanvas: {
			position: "left", // changing this alters the position of the menu
			zposition: "front"
		}
	});
	var mmenu_app = $("#mobile-menu").data("mmenu");
	$(".mmenu-close-trigger").click(function () {
		mmenu_app.close();
	});
	let elmts = document.querySelectorAll(".lozad");
	window.img_observer = lozad(elmts);
	window.img_observer.observe();
	$('[data-fancybox^="album"]').fancybox({
		thumbs: {
			autoStart: true
		},
		buttons: [
			'zoom',
			'close'
		]
	});
	if ($('.img-select-area .img-selection').length) {
		$('.img-select-area .img-selection').owlCarousel({
			items: 5,
			lazyLoad: true,
			navigation: false,
			pagination: true,
			autoPlay: false,
			loop: true,
			itemsDesktop: [1199, 5],
			itemsDesktopSmall: [980, 3],
			itemsTablet: [768, 1],
			itemsMobile: [479, 1],
		});
		$('.img-select-area .img-selection img').click(function () {
			$('.img-select-area .main-img img').attr('src', $(this).attr('src'));
		})
	};
	if ($('.global-banner').length) {
		$('#header-style-1 .inner').removeClass('border');
	} else {
		$('#header-style-1 .inner').addClass('border');
	}
})

/*------------------------carousel 5 hình :))-------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
	const carousels = document.querySelectorAll(".carousel");

	carousels.forEach((carousel) => {
		const slides = carousel.querySelector(".slides");
		const dots = carousel.querySelector(".navigation-dots");
		const prevBtn = carousel.querySelector(".prev");
		const nextBtn = carousel.querySelector(".next");
		const images = carousel.querySelectorAll(".slides img");

		let slideIndex = 0;
		let autoSlide = true;

		// Initialize navigation dots
		for (let i = 0; i < images.length; i++) {
			const dot = document.createElement("span");
			dot.classList.add("dot");
			dots.appendChild(dot);
		}

		const dotsArray = Array.from(dots.children);

		function showSlide(n) {
			slides.style.opacity = 0;

			setTimeout(() => {
				slides.style.transform = `translateX(-${n * 100}%)`;
				slides.style.opacity = 1;
			}, 500);

			dotsArray.forEach((dot, index) => {
				if (index === n) {
					dot.classList.add("active");
				} else {
					dot.classList.remove("active");
				}
			});
		}

		function nextSlide() {
			if (slideIndex === images.length - 1) {
				slideIndex = 0;
			} else {
				slideIndex++;
			}
			showSlide(slideIndex);
		}

		function prevSlide() {
			if (slideIndex === 0) {
				slideIndex = images.length - 1;
			} else {
				slideIndex--;
			}
			showSlide(slideIndex);
		}

		function toggleAutoSlide() {
			autoSlide = !autoSlide;
		}

		function autoSlideShow() {
			if (autoSlide) {
				nextSlide();
			}
			setTimeout(autoSlideShow, 5000); // Change slide every 5 seconds
		}

		dotsArray.forEach((dot, index) => {
			dot.addEventListener("click", () => {
				slideIndex = index;
				showSlide(slideIndex);
			});
		});

		prevBtn.addEventListener("click", prevSlide);
		nextBtn.addEventListener("click", nextSlide);

		carousel.addEventListener("mouseover", () => {
			toggleAutoSlide();
		});

		carousel.addEventListener("mouseleave", () => {
			toggleAutoSlide();
		});

		autoSlideShow();
	});
});