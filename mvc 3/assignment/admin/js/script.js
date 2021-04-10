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


$(document).ready( function () {


	var table = $('table').DataTable({
		'sDom' : '"top"i',
		"iDisplayLength":5,
		 info: false,
		language:{
			paginate:{
				next:'<img src="img/right-arrow.png">',
				previous:'<img src="img/left-arrow.png">'
			}
		}
	});
	
	$('.searchbtn').click(function(){
		var a = $(".searchbox").val();
		table.search(a).draw();
	});
	
});

$(document).ready(function(){
	$(".custom-select").change(function(){
		$("#downloadfilter").submit();
		
	});
	
//for display picture
$("#upload").on("click",function(){
	
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'textdisplaypic' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 
  infoArea.textContent = 'File name: ' + fileName;
	$("#textdisplaypic").css('color','#333333');
}

});
	//manage system config
$("#defaultnotepic").on("click",function(){
	
var input = document.getElementById( 'defaultnotepic' );
var infoArea = document.getElementById( 'textdisplay' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 
  infoArea.textContent = 'File name: ' + fileName;
	$("#textdisplay").css('color','#333333');
}

});
	
});

$(document).ready(function(){
	$(".unpublishbtn").click(function(){
	$(".unpublishform").submit();
	})
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
	$(".nav-dropdown").on('click',function(e){
		var a = $(".mobile-dropdown-content").css('display');
		if(a == 'block'){
			$(".mobile-dropdown-content").css('display','none');
		} else {
			$(".mobile-dropdown-content").css('display','block');
		}
		e.preventDefault();
		$(".mobile-dropdown-content-2").css('display','none');
		$(".mobile-dropdown-content-3").css('display','none');
	});
});
$(document).ready(function(){
	$(".nav-dropdown-2").on('click',function(e){
		var a = $(".mobile-dropdown-content-2").css('display');
		if(a == 'block'){
			$(".mobile-dropdown-content-2").css('display','none');
		} else {
			$(".mobile-dropdown-content-2").css('display','block');
		}
		e.preventDefault();
		$(".mobile-dropdown-content").css('display','none');
		$(".mobile-dropdown-content-3").css('display','none');
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


















