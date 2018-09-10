$( document ).ready(function() {
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 0) {
            $(".header").addClass('header-fixed');
        } else {
            $(".header").removeClass('header-fixed');
        }
    });
	$( ".header__language-button" ).on( "click", function( event ) {
	 	$(this).parent().toggleClass( "active" );
	});
    $( ".basket__link" ).on( "click", function( event ) {
        $(this).parent().toggleClass( "active" );
    });
    $( ".basket__block-close" ).on( "click", function( event ) {
        $('.basket').removeClass( "active" );
    });

	$( ".banner__select-button" ).on( "click", function( event ) {
		$(this).parent().toggleClass( "active" );
 });
 $( ".header__burger-button" ).on( "click", function( event ) {
	$('.header__burger').toggleClass( "active" );
	});
 $( ".top__sort-button" ).on( "click", function( event ) {
     $(this).parent().toggleClass( "active" );
 });
$( ".net-content-more" ).on( "click", function( event ) {
    $(this).parent().toggleClass( "active" );
});

 $(".banner__select ul").mCustomScrollbar({
	axis:"y",
	theme:"light-thin"
 });
 $('.top-slider-container').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        swipeToSlide: true,
        appendDots: '.top__slider-pagination',
        dots: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.media-slider-container').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        swipeToSlide: true,
        appendDots: '.media__slider-pagination',
        dots: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.adress-costs__slider-wrap').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        swipeToSlide: true,
        appendDots: '.adress-costs__slider-pagination',
        dots: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    (function($){
        $(".adress-costs__table").mCustomScrollbar({
            theme:"dark"
        });
    })(jQuery);
	var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||false;descriptor.configurable=true;if("value"in descriptor)descriptor.writable=true;Object.defineProperty(target,descriptor.key,descriptor);}}return function(Constructor,protoProps,staticProps){if(protoProps)defineProperties(Constructor.prototype,protoProps);if(staticProps)defineProperties(Constructor,staticProps);return Constructor;};}();function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor)){throw new TypeError("Cannot call a class as a function");}}var TextScramble=function(){function TextScramble(el){_classCallCheck(this,TextScramble);this.el=el;this.chars='apricodeAPRICODE';this.update=this.update.bind(this);}_createClass(TextScramble,[{key:'setText',value:function setText(newText){var _this=this;var oldText=this.el.innerText;var length=Math.max(oldText.length,newText.length);var promise=new Promise(function(resolve){return _this.resolve=resolve;});this.queue=[];for(var i=0;i<length;i++){var from=oldText[i]||'';var to=newText[i]||'';var start=Math.floor(Math.random()*70);var end=start+Math.floor(Math.random()*70);this.queue.push({from:from,to:to,start:start,end:end});}cancelAnimationFrame(this.frameRequest);this.frame=0;this.update();return promise;}},{key:'update',value:function update(){var output='';var complete=0;for(var i=0,n=this.queue.length;i<n;i++){var _queue$i=this.queue[i],from=_queue$i.from,to=_queue$i.to,start=_queue$i.start,end=_queue$i.end,char=_queue$i.char;if(this.frame>=end){complete++;output+=to;}else if(this.frame>=start){if(!char||Math.random()<0.28){char=this.randomChar();this.queue[i].char=char;}output+='<span class="apri-part">'+char+'</span>';}else{output+=from;}}this.el.innerHTML=output;if(complete===this.queue.length){this.resolve();}else{this.frameRequest=requestAnimationFrame(this.update);this.frame++;}}},{key:'randomChar',value:function randomChar(){return this.chars[Math.floor(Math.random()*this.chars.length)];}}]);return TextScramble;}();var phrases=['Продвижение - ','Разработка сайта : '];var el=document.querySelector('.apricode_copyright .apri-text');var fx=new TextScramble(el);var counter=0;var next=function next(){fx.setText(phrases[counter]).then(function(){setTimeout(next,2000);});counter=(counter+1)%phrases.length;};next();
	
	// $( ".fixed-tel" ).on( "click", function( event ) {
	// 	$(".header__bottom-nav").removeClass( "menu-active" );
	// 	$(this).removeClass( "dnone" );
	// 	$(".fixed-tel").removeClass( "active" );
	// 	$(this).toggleClass("active");
	// });
	// $( ".more-but" ).on( "click", function( event ) {
	// 	$(".seo__text-content").toggleClass( "seo__text-content-more" );
	// });
	// $( ".header__bottom-nav" ).on( "click", function( event ) {
	// 	$(".fixed-tel").removeClass( "active" );
	// 	$(".fixed-tel").toggleClass( "dnone" );
	// 	$(this).toggleClass("menu-active");
	// 	$(".header__bottom-navigation").toggleClass("header__bottom-navigation-active");
	// });
	// $( ".mobile-button-phones" ).on( "click", function( event ) {
	// 	$(".header__mobile-menu-login").removeClass( "active" );
	// 	$(".header__mobile-menu-taxi").removeClass( "active" );
	// 	$(".header__mobile-menu-nav").removeClass( "active" );
	// 	$(".header__bottom-navigation").removeClass( "header__bottom-navigation-active" );
	// 	$(".header__bottom-nav").removeClass( "menu-active" );
	// 	$(".fixed-tel").removeClass( "dnone" );
	// 	$(".header__mobile-menu-phones").toggleClass("active");
	// });
	// $( ".mobile-button-login" ).on( "click", function( event ) {
	// 	$(".header__mobile-menu-phones").removeClass( "active" );
	// 	$(".header__mobile-menu-taxi").removeClass( "active" );
	// 	$(".header__mobile-menu-nav").removeClass( "active" );
	// 	$(".header__bottom-navigation").removeClass( "header__bottom-navigation-active" );
	// 	$(".header__bottom-nav").removeClass( "menu-active" );
	// 	$(".header__mobile-menu-login").toggleClass("active");
	// });
	// $( ".mobile-button-taxi" ).on( "click", function( event ) {
	// 	$(".header__mobile-menu-phones").removeClass( "active" );
	// 	$(".header__mobile-menu-login").removeClass( "active" );
	// 	$(".header__mobile-menu-nav").removeClass( "active" );
	// 	$(".header__bottom-navigation").removeClass( "header__bottom-navigation-active" );
	// 	$(".header__bottom-nav").removeClass( "menu-active" );
	// 	$(".header__mobile-menu-taxi").toggleClass("active");
	// });
	// $( ".header__bottom-nav" ).on( "click", function( event ) {
	// 	$(".header__mobile-menu-login").removeClass( "active" );
	// 	$(".header__mobile-menu-taxi").removeClass( "active" );
	// 	$(".header__mobile-menu-phones").removeClass( "active" );
	// 	$(".header__mobile-menu-nav").toggleClass("active");
	// });
	
	// $(".header__top-bottom").clone().appendTo(".header__bottom-navigation");
	// $(".header__top-bottom").clone().appendTo(".header__mobile-menu-nav");
	// $(".header__bottom-numbers").clone().appendTo(".header__mobile-menu-phones");
	// $(window).scroll(function () {
  //   var header_top = $("header").height();
	// 	var scroll = $(window).scrollTop();
	// 	if (scroll > 0) {
	// 			$(".header__bottom-nav").addClass('scroled');
	// 	} else {
	// 			$(".header__bottom-nav").removeClass('scroled');
	// 			$(".header__bottom-navigation").removeClass("header__bottom-navigation-active");
	// 			$(".header__bottom-nav").removeClass("menu-active");
	// 			$(".fixed-tel").removeClass( "dnone" );
	// 	}
	// });
	// var textTitles = $('.clases__texts-slide h4');
	// if (textTitles.length){
	// 	for(var i=0 ; i < textTitles.length; i++){ 
	// 		textTitles[i].dataset.letter = textTitles[i].textContent.charAt(0);
	// 	};
	// };
	// var textContacts = $('.contacts-page__item h3');
	// if (textContacts.length){
	// 	for(var i=0 ; i < textContacts.length; i++){ 
	// 		textContacts[i].dataset.letter = textContacts[i].textContent.charAt(0);
	// 	};
	// };
	// var citytable =  $('.city-table');
	// if (citytable.length){
	// 	$(".city-table").mCustomScrollbar({
	// 		axis:"x",
	// 		theme: "dark"
	// 	});
	// };
	// var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||false;descriptor.configurable=true;if("value"in descriptor)descriptor.writable=true;Object.defineProperty(target,descriptor.key,descriptor);}}return function(Constructor,protoProps,staticProps){if(protoProps)defineProperties(Constructor.prototype,protoProps);if(staticProps)defineProperties(Constructor,staticProps);return Constructor;};}();function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor)){throw new TypeError("Cannot call a class as a function");}}var TextScramble=function(){function TextScramble(el){_classCallCheck(this,TextScramble);this.el=el;this.chars='apricodeAPRICODE';this.update=this.update.bind(this);}_createClass(TextScramble,[{key:'setText',value:function setText(newText){var _this=this;var oldText=this.el.innerText;var length=Math.max(oldText.length,newText.length);var promise=new Promise(function(resolve){return _this.resolve=resolve;});this.queue=[];for(var i=0;i<length;i++){var from=oldText[i]||'';var to=newText[i]||'';var start=Math.floor(Math.random()*70);var end=start+Math.floor(Math.random()*70);this.queue.push({from:from,to:to,start:start,end:end});}cancelAnimationFrame(this.frameRequest);this.frame=0;this.update();return promise;}},{key:'update',value:function update(){var output='';var complete=0;for(var i=0,n=this.queue.length;i<n;i++){var _queue$i=this.queue[i],from=_queue$i.from,to=_queue$i.to,start=_queue$i.start,end=_queue$i.end,char=_queue$i.char;if(this.frame>=end){complete++;output+=to;}else if(this.frame>=start){if(!char||Math.random()<0.28){char=this.randomChar();this.queue[i].char=char;}output+='<span class="apri-part">'+char+'</span>';}else{output+=from;}}this.el.innerHTML=output;if(complete===this.queue.length){this.resolve();}else{this.frameRequest=requestAnimationFrame(this.update);this.frame++;}}},{key:'randomChar',value:function randomChar(){return this.chars[Math.floor(Math.random()*this.chars.length)];}}]);return TextScramble;}();var phrases=['Дизайн сайта - ','Разработка сайта : '];var el=document.querySelector('.apricode_copyright .apri-text');var fx=new TextScramble(el);var counter=0;var next=function next(){fx.setText(phrases[counter]).then(function(){setTimeout(next,2000);});counter=(counter+1)%phrases.length;};next();
	// $('.tab-link').each(function(){
	// 	$('.tab-link').removeClass('active');
	// 	$('.tab-link:first-of-type').addClass('active');
	// 	$(this).on('click',function(e){
	// 			e.preventDefault();
	// 			e.stopPropagation();
	// 			$('.tab-link').removeClass('active');
	// 			$(this).addClass('active');
	// 			var data = $(this).attr('data-attr');
	// 			$('.tabs-content').hide();
	// 			$('.tabs-content.'+data+'').css('display','flex');
	// 	})
	// });
	// $(document).ready(function(){
	// 	$('.cards').inputmask("99");
	// 	$('.cardn').inputmask({"mask": "9999"});
	// 	$('.num').inputmask("9999999");
	// 	$('.itel').inputmask("+99-(999)-99-99-999");
	// });

	// $pct = 3; //проценты
	// var price = 0,
	// 		price_total = 0;
	// $("#price").val("");
	// $("#price_total").val("");
	// $("#price").keyup(function() {
	// 		$price = parseInt($(this).val());
	// 		if ($price > 0) {
	// 			$price_total = $price - (($price / 100) * $pct);
	// 			$("#price_total").html($price_total);
	// 			$("#price_total").val($price_total);
	// 		} else {
	// 			$("#price_total").html("");
	// 			$("#price_total").val("");
	// 		}
	// });

	// var price2 = 0,
	// 		price_total2 = 0;
	// $("#price2").val("");
	// $("#price_total2").val("");
	// $("#price2").keyup(function() {
	// 		$price2 = parseInt($(this).val());
	// 		if ($price2 > 0) {
	// 			$price_total2 = $price2 - (($price2 / 100) * $pct);
	// 			$("#price_total2").html($price_total2);
	// 			$("#price_total2").val($price_total2);
	// 		} else {
	// 			$("#price_total2").html("");
	// 			$("#price_total2").val("");
	// 		}
	// });

	// var price3 = 0,
	// 		price_total3 = 0;
	// $("#price3").val("");
	// $("#price_total3").val("");
	// $("#price3").keyup(function() {
	// 		$price3 = parseInt($(this).val());
	// 		if ($price3 > 0) {
	// 			$price_total3 = $price3 - (($price3 / 100) * $pct);
	// 			$("#price_total3").html($price_total3);
	// 			$("#price_total3").val($price_total3);
	// 		} else {
	// 			$("#price_total3").html("");
	// 			$("#price_total3").val("");
	// 		}
	// });
	// /*новые скрипты над этим комментом*/
	// $('.clases__texts-slider').slick({
	// 	slidesToShow: 1,
	// 	slidesToScroll: 1,
	// 	arrows: false,
	// 	fade: true,
	// 	asNavFor: '.clases__imgs-slider',
	// });
	
	// var $slider = $('.clases__imgs-slider');
	// if ($slider.length) {
	// 	var currentSlide;
	// 	var slidesCount;
	// 	var sliderCounter = document.createElement('div');
	// 	sliderCounter.classList.add('slider__counter');
		
	// 	var updateSliderCounter = function(slick, currentIndex) {
	// 		currentSlide = slick.slickCurrentSlide() + 1;
	// 		slidesCount = slick.slideCount;
	// 		$('.pagingInfo').text('0' + currentSlide + ' / ' + '0' + slidesCount)
	// 	};

	// 	$slider.on('init', function(event, slick) {
	// 		$slider.append(sliderCounter);
	// 		updateSliderCounter(slick);
	// 	});

	// 	$slider.on('afterChange', function(event, slick, currentSlide) {
	// 		updateSliderCounter(slick, currentSlide);
	// 	});

	// 	$slider.slick({
	// 		asNavFor: '.clases__texts-slider',
	// 		slidesToShow: 1,
	// 		slidesToScroll: 1,
	// 		fade: true,
	// 		prevArrow: '.clases__pag-prew',
	// 		nextArrow: '.clases__pag-next',
	// 	});
	// }
	// var eventFired = 0;
	// if ($(window).width() < 1024) {
	// 	$('.news-slider').slick({
	// 		infinite: true,
	// 		speed: 300,
	// 		slidesToShow: 2,
	// 		arrows: true,
	// 		prevArrow: '.news-prev-my',
	// 		nextArrow: '.news-next-my',
	// 		responsive: [
  //   {
  //     breakpoint: 768,
  //     settings: {
  //       slidesToShow: 1
  //     }
  //   }
  // ]
	// 	});
	// }
	// else {
	// 	$('.news-slider').slick('unslick');
	// 		eventFired = 1;
	// }
	// $(window).on('resize', function() {
  //   if (!eventFired) {
	// 		if ($(window).width() < 1024) {
	// 			$('.news-slider').slick({
	// 				infinite: true,
	// 				speed: 300,
	// 				slidesToShow: 2,
	// 				arrows: true,
	// 				prevArrow: '.news-prev-my',
	// 				nextArrow: '.news-next-my',
	// 				responsive: [
	// 		{
	// 			breakpoint: 768,
	// 			settings: {
	// 				slidesToShow: 1
	// 			}
	// 		}
	// 	]
	// 		});
	// 		} else {
	// 			$('.news-slider').slick('unslick');
	// 		}
  //   }
	// });

});