$(document).ready(function(){
	$(".arrow-up, .arrow-up, .login_form").hide();
	$("#loginact").click(function(){
		$(".arrow-up, .arrow-up").fadeToggle();
		$(".login_form, .home-op").slideToggle();
		$(".arrow_up,.sigin_form").hide();
	});
});
$(document).ready(function(){
	$(".arrow_up,.sigin_form").hide();
	$("#siginact").click(function(){
		$(".arrow_up").fadeToggle();
		$(".sigin_form, .home-op").slideToggle();
		$(".arrow-up, .arrow-up,.login_form").hide();
	});
});
$(document).ready(function(){
	$(".nav-text").click(function(){
		$(".arrow_up, .arrow-up").hide();
		$(".sigin_form, .login_form").hide();
	});
});