$(document).ready(function(){
	
	$(".toggler").click(function(){
		if ($('.navbar-nav.mr-auto').hasClass('show')) {
			$('.navbar-nav.mr-auto').removeClass('show');
			$('.navbar-nav.mr-auto').addClass('hide');
		}else{
			$('.navbar-nav.mr-auto').addClass('show');
			$('.navbar-nav.mr-auto').removeClass('hide');
		}
	});
});