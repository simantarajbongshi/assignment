<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title -->
		<title>Survay Form</title>
		<!-- Required Meta Tags Always Come First -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="_token" content="{{ csrf_token() }}">
		{{-- <meta property="og:url" content="https://www.assamjatiyaparishad.org" />
		<meta property="og:type" content="Party Website" />
		<meta property="og:title" content="Assam First Always and Forever" />
		<meta property="og:description" content="Assam Jatiya Parishad" />
		<meta property="og:image" content="https://assamjatiyaparishad.org/img/fb_share_image/1200X630.jpg" /> --}}
		<!-- Favicon -->
		<link rel="shortcut icon" href="/favicon.ico">
		<!-- Google Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800">
		<!-- CSS Global Compulsory -->
		<link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
		<!-- CSS Global Icons -->
		<link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/vendor/icon-line/css/simple-line-icons.css">
		<link rel="stylesheet" href="/assets/vendor/icon-etlinefont/style.css">
		<link rel="stylesheet" href="/assets/vendor/icon-line-pro/style.css">
		<link rel="stylesheet" href="/assets/vendor/icon-hs/style.css">
		<link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsparallaxer.css">
		<link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
		<link rel="stylesheet" href="/assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
		<link rel="stylesheet" href="/assets/vendor/animate.css">
		<link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.min.css">
		<link rel="stylesheet" href="/assets/vendor/slick-carousel/slick/slick.css">
		<link rel="stylesheet" href="/assets/vendor/typedjs/typed.css">
		<link rel="stylesheet" href="/assets/vendor/hs-megamenu/src/hs.megamenu.css">
		<link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css">
		<link rel="stylesheet" href="/assets/vendor/master-slider/source/assets/css/masterslider.main.css">
		<!-- CSS Unify -->
		<link rel="stylesheet" href="/assets/css/unify-core.css">
		<link rel="stylesheet" href="/assets/css/unify-components.css">
		<link rel="stylesheet" href="/assets/css/unify-globals.css">
		<link rel="stylesheet" href="/uploadifive/uploadifive.css">
		<link rel="stylesheet" href="css/custom.css">
		<!-- CSS Customization -->
		<link rel="stylesheet" href="/assets/css/custom.css">

	</head>
	<body>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0&appId=843457116481976&autoLogAppEvents=1" nonce="VljgtAF5"></script>
		<main>
			@yield('content')
			<a class="js-go-to u-go-to-v1" href="#" data-type="fixed" data-position='{"bottom": 15, "right": 15}' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
				<i class="hs-icon hs-icon-arrow-top"></i>
			</a>
		</main>
		<div class="u-outer-spaces-helper"></div>
		<!-- JS Global Compulsory -->
		<script src="/assets/vendor/jquery/jquery.min.js"></script>
		<script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
		<script src="/assets/vendor/popper.js/popper.min.js"></script>
		<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
		<!-- JS Implementing Plugins -->
		<script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
		<script src="/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
		<script src="/assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
		<script src="/assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
		<script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
		<script src="/assets/vendor/slick-carousel/slick/slick.js"></script>
		<script src="/assets/vendor/typedjs/typed.min.js"></script>
		<script src="/assets/vendor/masonry/dist/masonry.pkgd.min.js"></script>
  		<script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  		<script src="/uploadifive/jquery.uploadifive.js"></script>
		<!-- JS Master Slider -->
		<script src="/assets/vendor/master-slider/source/assets/js/masterslider.min.js"></script>
		<!-- JS Unify -->
		<script src="/assets/js/hs.core.js"></script>
		<script src="/assets/js/components/hs.header.js"></script>
		<script src="/assets/js/helpers/hs.hamburgers.js"></script>
		<script src="/assets/js/components/hs.tabs.js"></script>
		<script src="/assets/js/components/hs.popup.js"></script>
		<script src="/assets/js/components/hs.carousel.js"></script>
		<script src="/assets/js/components/text-animation/hs.text-slideshow.js"></script>
		<script src="/assets/js/components/hs.go-to.js"></script>
		<!-- JS Customization -->
		<script src="/assets/js/custom.js"></script>
		<!-- JS Plugins Init. -->
		<script>
		$(document).on('ready', function () {
			// initialization of carousel
			$.HSCore.components.HSCarousel.init('.js-carousel');
			// initialization of tabs
			$.HSCore.components.HSTabs.init('[role="tablist"]');
			// initialization of popups
			$.HSCore.components.HSPopup.init('.js-fancybox');
			// initialization of go to
			$.HSCore.components.HSGoTo.init('.js-go-to');
			// initialization of text animation (typing)
			$(".u-text-animation.u-text-animation--typing").typed({
				strings: [
					"an awesome template",
					"perfect template",
					"just like a boss"
				],
				typeSpeed: 60,
				loop: true,
				backDelay: 1500
			});
		});
		$(window).on('load', function () {
			// initialization of header
			$.HSCore.components.HSHeader.init($('#js-header'));
			$.HSCore.helpers.HSHamburgers.init('.hamburger');
			// initialization of HSMegaMenu component
			$('.js-mega-menu').HSMegaMenu({
				event: 'hover',
				pageContainer: $('.container'),
				breakpoint: 991
			});
			// initialization of masonry
	        $('.masonry-grid').imagesLoaded().then(function () {
	          $('.masonry-grid').masonry({
	            columnWidth: '.masonry-grid-sizer',
	            itemSelector: '.masonry-grid-item',
	            percentPosition: true
	          });
	        });
		});
		$(window).on('resize', function () {
			setTimeout(function () {
				$.HSCore.components.HSTabs.init('[role="tablist"]');
			}, 200);
		});
		(function($) {
		    $.fn.inputFilter = function(inputFilter) {
		        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
		            if (inputFilter(this.value)) {
		                this.oldValue = this.value;
		                this.oldSelectionStart = this.selectionStart;
		                this.oldSelectionEnd = this.selectionEnd;
		            } else if (this.hasOwnProperty("oldValue")) {
		                this.value = this.oldValue;
		                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
		            }
		        });
		    };
		}(jQuery));
		</script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180193592-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-180193592-1');
		</script>
		@yield('customjs')
	</body>
</html>
