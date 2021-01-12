$(".toggle-password").click(function() {

  $(this).toggleClass("eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
function sticky_header() {
    var header_height = jQuery('.site-header').innerHeight() / 2;
    var scrollTop = jQuery(window).scrollTop();;
    if (scrollTop > header_height) {
        jQuery('body').addClass('sticky-header');
		
    } else {
        jQuery('body').removeClass('sticky-header');
		
    }
}

jQuery(document).ready(function () {
  sticky_header();
	
});

jQuery(window).scroll(function () {
  sticky_header();  
	if( $(window).scrollTop() >= 100 ){
	$('.site-header .header-wrapper .navigation-wrapper .main-nav .menu-navigation>li a').css('color', '#333333');
	} else {
		$('.site-header .header-wrapper .navigation-wrapper .main-nav .menu-navigation>li a').css('color', '#fff');
	}
});






















