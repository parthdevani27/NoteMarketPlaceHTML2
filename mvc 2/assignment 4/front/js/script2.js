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



$(document).ready(function(){
	$('.collaps').on('shown.bs.collapse',function(){
		$(this).parent().find('img').attr('src','images/FAQ/minus.png');
		$(this).parent().find('.card-header').css('bacground-color','#fff').css('border-bottom','none');
	});
		$('.collaps').on('hidden.bs.collapse',function(){
		$(this).parent().find('img').attr('src','images/FAQ/add.png');
		$(this).parent().find('.card-header').css('bacground-color','rgba(0,0,0,.03)').css('border-bottom','1px solid rgba(0,0,0,.2)');
	});
});



$(".toggle-password").click(function() {

  $(this).toggleClass("eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

// add notes  js--------------------------


//for notes
$("#upnotes").on("click",function(){
var input = document.getElementById( 'upnotes' );
var infoArea = document.getElementById( 'remove-text' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 var c = upnotes.files.length;
  infoArea.textContent =  c +' '+'Files';
	$("#remove-text").css('color','#333333');
}
	});



//for display picture
$("#displaypicture").on("click",function(){
	
var input = document.getElementById( 'displaypicture' );
var infoArea = document.getElementById( 'textdisplaypic' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 
  infoArea.textContent = 'File name: ' + fileName;
	$("#textdisplaypic").css('color','#333333');
}

});

//for notes preview
$("#notepreview1").on("click",function(){
	
var input = document.getElementById( 'notepreview1' );
var infoArea = document.getElementById( 'previewtext' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 
  infoArea.textContent = 'File name: ' + fileName;
	$("#previewtext").css('color','#333333');
}

});

$("#notepreview2").on("click",function(){
	
var input = document.getElementById( 'notepreview2' );
var infoArea = document.getElementById( 'previewtext' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 
  infoArea.textContent = 'File name: ' + fileName;
	$("#previewtext").css('color','#333333');
}

});
//for notes preview
$("#upload").on("click",function(){
	
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'uppictext' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 
  infoArea.textContent = 'File name: ' + fileName;
	$("#uppictext").css('color','#333333');
}

});


$("#upnotes1").on("click",function(){
	
var input = document.getElementById( 'upnotes1' );
var infoArea = document.getElementById( 'uppictext' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
 
  infoArea.textContent = 'File name: ' + fileName;
	$("#uppictext").css('color','#333333');
}

});


//for paid notes
$("#inlineRadio2").click(function(){
$(".forpaidviewthis").css("display","block");
	$("#validationDefault08").prop("required",true);
	$("#notepreview1").prop("required",true);
	$("#savetodraft").on("click",function(){
	var b = $("#notepreview1").val();
	if(b == ''){
		$("#previewtext").text("Fill this field").css("color","#ff3636");
	}
		});
});


//for free notes
	$("#inlineRadio1").click(function(){
$(".forpaidviewthis").css("display","none");
		$("#validationDefault08").prop("required",false);
		$("#notepreview1").prop("required",false);
		
	var b = $("#notepreview1").val();
	if(b == ''){
		$("#previewtext").text("Upload a file").css("color","lightgray");
	}
		$("#savetodraft").on("click",function(){
	var b = $("#notepreview1").val();
	if(b == ''){
		$("#previewtext").text("Upload a file").css("color","lightgray");
	}
		});
		
});


//if upload notes field is empty
$("#savetodraft").on("click",function(){
	var a = $("#upnotes").val();
	if(a == ''){
		$("#remove-text").text("Fill this field").css("color","#ff3636");
		$(window).scrollTop(370);
		
	}
});

 
$(document).ready( function () {


	var table = $('table').DataTable({
		'sDom' : '"top"i',
		"iDisplayLength":10,
		 info: false,
		language:{
			paginate:{
				next:'<img src="images/Search/right-arrow.png">',
				previous:'<img src="images/Search/left-arrow.png">'
			}
		}
	});
	
	$('.searchbtn').click(function(){
		var a = $(".searchbox").val();
		table.search(a).draw();
	});
	
});


$(document).ready(function(){
	updateNames();
//	setInterval(function(){
//	},600); 
$("#inlineFormCustomSelectPref1").change(function(){
	updateNames();
});
$("#inlineFormCustomSelectPref2").change(function(){
	updateNames();
});
$("#inlineFormCustomSelectPref3").change(function(){
	updateNames();
});
$("#inlineFormCustomSelectPref4").change(function(){
	updateNames();
});
$("#inlineFormCustomSelectPref5").change(function(){
	updateNames();
});	
$("#inlineFormCustomSelectPref6").change(function(){
	updateNames();
});	
$("#booksearchbox").on("keyup",function(){
	updateNames(); 
});
$("#bookshow").on('click' , 'a.page-link',function(e){
	console.log(e.target);
	var pg  = e.target.childNodes[0].nodeValue;
	e.preventDefault();
	var typ  = $("#inlineFormCustomSelectPref1").val();
	var cat  = $("#inlineFormCustomSelectPref2").val();
	var uni  = $("#inlineFormCustomSelectPref3").val();
	var corc = $("#inlineFormCustomSelectPref4").val();
	var cotry = $("#inlineFormCustomSelectPref5").val();
	var rat = $("#inlineFormCustomSelectPref6").val();
	var s = $("#booksearchbox").val();
		$.ajax({

			url: 'includes/search.php',
			data: {search:s,type:typ,category:cat,collage:uni,course:corc,rating:rat,country:cotry,pageno:pg},
			type: 'POST',
			success: function(data){
				if (!data.error) {
					$("#bookshow").html(data);
				}
			}
		});
     
});

});


function updateNames() {

	var typ  = $("#inlineFormCustomSelectPref1").val();
	var cat  = $("#inlineFormCustomSelectPref2").val();
	var uni  = $("#inlineFormCustomSelectPref3").val();
	var corc = $("#inlineFormCustomSelectPref4").val();
	var cotry = $("#inlineFormCustomSelectPref5").val();
	var rat = $("#inlineFormCustomSelectPref6").val();
	var s = $("#booksearchbox").val();
		$.ajax({

			url: 'includes/search.php',
			data: {search:s,type:typ,category:cat,collage:uni,course:corc,country:cotry,rating:rat},
			type: 'POST',
			success: function(data){
				if (!data.error) {
					$("#bookshow").html(data);
				}
			}
		});
}



$(document).ready(function(){
	$("#paidnotedownload").click(function(){

		var id = $("#noteid10").val();
		$.ajax({

			url: 'includes/downloadpaidnote.php',
			data: {id:id},
			type: 'POST',
			success: function(data){
				if (!data.error) {
					
				}
			}
		});
	});
});



















