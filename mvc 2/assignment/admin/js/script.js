$(".toggle-password").on("click",function(){
	var a=$(".toggle-pwd").attr('type');
		if(a=='password'){
			$(".toggle-pwd").attr('type','text');
		} else {
			$(".toggle-pwd").attr('type','password');
		}

});

function sticky_header() {
    var header_height = $('.site-header').innerHeight() / 2;
    var scrollTop = $(window).scrollTop();;
    if (scrollTop > header_height) {
        $('body').addClass('sticky-header');
    } else {
        $('body').addClass('sticky-header');
    }
}

jQuery(document).ready(function () {
  sticky_header();
});


	






