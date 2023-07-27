$(document).ready(function(){
	var str=location.href.toLowerCase();
	
	$('#topnav li a').each(function() {
		if(str.indexOf(this.href.toLowerCase()) > -1) {
			$("li.active").removeClass("active");
			$(this).parent().addClass("active");
		}
	});
})