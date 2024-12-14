/**
  * Theme Js file.
**/

jQuery('document').ready(function($){
  setTimeout(function () {
    jQuery(".loader").fadeOut("slow");
  },1000);
});

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

// ===== Mobile responsive Menu ====

function boxing_martial_arts_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function boxing_martial_arts_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.headerbox').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.headerbox').addClass("stick_head");
    } else {
      jQuery('.headerbox').removeClass("stick_head");
    }
  }
});
