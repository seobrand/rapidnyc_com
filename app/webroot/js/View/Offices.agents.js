$(document).ready(function() {

	//link agent cards to agent website
	$("div.agentDiv").click(function() {
		var agent_website = $(this).attr('website_alias');
		if (agent_website { 
			window.location.replace('/'+agent_website+'/listings/search');
		}
	});
	
});