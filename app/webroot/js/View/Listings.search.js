
var checkedMemory = []; //create an array to save checkbox history, to avoid accidentally wiping out their neighborhoods when region changing

$(document).ready(function() {
		
	//if region is checked, reveal neighborhoods
	$("input[name='data[Listing][region_id][]']").click(function() {
		//show/hide the neighborhood block
		var region_id = $(this).val();
		if ($(this).attr("checked")) {
			//re-check any recently unchecked boxes from memory
			$("#neighborhoods_"+region_id).find("input[type='checkbox']").each(function(){
				if (jQuery.inArray($(this).attr("id"), checkedMemory)>=0){
					$(this).attr("checked","CHECKED");
				}
			});
			$("#neighborhoods_"+region_id).show(); //show boxes
		} else {
			$("#neighborhoods_"+region_id).hide(checkedMemory); //hide
			$("#neighborhoods_"+region_id).find("input[type='checkbox'][checked='CHECKED']").each(function(){
				checkedMemory.push($(this).attr("id")); //save this uncheck
				$(this).attr("CHECKED",false); //uncheck boxes
			});
		}
	});
	
	//reveal the neighborhoods that are already checked
	$("input[name='data[Listing][region_id][]']").each(function() {
		//show/hide the neighborhood block
		var region_id = $(this).val();
		if ($(this).attr("checked")) {
			$("#neighborhoods_"+region_id).show();
		} else {
			$("#neighborhoods_"+region_id).hide();
			$("#neighborhoods_"+region_id).find("input[type='checkbox']").attr("CHECKED",false); //uncheck boxes
		}
	});
	
	//setup rent slider
	$("#rentSlider").slider({
		range: true,
		min: 0,
		max: 9999,
		values: [ 1000, 5000 ], //default values
		//update values on slide
		slide: function( event, ui ) {
			//update range fields
			$("#ListingRentMin").val(ui.values[0]);
			$("#ListingRentMax").val(ui.values[1]);
			//udpate amount field
			$("#rentSliderAmount").val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		},
		//bind action to change, so it updates values on change
		change: function( event, ui ) {
			//update range fields
			$("#ListingRentMin").val(ui.values[0]);
			$("#ListingRentMax").val(ui.values[1]);
			//udpate amount field
			$("#rentSliderAmount").val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	
	//setup slider for criteria amounts, if they're specified
	if ($("#ListingRentMin").val() || $("#ListingRentMax").val()) {
		$("#rentSlider").slider({ values: [ $("#ListingRentMin").val(), $("#ListingRentMax").val() ] });
	//otherwise, use defaults
	} else {
		var minRent = $("#rentSlider").slider( "values", 0 );
		var maxRent = $("#rentSlider").slider( "values", 1 );
		//set slider input display
		$("#rentSliderAmount").val( "$" + minRent +	" - $" + maxRent );
		//set field amounts
		$("#ListingRentMin").val(minRent);
		$("#ListingRentMax").val(maxRent);
	}
	
	
	
	//disable the rent slider, if we are on a mobile browser
	if (jQuery.browser.mobile || isiPad) { 
		//remove the rent slider
		$("#rentSliderWrap").remove();
		//show the mobile slider and setup default values
		var defaultMin = 1000;
		var defaultMax = 5000;
		$("#rentSliderWrap_mobile").show();
		if (!$("#ListingRentMin_mobile").val()) { $("#ListingRentMin_mobile").val(defaultMin) }
		if (!$("#ListingRentMax_mobile").val()) { $("#ListingRentMax_mobile").val(defaultMax) }
	}

});
