(function($) {

	"use strict";

	$( document ).ready(function() {

		if ($('#wpadminbar').length > 0) {
		
			$('#header-main-fixed').css('top', $('#wpadminbar').height() + 'px');
			$('#wpadminbar').css('position', 'fixed');
		}

    	$('.nav-icon').on('click', function(e) {

      		$('#body-content-wrapper')
      			.toggleClass('header-main-fixed-closed')
      			.toggleClass('header-main-fixed-expanded');
    	});

    	if ( $(window).width() >= 800 ) {
    	$('#navmain > div > ul > li').each(
        	function() {
          		if ($(this).find('> ul.sub-menu').length > 0) {
            		$(this).prepend('<span class="sub-menu-item-toggle"></span>');
          		}
        	}
      	);

    }

    	$('#navmain').on('focusin', function(){

    		if ( $('#body-content-wrapper').hasClass('header-main-fixed-closed') )
    			$('#body-content-wrapper').removeClass('header-main-fixed-closed');
/*t
	        $('#navmain > div > ul').css({'right': 'auto'});
	        $('#navmain ul ul').css({'right': 'auto'}).css({'position': 'relative'});

	        $('.sub-menu-item-toggle').addClass('sub-menu-item-toggle-expanded');
t*/
    	});

   $('.sub-menu-item-toggle').on('click', function(e) {

			e.stopPropagation();

      		var subMenu = $(this).parent().find('> ul.sub-menu');

      		$('#navmain ul ul.sub-menu').not(subMenu).css('right', '-99999px').css('position', 'absolute');
      		$('#navmain span.sub-menu-item-toggle').not(this).removeClass('sub-menu-item-toggle-expanded');
      		$(this).toggleClass('sub-menu-item-toggle-expanded');
      		if (subMenu.css('right') == '-99999px') {

        subMenu.css({'right': 'auto'}).css({'position': 'relative'});
        subMenu.find('ul.sub-menu').css({'right': 'auto'}).css({'position': 'relative'});

     } else {

        subMenu.css({'right': '-99999px'}).css({'position': 'absolute'});
        subMenu.find('ul.sub-menu').css({'right': '-99999px'}).css({'position': 'absolute'});
     }
    	});

		$('#navmain > div').on('click', function(e) {
			e.stopPropagation();
			var parentOffset = $(this).parent().offset(); 
      		var relY = e.pageY - parentOffset.top;
    
      		if (relY < 36) {
        		var firstChild = $('ul:first-child', this);

        if (firstChild.css('right') == '-99999px')
            firstChild.css({'right': 'auto'});
        else
            firstChild.css({'right': '-99999px'});

        firstChild.parent().toggleClass('mobile-menu-expanded');
      		}
		});

		$(window).on('scroll', function () {

			if ($(this).scrollTop() > 100) {

				$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		});

		$('.scrollup').on('click', function () {
			
			$("html, body").animate({
				  scrollTop: 0
			  }, 600);

			return false;
		});

		if ( $(window).width() < 800 ) {
		
			$('#navmain > div > ul > li').each(
		       function() {
		         if ($(this).find('> ul.sub-menu').length > 0) {

		           $(this).prepend('<span class="sub-menu-item-toggle"></span>');
		         }
		       }
		     );

		   $('#navmain').on('focusin', function(){

      if ($('#navmain > div > ul').css('right') == '-99999px') {

        $('#navmain > div > ul').css({'right': 'auto'});
        $('#navmain ul ul').css({'right': 'auto'}).css({'position': 'relative'});

        $('.sub-menu-item-toggle').addClass('sub-menu-item-toggle-expanded');
      }
    });

   $('.sub-menu-item-toggle').on('click', function(e) {

		     e.stopPropagation();

		     var subMenu = $(this).parent().find('> ul.sub-menu');

		     $('#navmain ul ul.sub-menu').not(subMenu).css('right', '-99999px').css('position', 'absolute');
		     $(this).toggleClass('sub-menu-item-toggle-expanded');
		     if (subMenu.css('right') == '-99999px') {

        subMenu.css({'right': 'auto'}).css({'position': 'relative'});
        subMenu.find('ul.sub-menu').css({'right': 'auto'}).css({'position': 'relative'});

     } else {

        subMenu.css({'right': '-99999px'}).css({'position': 'absolute'});
        subMenu.find('ul.sub-menu').css({'right': '-99999px'}).css({'position': 'absolute'});
     }
		   });

		}

		$('#navmain > div').on('click', function(e) {

			e.stopPropagation();

			// toggle main menu
			if ( $(window).width() < 800 ) {

				var parentOffset = $(this).parent().offset(); 
				
				var relY = e.pageY - parentOffset.top;
			
				if (relY < 36) {
				
					var firstChild = $('ul:first-child', this);

        if (firstChild.css('right') == '-99999px')
            firstChild.css({'right': 'auto'});
        else
            firstChild.css({'right': '-99999px'});

        firstChild.parent().toggleClass('mobile-menu-expanded');
				}
			}
		});
	});

	function shogunlite_classCallCheck(e, t) {
	    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
	}

	var shogunlite_createClass = function() {
	    function e(e, t) {
	        for (var n = 0; n < t.length; n++) {
	            var i = t[n];
	            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
	        }
	    }
	    return function(t, n, i) {
	        return n && e(t.prototype, n), i && e(t, i), t
	    }
	}();

	! function($, e, t, n) {
	    var i = "liquidParticles",
	        a = {
	            asBG: !1,
	            particles: {
	                number: {
	                    value: 40,
	                    density: {
	                        enable: !1,
	                        value_area: 800
	                    }
	                },
	                color: {
	                    value: ["#f7ccaf",
	                    		"#f6cacd",
	                    		"dbf5f8",
	                    		"#c5d8f8",
	                    		"#c5f8ce",
	                    		"#f7afbd",
	                    		"#b2d6ef",
	                    		"#f1ecb7"]
	                },
	                shape: {
	                    type: "triangle"
	                },
	                size: {
	                    value: 55,
	                    random: !0,
	                    anim: {
	                        enable: !0,
	                        speed: 1
	                    }
	                },
	                move: {
	                    direction: "right",
	                    attract: {
	                        enable: !0
	                    }
	                },
	                line_linked: {
	                    enable: !1
	                }
	            },
	            interactivity: {
	                events: {
	                    onhover: {
	                        enable: !1
	                    },
	                    onclick: {
	                        enable: !1
	                    }
	                }
	            }
	        },
	        s = function() {
	            function e(t, n) {
	                shogunlite_classCallCheck(this, e), this.element = t, this.$element = $(t), this.options = $.extend({}, a, n), this.options.particles = $.extend({}, a.particles, n.particles), this.options.interactivity = $.extend({}, a.interactivity, n.interactivity), this._defaults = a, this._name = i, this.build()
	            }
	            return shogunlite_createClass(e, [{
	                key: "build",
	                value: function e() {
	                    this.id = this.element.id, this.isInitialized = !1, this.asSectionBg(), this.initIO()
	                }
	            }, {
	                key: "initIO",
	                value: function e() {
	                    var t = this,
	                        n = function e(n, i) {
	                            n.forEach(function(e) {
	                                e.isIntersecting ? (t.$element.removeClass("invisible"), t.isInitialized || (t.isInitialized = !0, t.init())) : t.$element.addClass("invisible")
	                            })
	                        };
	                    new IntersectionObserver(n, {
	                        rootMargin: "10%"
	                    }).observe(this.element)
	                }
	            }, {
	                key: "init",
	                value: function e() {
	                    particlesJS(this.id, this.options)
	                }
	            }, {
	                key: "asSectionBg",
	                value: function e() {
	                    if (this.options.asBG) {
	                        var cirlceWrapper = $('<div class="circles-wrapper"></div>'),
	                            circleContainer = this.$element.parent(".circles-container"),
	                            vcRow = this.$element.parents(".vc_row").last(),
	                            ldContainer = vcRow.children(".ld-container"),
	                            lqdStickyBg = vcRow.children(".lqd-sticky-bg-wrap");
	                        cirlceWrapper.append(circleContainer), 
	                        	lqdStickyBg.length ? cirlceWrapper.appendTo(lqdStickyBg) : vcRow.hasClass("pp-section") 
	                        			 ? cirlceWrapper.prependTo(vcRow) : cirlceWrapper.insertBefore(ldContainer);
	                    }
	                }
	            }]), e
	        }();
	    $.fn[i] = function(e) {
	        return this.each(function() {
	            var t = $(this).data("particles-options") || e;
	            $.data(this, "plugin_" + i) || $.data(this, "plugin_" + i, new s(this, t))
	        })
	    }
	}(jQuery, window, document), jQuery(document).ready(function($) {
	    $("[data-particles=true]").filter(function(e, t) {
	        return !$(t).closest(".vc_row.pp-section").length
	    }).liquidParticles()
	});

})(jQuery);


/*t Slider t*/
document.addEventListener('DOMContentLoaded', function() {
    const title1 = document.getElementById('title1');
    const title2 = document.getElementById('title2');

    // Initial animation after 750ms delay
    setTimeout(() => {
        title1.style.transform = 'translate(-50%, -50%) scale(1)';
        title1.style.opacity = '1';
    }, 750);

    setTimeout(() => {
        title2.style.transform = 'translate(-50%, -50%) scale(1)';
        title2.style.opacity = '1';
    }, 800);

    setTimeout(() => {
        document.getElementById('subtitle').style.opacity = "1";
        document.getElementById('subtitle').style.transform = 'translate(-50%, -50%) scale(1)';
    }, 950);

    setTimeout(() => {
        document.getElementById('slider-button-wrappers').style.opacity = "1";
        document.getElementById('slider-button-wrappers').style.transform = "translate(-50%, -50%) scale(1)";
    }, 1100);
});