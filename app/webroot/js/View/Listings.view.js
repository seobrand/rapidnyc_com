//move the nabewise description to fit our template
$(document).ready(function() {
	
	$(".neighborhoodDescription").html($(".nabewise_recent_review p").html());
	$(".nabewise_link").attr("href",$(".nabewise_read_more").attr("href"));


	//links to contact info
	$(".agentCardLink").fancybox({
		autoSize	: true
	});
	
	//links to lead form
	$(".leadsLink").fancybox({
		autoSize	: true
	});
	

});






//setup google map initialization function
var geocoder;
var maps = new Array;
var markers = new Array;
function initialize(mapName, initialLat, initialLong) {
    geocoder = new google.maps.Geocoder();
	if (!geocoder) {
		alert ('Google Maps did not load properly.');
	}
	var latlng = new google.maps.LatLng(initialLat, initialLong);
    var myOptions = {
      zoom: 15,
      center: latlng,
	  mapTypeControl: true,
      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
      navigationControl: true,
      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
      mapTypeId: google.maps.MapTypeId.ROADMAP  
    }

	maps[mapName] = new google.maps.Map(document.getElementById(mapName), myOptions);
	
	
	//DRAW A CIRCLE
	var map = maps[mapName];
	var image1 = "/img/rapid/gmap-blue_circle.png";
	
	var boxOptions1 = {
	  imageSrc: image1,
	  kmX: .5
	}
	var overlay1 = new KmBox(map, latlng , boxOptions1);
}
