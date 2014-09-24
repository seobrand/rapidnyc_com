$(function ()
{
	$(document).ready(function(){
		// script for green_news + press_media + press_rapidtattoo
		$('#paging_container1').pajinate({num_page_links_to_display : 3,items_per_page : 4});
		$('#paging_container2').pajinate({num_page_links_to_display : 3,items_per_page : 8});
		$('#paging_container3').pajinate({num_page_links_to_display : 3,items_per_page : 8});
		$('#paging_container4').pajinate({num_page_links_to_display : 3,items_per_page : 8});

		// sub nav script for search-appartment + why rapid + about-rapid + join rapid + press-media
		//jQuery('.full-width').horizontalNav();
		
		// home page slider + join_rapid  + press_rapidtattoo + green_mission + green_news
		$('.bxslider').bxSlider({controls: false});
		$('.bx_join').bxSlider({pager: false});
		$('.bx_green_news').bxSlider({pagerCustom: '#bx_news_thum'});

		// fancybox popup script
		$(".fancybox_contact_popup").click(function() {
			$.fancybox.open({
				wrapCSS    : 'fancybox-contact', href : 'contact_popup.php', type : 'ajax', padding : 15
			});
		});
				
		$(".fancybox_frenchise_popup").click(function() {
			$.fancybox.open({
				wrapCSS    : 'fancybox-franchise', href : 'franchise_popup.php', type : 'ajax',fitToView   : false,	padding : 15
			});
		});

		$('.fancybox-buttons').fancybox({
			openEffect  : 'none', closeEffect : 'none', fitToView   : false, closeBtn  : true,
			helpers : {
				title : {
					type : 'over'
				},
				buttons	: {}
			},
			afterLoad : function() {
				this.title = (this.title ? '' + this.title : '');
			}
		});
		
		//syntax highlighter
		$.fn.slideFadeToggle = function(speed, easing, callback) {
			return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback );
		};
  
		$('.page_collapsible').collapsible({			
			defaultOpen: 'body_section1',
			cookieName: 'body2',
			speed: 'slow',
			animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
			
				elem.next().slideFadeToggle(opts.speed);
			},
			animateClose: function (elem, opts) { //replace the standard slideDown with custom function
				elem.next().slideFadeToggle(opts.speed);
			},
			loadOpen: function (elem) { //replace the standard open state with custom function
				elem.next().show();
			},
			loadClose: function (elem, opts) { //replace the close state with custom function
				elem.next().hide();
			}
		});
			
		$('input[type="text"]').each(function(){    
			var default_value = $(this).val();        
			$(this).focus(function() {
				if($(this).val() == default_value)
				{
					 $(this).val("");
				}
			}).blur(function(){
				if($(this).val().length == 0) /*Small update*/
				{
					$(this).val(default_value);
				}
			});
		});
				
		// script for checkbox
		//$('.neighbor_box li  input').iCheck({ checkboxClass: 'icheckbox_minimal'});
		//$('.bedroom_box li  input').iCheck({ checkboxClass: 'icheckbox_minimal'});
		/* for about_agent_details.php page only 
		var container = document.querySelector('#about_agents_box');
		var msnry = new Masonry( container, {
			// options
			columnWidth: 415,
			itemSelector: '#about_agents_box > ul > li'
		});*/
	});
}(jQuery))
