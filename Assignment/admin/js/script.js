function sticky_header() {
    var header_height = jQuery('.site-header').innerHeight() / 2;
    var scrollTop = jQuery(window).scrollTop();;
    if (scrollTop > header_height) {
        jQuery('body').addClass('sticky-header');
    } else {
        jQuery('body').addClass('sticky-header');
    }
}

jQuery(document).ready(function () {
  sticky_header();
});

jQuery(window).load(function () {
  sticky_header();  
});
jQuery(window).resize(function () {
  sticky_header();
});


	jquery("#mobile-menu-btn").click(function (){
		alert("sxsxs.");
    });







