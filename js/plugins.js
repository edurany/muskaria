
(function($) {
  "use strict"; 
  // Can also be used with $(document).ready()
	
	$(window).load(function() {
	  //Flexslider
	  $('.flexslider').flexslider({
		animation: "fade"
	  });	  
	});
	
	// Carausel
	var getGridSize = function() {
	  return (window.innerWidth < 600) ? 1 :
			 (window.innerWidth < 900) ? 2 : 3;
	}

	$('.flexslider_carausel').flexslider({
		animation: "slide",
		animationLoop: true,
		itemWidth: 220,
		itemMargin: 0,
		minItems: getGridSize(), // use function to pull in initial value
		maxItems: getGridSize(), // use function to pull in initial value
		directionNav: true,
		controlNav: true,
		slideshow: true
	});
		
	var getGridSize2 = function() {
	  return (window.innerWidth < 600) ? 2 :
			 (window.innerWidth < 900) ? 2 : 4;
	}

	$('.feature_carausel').flexslider({
		animation: "slide",
		animationLoop: true,
		itemWidth: 220,
		itemMargin: 0,
		minItems: getGridSize2(), // use function to pull in initial value
		maxItems: getGridSize2(), // use function to pull in initial value
		directionNav: true,
		controlNav: true,
		slideshow: true
	});
	

	//Ticker
		var dd = $('.alith_ticker').easyTicker({
			direction: 'up',
			easing: 'easeInOutBack',
			speed: 'slow',
			interval: 4000,
			height: 'auto',
			visible: 4,
			mousePause: 1,
			controls: {
				up: '.up',
				down: '.down',
				toggle: '',
				playText: 'Play',
				stopText: 'Stop'
			}
		}).data('easyTicker');

  // Side Area
    jQuery('.open_sidebar_area, .close_sidebar_area').on("click", function () {
        jQuery('body').toggleClass("visible_sidebar_area");
        jQuery('header').toggleClass("header-relative");
    });

    // Scroll Wrap
    var scroll_pane_wrap = jQuery('.scroll_pane_wrap');
    if (scroll_pane_wrap.size() > 0) {
        scroll_pane_wrap.jScrollPane({
            autoReinitialise: true
        });
    }
	//back to top button
	$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});
	// Smart sticky navigat
	/*
		By Osvaldas Valutis, www.osvaldas.info
		Available for use under the MIT License
	*/	
( function ( document, window, index )
	{
		'use strict';

		var elSelector	= '.header',
			element		= document.querySelector( elSelector );

		if( !element ) return true;

		var elHeight		= 0,
			elTop			= 0,
			dHeight			= 0,
			wHeight			= 0,
			wScrollCurrent	= 0,
			wScrollBefore	= 0,
			wScrollDiff		= 0;

		window.addEventListener( 'scroll', function()
		{
			elHeight		= element.offsetHeight;
			dHeight			= document.body.offsetHeight;
			wHeight			= window.innerHeight;
			wScrollCurrent	= window.pageYOffset;
			wScrollDiff		= wScrollBefore - wScrollCurrent;
			elTop			= parseInt( window.getComputedStyle( element ).getPropertyValue( 'top' ) ) + wScrollDiff;

			if( wScrollCurrent <= 0 ) // scrolled to the very top; element sticks to the top
				element.style.top = '0px';

			else if( wScrollDiff > 0 ) // scrolled up; element slides in
				element.style.top = ( elTop > 0 ? 0 : elTop ) + 'px';

			else if( wScrollDiff < 0 ) // scrolled down
			{
				if( wScrollCurrent + wHeight >= dHeight - elHeight )  // scrolled to the very bottom; element slides in
					element.style.top = ( ( elTop = wScrollCurrent + wHeight - dHeight ) < 0 ? elTop : 0 ) + 'px';

				else // scrolled down; element slides out
					element.style.top = ( Math.abs( elTop ) > elHeight ? -elHeight : elTop ) + 'px';
			}

			wScrollBefore = wScrollCurrent;
		});

	}( document, window, 0 ));

( function ( document, window, index )
	{
		'use strict';

		var elSelector	= '.header-two-mainnav',
			element		= document.querySelector( elSelector );

		if( !element ) return true;

		var elHeight		= 0,
			elTop			= 0,
			dHeight			= 0,
			wHeight			= 0,
			wScrollCurrent	= 0,
			wScrollBefore	= 0,
			wScrollDiff		= 0;

		window.addEventListener( 'scroll', function()
		{
			elHeight		= element.offsetHeight;
			dHeight			= document.body.offsetHeight;
			wHeight			= window.innerHeight;
			wScrollCurrent	= window.pageYOffset;
			wScrollDiff		= wScrollBefore - wScrollCurrent;
			elTop			= parseInt( window.getComputedStyle( element ).getPropertyValue( 'top' ) ) + wScrollDiff;

			if( wScrollCurrent <= 0 ){ // scrolled to the very top; element sticks to the top
				element.style.top = '0px';	
				element.style.position = 'relative';
				$("body").removeClass("smartnav");				
			}	

			else if( wScrollDiff > 0 ) {// scrolled up; element slides in
				element.style.top = ( elTop > 0 ? 0 : elTop ) + 'px';
				element.style.position = 'fixed';
				element.style.width = '100%';
				$("body").addClass("smartnav");
			}

			else if( wScrollDiff < 0 ) // scrolled down
			{
				if( wScrollCurrent + wHeight >= dHeight - elHeight )  // scrolled to the very bottom; element slides in
					element.style.top = ( ( elTop = wScrollCurrent + wHeight - dHeight ) < 0 ? elTop : 0 ) + 'px';

				else // scrolled down; element slides out
					element.style.top = ( Math.abs( elTop ) > elHeight ? -elHeight : elTop ) + 'px';
			}

			wScrollBefore = wScrollCurrent;
		});

	}( document, window, 0 ));	
	
	( function ( document, window, index )
	{
		'use strict';

		var elSelector	= '.header-three-mainnav',
			element		= document.querySelector( elSelector );

		if( !element ) return true;

		var elHeight		= 0,
			elTop			= 0,
			dHeight			= 0,
			wHeight			= 0,
			wScrollCurrent	= 0,
			wScrollBefore	= 0,
			wScrollDiff		= 0;

		window.addEventListener( 'scroll', function()
		{
			elHeight		= element.offsetHeight;
			dHeight			= document.body.offsetHeight;
			wHeight			= window.innerHeight;
			wScrollCurrent	= window.pageYOffset;
			wScrollDiff		= wScrollBefore - wScrollCurrent;
			elTop			= parseInt( window.getComputedStyle( element ).getPropertyValue( 'top' ) ) + wScrollDiff;

			if( wScrollCurrent <= 0 ){ // scrolled to the very top; element sticks to the top
				element.style.top = '0px';	
				element.style.position = 'relative';				
			}	

			else if( wScrollDiff > 0 ) {// scrolled up; element slides in
				element.style.top = ( elTop > 0 ? 0 : elTop ) + 'px';
				element.style.position = 'fixed';
				element.style.width = '100%';
			}

			else if( wScrollDiff < 0 ) // scrolled down
			{
				if( wScrollCurrent + wHeight >= dHeight - elHeight )  // scrolled to the very bottom; element slides in
					element.style.top = ( ( elTop = wScrollCurrent + wHeight - dHeight ) < 0 ? elTop : 0 ) + 'px';

				else // scrolled down; element slides out
					element.style.top = ( Math.abs( elTop ) > elHeight ? -elHeight : elTop ) + 'px';
			}

			wScrollBefore = wScrollCurrent;
		});

	}( document, window, 0 ));
	
/* ==============================================
BANNER -->
=============================================== */
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });
/* ==============================================
BACK TOP -->
=============================================== */
    jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 1) {
    jQuery('.topbutton').css({bottom:"25px"});
    } else {
    jQuery('.topbutton').css({bottom:"-100px"});
    }
    });
    jQuery('.topbutton').click(function(){
    jQuery('html, body').animate({scrollTop: '0px'}, 800);
    return false;
    });
})(jQuery);

/************************************************
RETINA DISPLAY
************************************************/
!function(){function t(){}function e(t){return r.retinaImageSuffix+t}function i(t,i){if(this.path=t||"","undefined"!=typeof i&&null!==i)this.at_2x_path=i,this.perform_check=!1;else{if(void 0!==document.createElement){var n=document.createElement("a");n.href=this.path,n.pathname=n.pathname.replace(o,e),this.at_2x_path=n.href}else{var a=this.path.split("?");a[0]=a[0].replace(o,e),this.at_2x_path=a.join("?")}this.perform_check=!0}}function n(t){this.el=t,this.path=new i(this.el.getAttribute("src"),this.el.getAttribute("data-at2x"));var e=this;this.path.check_2x_variant(function(t){t&&e.swap()})}var a="undefined"==typeof exports?window:exports,r={retinaImageSuffix:"@2x",check_mime_type:!0,force_original_dimensions:!0};a.Retina=t,t.configure=function(t){null===t&&(t={});for(var e in t)t.hasOwnProperty(e)&&(r[e]=t[e])},t.init=function(t){null===t&&(t=a);var e=t.onload||function(){};t.onload=function(){var t,i,a=document.getElementsByTagName("img"),r=[];for(t=0;t<a.length;t+=1)i=a[t],i.getAttributeNode("data-no-retina")||r.push(new n(i));e()}},t.isRetina=function(){var t="(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx)";return a.devicePixelRatio>1?!0:a.matchMedia&&a.matchMedia(t).matches?!0:!1};var o=/\.\w+$/;a.RetinaImagePath=i,i.confirmed_paths=[],i.prototype.is_external=function(){return!(!this.path.match(/^https?\:/i)||this.path.match("//"+document.domain))},i.prototype.check_2x_variant=function(t){var e,n=this;return this.is_external()?t(!1):this.perform_check||"undefined"==typeof this.at_2x_path||null===this.at_2x_path?this.at_2x_path in i.confirmed_paths?t(!0):(e=new XMLHttpRequest,e.open("HEAD",this.at_2x_path),e.onreadystatechange=function(){if(4!==e.readyState)return t(!1);if(e.status>=200&&e.status<=399){if(r.check_mime_type){var a=e.getResponseHeader("Content-Type");if(null===a||!a.match(/^image/i))return t(!1)}return i.confirmed_paths.push(n.at_2x_path),t(!0)}return t(!1)},e.send(),void 0):t(!0)},a.RetinaImage=n,n.prototype.swap=function(t){function e(){i.el.complete?(r.force_original_dimensions&&(i.el.setAttribute("width",i.el.offsetWidth),i.el.setAttribute("height",i.el.offsetHeight)),i.el.setAttribute("src",t)):setTimeout(e,5)}"undefined"==typeof t&&(t=this.path.at_2x_path);var i=this;e()},t.isRetina()&&t.init(a)}();


/************************************************
TICKER
************************************************/

(function(e){e.fn.tickerme=function(t){var n=e.extend({},e.fn.tickerme.defaults,t);return this.each(function(){function a(){e(t).hide();e("body").prepend(r).prepend(i);var n='<div id="ticker_container">';n+='<div id="newscontent"><div id="news"></div></div>';n+='<div id="controls">';n+='<a href="#" id="pause_trigger"><svg class="icon icon-pause" viewBox="0 0 32 32"><use xlink:href="#icon-pause"></use></svg></a>';n+='<a href="#" id="play_trigger" style="display:none"><svg class="icon icon-play" viewBox="0 0 32 32"><use xlink:href="#icon-play"></use></svg></a>';n+='<a href="#" id="prev_trigger"><svg class="icon icon-prev" viewBox="0 0 32 32"><use xlink:href="#icon-prev"></use></svg></a>';n+='<a href="#" id="next_trigger"><svg class="icon icon-next" viewBox="0 0 32 32"><use xlink:href="#icon-next"></use></svg></a>';n+="</div>";n+="</div>";e(n).insertAfter(t);e(t).children().each(function(t){s[t]=e(this).html()});f()}function f(){if(o==s.length-1){o=0}else{o++}if(n.type=="fade"){e("#news").fadeOut(n.fade_speed,function(){e("#newscontent").html('<div id="news">'+s[o]+"</div>");e("#news").fadeIn(n.fade_speed)})}u=setTimeout(f,n.duration)}var t=e(this);var r='<svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="224" height="32" viewBox="0 0 224 32"><defs><g id="icon-play"><path class="path1" d="M6 4l20 12-20 12z"></path></g><g id="icon-pause"><path class="path1" d="M4 4h10v24h-10zM18 4h10v24h-10z"></path></g><g id="icon-prev"><path class="path1" d="M18 5v10l10-10v22l-10-10v10l-11-11z"></path></g><g id="icon-next"><path class="path1" d="M16 27v-10l-10 10v-22l10 10v-10l11 11z"></path></g></defs></svg>';var i='<style type="text/css">#ticker_container{width:100%}#newscontent{float:left}#news{display:none}#controls{float:right;height:16px}.icon{display:inline-block;width:16px;height:16px;fill:'+n.control_colour+"}.icon:hover{fill:"+n.control_rollover+"}</style>";var s=[];var o=-1;var u;a();e("a#pause_trigger").click(function(){clearTimeout(u);e(this).hide();e("#play_trigger").show();return false});e("a#play_trigger").click(function(){f();e(this).hide();e("#pause_trigger").show();return false});e("a#prev_trigger").click(function(){if(o==0){o=s.length-1}else{o--}e("#newscontent").html('<div id="news" style="display:block">'+s[o]+"</div>");if(n.auto_stop)e("a#pause_trigger").trigger("click");return false});e("a#next_trigger").click(function(){if(o==s.length-1){o=0}else{o++}e("#newscontent").html('<div id="news" style="display:block">'+s[o]+"</div>");if(n.auto_stop)e("a#pause_trigger").trigger("click");return false})})};e.fn.tickerme.defaults={fade_speed:500,duration:3e3,auto_stop:true,type:"fade",control_colour:"#333333",control_rollover:"#666666"}})(jQuery)
