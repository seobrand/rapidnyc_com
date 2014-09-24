$(document).ready(function() {

	//set the sort selector to rediect to the corresponding sort link (on change)
	$("select.sortResults").change(function(){ 
		//get the sort link that matches the value
		if($(this).val()) {
			var link = $("a.sortResultsLink." + $(this).val()).attr("href");
			if (link) {
				window.location.replace(link);
			}
		}
	});
	
	//select the current sort
	var sortLink = $("a.sortResultsLink.active");
	$("select.sortResults").children("option").each(function() {
		if (sortLink.hasClass( $(this).val() )) {
			$(this).attr("SELECTED","SELECTED");
		}
	});



	//links to contact info
	$(".agentCardLink").fancybox({
		autoSize	: true
	});
	
	//links to lead form
	$(".leadsLink").fancybox({
		autoSize	: true
	});
	

});