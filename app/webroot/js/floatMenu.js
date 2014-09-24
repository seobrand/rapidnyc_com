var name = "#floatMenu";
var menuYloc = null;

$(document).ready(function(){

	var floatAction = true;

	//if our screen isn't wide enough for our side float menu, then make it stay at the top
	if(document.body.clientWidth < 1200) {
		$("#floatMenuWrapper").addClass("noFloat");
		
		//if our screen is also too short or a mobile browser, then disable the menu's floating action
		if (document.body.clientHeight<600 || jQuery.browser.mobile || isiPad) {
			floatAction = false;
		}
	}
	
	//initialize the floating action (if it's still enabled)
	if (floatAction) {
		menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
		$(window).scroll(function () { 
			offset = menuYloc+$(document).scrollTop()+"px";
			$(name).animate({top:offset},{duration:500,queue:false});
		});
	}
	
	//apply a class to our first and last <li>, for css styling
	$("#floatMenu").find("li").first().addClass("first");
	$("#floatMenu").find("li").last().addClass("last");	
}); 
