'use strict';
(function ($) {
	jQuery(window).on('elementor/frontend/init', function(){
		elementorFrontend.hooks.addAction('frontend/element_ready/revtes-slider.default', function ($scope, $) {
			var elem = $scope.find('.revtes_slider_wrapper');
			console.log(elem)
			var display_dots = $scope.find('.revtes_slider_wrapper').data('display-dots');
			if( display_dots == 'yes' ){
				display_dots = true;
			}else{
				display_dots = false;
			}

			var autoplay = $scope.find('.revtes_slider_wrapper').data('autoplay');
			if( autoplay == 'yes' ){
				autoplay = true;
			}else{
				autoplay = false;
			}

			var autoplaySpeed = 3000;
			if( autoplay == true ){
				autoplaySpeed = $scope.find('.revtes_slider_wrapper').data('autoplay-speed');
			}

			var slideSpeed = $scope.find('.revtes_slider_wrapper').data('slide-speed');
			if( slideSpeed <= 0 ){
				slideSpeed = 1000;
			}

			var slides_to_show = $scope.find('.revtes_slider_wrapper').data('slide-to-show');
			if( slides_to_show > 0 ){
				slides_to_show  = $scope.find('.revtes_slider_wrapper').data('slide-to-show');
			}else{
				slides_to_show = 3
			}

			var slides_to_scroll = $scope.find('.revtes_slider_wrapper').data('slides-to-scroll');
			if( slides_to_scroll > 0 ){
				slides_to_scroll  = $scope.find('.revtes_slider_wrapper').data('slides-to-scroll');
			}else{
				slides_to_scroll = 3
			}

			/*var pauseOnFocus = $scope.find('.revtes_slider_wrapper').data('pause-on-focus');
			if( pauseOnFocus == 'yes' ){
				pauseOnFocus = true;
			}else{
				pauseOnFocus = false;
			}*/

			var pauseOnHover = $scope.find('.revtes_slider_wrapper').data('pause-on-hover');
			if( pauseOnHover == 'yes' ){
				pauseOnHover = true;
			}else{
				pauseOnHover = false;
			}

			var pauseOnDotsHover = $scope.find('.revtes_slider_wrapper').data('pause-on-dots-hover');
			if( pauseOnDotsHover == 'yes' ){
				pauseOnDotsHover = true;
			}else{
				pauseOnDotsHover = false;
			}

			var slide_arrows = $scope.find('.revtes_slider_wrapper').data('arrows');
			if( slide_arrows == 'yes' ){
				slide_arrows = true;
			}else{
				slide_arrows = false;
			}

			var autoplay_speed = $scope.find('.revtes_slider_wrapper').data('autoplay-speed');
			
			var prev_arrow = $scope.find('.wb-arrow-prev');
			var next_arrow = $scope.find('.wb-arrow-next');
			console.log(slide_arrows);
			elem.slick({
				infinite: true,
				slidesToShow: slides_to_show,
				slidesToScroll: slides_to_scroll,
				autoplay: autoplay,
				autoplay_speed: autoplay_speed,
				arrows: true,
				prevArrow: prev_arrow,
				nextArrow: next_arrow,
				dots: display_dots,
				slide: '.comment-carousel',
				centerMode: true,
				centerPadding: '60px',
				draggable: true,
				focusOnSelect: false,
				swipe: true,
				adaptiveHeight: true,
				speed: slideSpeed,
				autoplaySpeed: autoplaySpeed,
				// pauseOnFocus : pauseOnFocus,
				pauseOnHover : pauseOnHover,
				pauseOnDotsHover : pauseOnDotsHover,
				 responsive: [
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2,
				      }
				    },
				    {
				      breakpoint: 480,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1,
				      }
				    },
				]
			});
		});
	});
})(jQuery);