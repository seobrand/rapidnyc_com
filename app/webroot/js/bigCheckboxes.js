/*
	USEAGE NOTES:
		- when submitting the click() action to a particular box, these options can be passed via array:
		options['onCheck'] = javascript string to execute if box is checked
		options['onUncheck'] = javascript string to execute if box is unchecked
*/


(function ($) {
	
	$.fn.bigCheckboxes = function(options) {
		
		//options
		if (!options) {
			var options = [];
			options['onCheck'] = "";
			options['onUncheck'] = "";
		}
		
		//loop each element submitted
		$(this).each(function() {
			
			//make sure that we're only dealing with checkboxes, not other elements
			//also make sure that the checkbox isn't already hidden
			if($(this).attr("type")=="checkbox" && !$(this).hasClass("hidden")) {
				
				/* MAKE THE NEW CHECKBOXES */
				
				//create a new div tag that contains the new checkbox and insert after the original checkbox
				var divId = $(this).attr("id") + "_bigCheckbox";
				var divTag = '<div class="bigCheckbox" id="'+divId+'"><span class="box"></span></div>';
				$(this).after(divTag);
				//move the label and original checkbox into the div tag (makes them easier to find later)
				$("label[for='"+$(this).attr("id")+"']").appendTo("#"+divId);
				$(this).appendTo("#"+divId);
				
				//hide the original checkbox
				$(this).addClass("hidden");
				
			
				/* APPLY CLASSES AND ACTIVITY TO THE NEW BOXES */
				
				var box = $("#"+divId+" span.box");
				
				//check, if original box was checked
				if ($(this).attr("checked")) {
					box.addClass("checked");
				}
				
				//disable, if the original checkbox was disabled
				if ($(this).attr("disabled")) {
					box.addClass("disabled");
				}
				
				//mark an unavailable, if the unavailable class was set on the original checkbox
				if ($(this).hasClass("unavailable")) {
					box.addClass("unavailable");
				}
				
				//hover (unless disabled)
				box.hover(		
					function(){ if (!$(this).hasClass("disabled")) { $(this).addClass('hover'); }},
					function(){ $(this).removeClass('hover'); }
				);	
				
				//check (unless disabled)
				box.click(function() {
					//is it diabled or unavailable?
					if (!$(this).hasClass("disabled") && !$(this).hasClass("unavailable")) {
						//check
						if (!$(this).hasClass("checked")) {		
							$(this).addClass('checked'); //graphic box
							$(this).parent().find("input").click(); //actual box
							
							//perform any onCheck action?
							if (options['onCheck']) {
								eval(options['onCheck']);
							}
						//uncheck
						} else {
							$(this).removeClass('checked'); //graphic box
							$(this).parent().find("input").click(); //actual box
							
							//peform any onUncheck action?
							if (options['onUncheck']) {
								eval(options['onUncheck']);
							}
						}
					}
				});
			}
		});
		
		/* PRELOAD IMAGES */
		//we can effectively preload the images by creating a checkbox and toggling it through all of the possible classes, and then we can remove it
		var divTag = '<div class="bigCheckbox" id="preload_bigCheckboxes_images"><span class="box"></span></div>';
		$(document).add(divTag);
		var box = $("#preload_bigCheckboxes_images span.box");
		box.addClass("hover"); box.removeClass("hover");
		box.addClass("checked"); box.addClass("hover"); box.removeClass("hover"); box.removeClass("checked");
		box.addClass("disabled"); box.addClass("hover"); box.removeClass("hover"); box.removeClass("disabled");
		box.addClass("unavailable"); box.addClass("hover"); box.removeClass("hover"); box.removeClass("unavailable");
		$("#preload_bigCheckboxes_images").remove();	
	}
	
})(jQuery);