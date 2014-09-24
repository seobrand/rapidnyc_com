
$(document).ready(function(){

	//setup our regions list to be more pretty (adjusting for cakephp formhelper's shortcomings… or perhaps for our overly-particular css and jquery desires)
	$("div.bigCheckbox.regionCheckbox").each(function() {
		$(this).find("input").attr("class","bigCheckbox regionCheckbox"); //apply class to the checkboxes themselves, instead of the div
		$(this).attr("class",""); //remove class from the div
		//setup a link to allow us to click the words, instead of just the checkbox		
		var labelHtml = $(this).find("label").html();
		var region_id = $(this).find("input").val();
		$(this).find("label").html('<a href="#'+region_id+'">'+labelHtml+'</a>');
	});

	//load big checkboxes	
	$(".bigCheckbox").bigCheckboxes();

	//initialize tabs
	$( "#homeSearchTabs" ).tabs();

	//setup accordion "continue" button links
	$('#homeSearchAccordion a.continue').click(function() {
		//which tab to click? - based on the href of the link
		var tabLink = $(this).attr("href").substr(1) + "_link";
		//click the link
		$('#homeSearchAccordion a.'+tabLink).click();
		return false;
	});

	//preload borough maps
	/*
	$("#boroughMap area").each(function(){
		//get the map image
		var useMap = $(this).attr("alt");
		if (useMap) {
			var mapSrc = "/img/rapid/map-boroughs-" + useMap + ".png";
			$([mapSrc]).preload();
		}
	});
	*/
	
	//set region links up to show neighborhood lists
	$("input.regionCheckbox").each(function(){ checkRegionBox($(this)); }); //load for the first time
	$("input.regionCheckbox").change(function(){ checkRegionBox($(this)); }); //bind to future changes

	//show neighborhoods for currently checked regions or the empty warning
	showNeighborhoodEmptyWarning();
	
	//setup tab link buttons
	$("#homeSearchTabs .ui-tabs-panel a.tabLink").click(function() { 
		var error = false;
		
		//validate region checkboxes, before moving on from tab 1
		if ($(this).attr('id')=='regionContinueButton') {
			var checkedCount = 0;
			$('input.regionCheckbox').each(function() {
				if ($(this).attr('checked')) { checkedCount++; }
			});
			if (checkedCount==0) {
				$('#homeSearchError').html('Please select a region to continue your search.');
				$('#homeSearchError').slideDown();
				error = true;
			}
		}
		
		//continue, if we have no errors
		if (!error) {
			//hide error box
			$('#homeSearchError').slideUp();
		
			$("ul.nav li a[href='"+ $(this).attr("href") +"']").click();
			return false;
		}
	});
		
	
	//setup region checkbox continue button
	$("#regionContinueButton").click(function() {
		return false;
	});
	
	
});


function checkRegionBox (box) {
	//get the value of the checkbox (which is the region id) and show/hide the neighborhood list
	if (box.attr("CHECKED")) {
		$("#neighborhoods_"+box.val()).show();
		$("#neighborhoodEmptyDiv").hide();
		$("#neighborhoodDiv").show();
	} else {
		$("#neighborhoods_"+box.val()).hide();
	}
	//if no inputs are checked, then show the empty screen (delay a beat to allow check to register)
	showNeighborhoodEmptyWarning();			
}

function showNeighborhoodEmptyWarning () {
	var checked = "";
	//see if any boxes are checked
	$("input.regionCheckbox").each(function(){ 
		if ($(this).attr("checked")) { checked = 1; }
	});
	//if no boxes are checked, then show an empty warning
	if (!checked) {
		$("#neighborhoodDiv").hide();
		$("#neighborhoodEmptyDiv").show();	
	} 
}






//SETUP MAP LINKS
// note that this uses the .bind('load') on the window object, rather than $(document).ready() 
// because .ready() fires before the images have loaded, but we need to fire *after* because
// our code relies on the dimensions of the images already in place.
$(window).bind('load', function () {
	
	//set hover action for the areas
	$("#boroughMap area").hover(
		
		//mouseover
		function() {
			//get the area identifier
			var useMap = $(this).attr("alt");
			if (useMap) {
				var mapSrc = "/img/rapid/map-boroughs-" + useMap + ".png";
				//change the image of the map
				$("#boroughMapImg").attr("src",mapSrc);
			}
		},

		//mouseout
		function() {
			var mapSrc = "/img/rapid/map-boroughs.png";
			$("#boroughMapImg").attr("src",mapSrc);
		}
    );
    
    //setup links for neighborhood
    var hoods = [];
    hoods[5] = "5"; //bronx
    hoods[1] = "1"; //brooklyn
    hoods[7] = "7"; //long island
    hoods[2] = "2"; //manhattan
    hoods[4] = "4"; //new jersey
    hoods[3] = "3"; //queens
    hoods[8] = "8"; //staten island
    hoods[6] = "6"; //westchester
	
	//setup links	
	for (i=0; i<hoods.length; i++) {
		//get map areas and lengths
		$("area[href=#"+hoods[i]+"], a[href=#"+hoods[i]+"]").click(function() {
			//open the appropriate tab
			//$("#homeSearchAccordion a.tab1_link").click();
			//get the region id from the href
			var region_id = $(this).attr("href").substr(1);
			//check the appropriate box via click
			$("#ListingRegionId"+region_id+"_bigCheckbox span.box").click();
			//stop the link
			return false;
		});
	}
    
});













//Home Search Tabs
/*
$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tab_nav li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tab_nav li").click(function() {
		$("ul.tab_nav li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(this).addClass("myriad_pro_bold_condensed"); //change Cufon font
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
*/

