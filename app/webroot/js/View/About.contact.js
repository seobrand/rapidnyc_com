$(document).ready(function(){

	$("a.showOfficesLink").click(function() { 
		//hide the currently visible offices div
		$("div.office_list.active").hide('slow');
	
		//add a class to mark this as visible and show it
		var region_id = $(this).attr("region");
		$("#neighborhoods_region_"+region_id).show('slow');
		$("#neighborhoods_region_"+region_id).addClass("active"); 
				
		//clear the map and then show the markers for this region
		var mapId = "offices_map";
		var markers = gmap_getMarkers(mapId);
		gmap_toggleMarkers (mapId, markers, 'hide'); //clear map
		//get markers to show
		var params = [];
		params['region_id'] = region_id;
		var markers = gmap_getMarkers(mapId, params);
		gmap_toggleMarkers (mapId, markers, 'show');
		gmap_fitMarkers (mapId, 13); //fit map to new markers
		
	});
	
	
	//links to lead form
	$(".leadsLink").fancybox({
		autoSize	: true
	});

	
});