// JavaScript Document
$(document).ready(function(e) {
	
    $(".menu-item-has-children").hover(function(){
		$(".sub-menu", this).stop(true, true).delay(10).slideDown();
	}, function(){
		$(".sub-menu", this).stop(true, true).delay(10).slideUp();
	});

	$("#our-products .prod-cat").click(function(){
		var prod_kind = $(".prod-kind-label", this).text();
		var process_to = $(".prod-kind-label", this).attr("process_to") + "get_prod_cat.php";
		$.post(process_to,{prod_kind: prod_kind},function(data){
			$("#feed-back").html(data);	
		});
	});

	
	$('#loader-wrapper').addClass('animated fadeOut');
	$('#loader-wrapper').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).hide();	
	});
	$("#touristDest .touristDest:first-child").addClass("active");
	new WOW().init();
	
	
});