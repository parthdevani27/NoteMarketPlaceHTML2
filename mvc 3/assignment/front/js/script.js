$(".toggle-password").on("click",function(e){
	let input = e.target.parentElement.parentElement.childNodes[3];
	var a=input.getAttribute("type");
		if(a=='password'){
			input.setAttribute("type","text");
		} else {	
		input.setAttribute("type","password");
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
	$('.dropdown-content').css('color', '#333333');	
	
	}
});





$(function () {

    // Show mobile nav
    $("#mobile-nav-open-btn").click(function () {
        $("#mobile-nav").css("height", "200%");
    });

    // Hide mobile nav
    $("#mobile-nav-close-btn").click(function () {
        $("#mobile-nav").css("height", "0%");
    });

});


$(document).ready(function(){
	$(".nav-dropdown-3").on('click',function(e){
		var a = $(".mobile-dropdown-content-3").css('display');
		if(a == 'block'){
			$(".mobile-dropdown-content-3").css('display','none');
		} else {
			$(".mobile-dropdown-content-3").css('display','block');
		}
		e.preventDefault();
		$(".mobile-dropdown-content").css('display','none');
		$(".mobile-dropdown-content-2").css('display','none');
	});
});






