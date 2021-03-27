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
		
	
	}
});




//$(document).ready(function(){
//	$(".validate").keyup(function(){
//		var a=$(".validate").val();
//		var p = /[0-9]/;
//		if(p.test(a)){
//		  alert("ok");
//		   } else {
//		   
//		   }
//	});
//});
//
//js local storage
$(document).ready(function(){
	$("#chk").on("click",function(){
		var a = $("#email").val();
		var b = $("input:password").val();
		localStorage.setItem("email",a);
		localStorage.setItem("password",b);	
	});
});
$(document).ready(function(){
	var a = localStorage.getItem("email");
	var b = localStorage.getItem("password");
	if(a != null && b != null){
		$("#chk").attr("checked",true);
		$("#email").val(a);
		$("input:password").val(b);
	} 	
});






