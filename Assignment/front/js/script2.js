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



