<?php  

/* 

	***** CHANGES MADE BY DUSTIN ******
	
	I added a bunch of stuff, to allow this to:
		- create multiple maps, with unique map ids
		- handle markers (fetch, show, hide)
		- fit map around the markers on the screen
		
	********** END CHANGES ************





    CakePHP Google Map V3 - Helper to CakePHP framework that integrates a Google Map in your view 
    using Google Maps API V3. 
   
    Copyright (c) 2010 Marc Fernandez Girones: info@marcfg.com 

    MIT LICENSE: 
    Permission is hereby granted, free of charge, to any person obtaining a copy 
    of this software and associated documentation files (the "Software"), to deal 
    in the Software without restriction, including without limitation the rights 
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell 
    copies of the Software, and to permit persons to whom the Software is 
    furnished to do so, subject to the following conditions: 
     
    The above copyright notice and this permission notice shall be included in 
    all copies or substantial portions of the Software. 
     
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN 
    THE SOFTWARE. 
   
    MarcFG : http://www.marcfg.com 
      
    @author      Marc Fernandez Girones <info@marcfg.com> 
    @version     1.0 
    @license     OPPL 
      
    Date         May 13, 2010 
  
    USAGE: 
     
    In your CONTROLLER: 
        var $helpers = array('GoogleMapV3');    Add the helper 

      In your VIEW: 
          To add a map that localizes you: 
              echo $this->GoogleMapV3->map();  
           
          OR 
           
          You can also pass to the function a variable with any of the followings options and change the default parameters
              $mapOptions= array(
              	'mapId'=>'map_canvas'			//ID of map tag
                'width'=>'800px',                //Width of the map 
                'height'=>'800px',                //Height of the map 
                'zoom'=>7,                        //Zoom 
                'type'=>'HYBRID',                 //Type of map (ROADMAP, SATELLITE, HYBRID or TERRAIN) 
                'latitude'=>40.69847032728747,    //Default latitude if the browser doesn't support localization or you don't want localization
                'longitude'=>-1.9514422416687,    //Default longitude if the browser doesn't support localization or you don't want localization
                'localize'=>true,                //Boolean to localize your position or not 
                'marker'=>true,                    //Boolean to put a marker in the position or not 
                'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png',    //Default icon of the marker 
                'infoWindow'=>true,                //Boolean to show an information window when you click the marker or not
		        'infoWindowAutoClose'=>true				//Boolean of whether we should close infowindow on new window opening
                'windowText'=>'My Position'        //Default text inside the information window 
            ); 
            
            echo $this->GoogleMapV3->map($mapOptions); To add a map that localizes you 
         
        To add a marker: 
            
            echo $this->GoogleMapV3->addMarker(array('latitude'=>40.69847,'longitude'=>-73.9514)); 
               
          OR 
           
          You can also pass to the function a variable with any of the followings options and change the default parameters
		    $markerOptions= array( 
		    	'mapId'=>								//the ID of the map to place the marker on
		        'id'=>1,                                //Id of the marker 
		        'latitude'=>40.69847032728747,        //Latitude of the marker 
		        'longitude'=>-1.9514422416687,        //Longitude of the marker 
		        'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom icon 
		        'shadowIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom shadow 
		        'infoWindow'=>true,                    //Boolean to show an information window when you click the marker or not
		        'infoWindowAutoClose'=>true				//Boolean of whether we should close infowindow on new window opening
		        'windowText'=>'Marker'                //Default text inside the information window 
		    ); 
           
      This helper uses the latest Google API V3 so you don't need to provide or get any Google API Key 
*/ 



class GoogleMapV3Helper extends Helper { 

     
    //DEFAULT MAP OPTIONS (function map()) 
    var $defaultMapId="map_canvas";				//ID of map tag
    var $defaultWidth="800px";                    //Width of the map 
    var $defaultHeight="800px";                    //Height of the map 
    var $defaultZoom=12;                            //Default zoom 
    var $defaultType='ROADMAP';                    //Type of map (ROADMAP, SATELLITE, HYBRID or TERRAIN) 
    var $defaultLatitude=40.662552;        //Default latitude if the browser doesn't support localization or you don't want localization
    var $defaultLongitude=-73.995846;    //Default longitude if the browser doesn't support localization or you don't want localization
    var $defaultLocalize=true;                    //Boolean to localize your position or not 
    var $defaultMarker=true;                    //Boolean to put a marker in the position or not 
    var $defaultMarkerIcon='http://google-maps-icons.googlecode.com/files/home.png'; //Default icon of the marker 
    var $defaultInfoWindow=true;                //Boolean to show an information window when you click the marker or not
	var $defaultInfoWindowAutoClose=true;				//Boolean of whether we should close infowindow on new window opening
    var $defaultWindowText='My Position';        //Default text inside the information window 
         
    //DEFAULT MARKER OPTIONS (function addMarker()) 
    var $defaultInfoWindowM=true;        //Boolean to show an information window when you click the marker or not 
    var $defaultWindowTextM=' ';        //Default text inside the information window 
    
     
	 /**
     * Function map  
     *  
     * This method generates a tag called map_canvas (or whatever is set in the options) and insert 
     * a google maps. 
     *  
     * Pass an array with the options listed above in order to customize it 
     *  
     * @author Marc Fernandez <info (at) marcfg (dot) com>  
     * @param array $options - options array  
     * @return string - will return all the javascript script to generate the map 
     *  
     */      
    
    function map($options=null){ 
        if($options!=null) extract($options); 
        if(!isset($mapId))		$mapId=$this->defaultMapId;
        if(!isset($width))      $width=$this->defaultWidth; 
        if(!isset($height))     $height=$this->defaultHeight;     
        if(!isset($zoom))       $zoom=$this->defaultZoom;             
        if(!isset($type))       $type=$this->defaultType;         
        if(!isset($latitude))   $latitude=$this->defaultLatitude;     
        if(!isset($longitude))  $longitude=$this->defaultLongitude; 
        if(!isset($localize))   $localize=$this->defaultLocalize;         
        if(!isset($marker))     $marker=$this->defaultMarker;         
        if(!isset($markerIcon)) $markerIcon=$this->defaultMarkerIcon;     
        if(!isset($infoWindow)) $infoWindow=$this->defaultInfoWindow;     
        if(!isset($infoWindowAutoClose)) $infoWindowAutoClose=$this->$defaultInfoWindowAutoClose;     
        if(!isset($windowText)) $windowText=$this->defaultWindowText;   
         
         
		//include libraries, if needed
		if (!$GLOBALS['googleMapHelperUsed']) {  
        	//set library as previously used, to prevent duplicate libraries on future calls
        	$GLOBALS['googleMapHelperUsed'] = true;
        
        	echo '<script>var mapsArray = []; </script>';
	        echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>'; 
	        echo '<script type="text/javascript" src="http://code.google.com/apis/gears/gears_init.js"></script>'; 
	    }
	    
        $map = "<div id=\"".$mapId."\" style=\"width:".$width."; height:".$height."\"></div>"; 
        $map .= "<script>
            var noLocation = new google.maps.LatLng(".$latitude.", ".$longitude."); 
            var initialLocation; 
            var browserSupportFlag =  new Boolean(); 
            var map; 
            var myOptions = { 
              zoom: ".$zoom.", 
              mapTypeId: google.maps.MapTypeId.".$type." 
            }; 
            map = new google.maps.Map(document.getElementById(\"".$mapId."\"), myOptions); 
            
            //create an array of maps, in case we end up creating multiple maps that we need to reference later
            map.markersArray = [];
            mapsArray['".$mapId."'] = map;
        "; 
        if($localize) $map .= "localize();"; else $map .= "map.setCenter(noLocation);"; 
        $map .= " 
            function localize(){ 
                if(navigator.geolocation) { // Try W3C Geolocation method (Preferred) 
                    browserSupportFlag = true; 
                    navigator.geolocation.getCurrentPosition(function(position) { 
                      initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude); 
                      map.setCenter(initialLocation);"; 
                      if($marker) $map .= "setMarker(initialLocation);"; 
                                
                    $map .= "}, function() { 
                      handleNoGeolocation(browserSupportFlag); 
                    }); 
                     
                } else if (google.gears) { // Try Google Gears Geolocation 
                    browserSupportFlag = true; 
                    var geo = google.gears.factory.create('beta.geolocation'); 
                    geo.getCurrentPosition(function(position) { 
                      initialLocation = new google.maps.LatLng(position.latitude,position.longitude); 
                      map.setCenter(initialLocation);"; 
                      if($marker) $map .= "setMarker(initialLocation);";          
                 
                    $map .= "}, function() { 
                      handleNoGeolocation(browserSupportFlag); 
                    }); 
                } else { 
                    // Browser doesn't support Geolocation 
                    browserSupportFlag = false; 
                    handleNoGeolocation(browserSupportFlag); 
                } 
            } 
             
            function handleNoGeolocation(errorFlag) { 
                if (errorFlag == true) { 
                  initialLocation = noLocation; 
                  contentString = \"Error: The Geolocation service failed.\"; 
                } else { 
                  initialLocation = noLocation; 
                  contentString = \"Error: Your browser doesn't support geolocation.\"; 
                } 
                map.setCenter(initialLocation); 
                map.setZoom(3); 
            }"; 

            $map .= " 
            function setMarker(position){ 
                var contentString = '".$windowText."'; 
				var infowindow = new google.maps.InfoWindow({ 
					content: contentString 
				});
                var image = '".$markerIcon."'; 
                var marker = new google.maps.Marker({ 
                    position: position, 
                    map: map, 
                    icon: image, 
                    title:\"My Position\" 
                });"; 
             if($infoWindow){    
                $map .= "
				//add listener to window
				google.maps.event.addListener(marker, 'click', function() { 
					infowindow.open(map,marker); 
				});
				//link window to marker
				marker.infoWindow = infowindow;
				";
             } 
             $map .= "}"; 
             
             
             
             
             
       
       	/*
       	create a function that we can use client-side to search for markers by params that were assigned to them
       		usage:
       		var params = [];
       		params['testVar'] = 'testVal';
       		var markers = gmap_getMarkers('some_map', params, 'or');
       	*/       	
		$map .= "
       	function gmap_getMarkers (mapId, searchParams, and_or) {
       		//default values
       		if (!searchParams) { searchParams = []; }
       		
	       	//get the map and its markers
			var map = mapsArray[mapId];
			var markers = map.markersArray;
			var matches = [];
			//limit the markers to ones that fit the params
			for(var marker_key in markers) {
				var marker = markers[marker_key]
				//check this marker against the required search params (handle differently if we have to match all conditions or just one of the conditions)
				if (and_or=='or') {
					var markerMatch = false;
					for (var param in searchParams) {
						if (marker[param] == searchParams[param]) {
							markerMatch = true;
						}
					}
				} else {
					var markerMatch = true;
					for (var param in searchParams) {
						if (marker[param] !== searchParams[param]) {
							markerMatch = false;
						}
					}
				}
				//add marker to array of matches
				if (markerMatch) {
					matches.push(marker);
				}
			}
			
			//return the object array
			return matches;
		}
		";
		
		
		/*
		create a function that we can use to show or hide markers - to be used in conjunction with gmap_getMarkers, because we have to pass an array of objects to the function
		*/
		$map .= "
		function gmap_toggleMarkers (mapId, markers, show_or_hide) {
			//get the map
			var map = mapsArray[mapId];
			
			if (mapId && markers && map) {
				//loop markers and change them
				for (var marker_key in markers) { 
					//show, hide, or toggle?
					if (show_or_hide=='show') {
						markers[marker_key].setMap(map);
					}
					if (show_or_hide=='hide') {
						markers[marker_key].setMap(null);					
					}
					if (show_or_hide=='toggle' || !show_or_hide) {
						if (markers[marker_key].map) {
							markers[marker_key].setMap(null);
						} else {
							markers[marker_key].setMap(map);
						}
					}
				}
			}			
		}
		";   
		
		
		/* create a function to fit and zoom map around the current markers */
		$map .="
		function gmap_fitMarkers (mapId, maxZoom) {
			//get the map and markers
			map = mapsArray[mapId];
			var mapMarkers = mapsArray[mapId].markersArray;
			
			//extend the map boundaries for each marker
			var latlngbounds = new google.maps.LatLngBounds();
			for (i=0; i<mapMarkers.length; i++) {
				//if this marker is still visible, count its point
				if (mapMarkers[i].map) {
					latlngbounds.extend(mapMarkers[i].position);
				}
			};
			map.setCenter(latlngbounds.getCenter());
			map.fitBounds(latlngbounds);
			
			//if there is a maximum zoom, apply it (to avoid zooming in too far)
			if (maxZoom) {
				if (map.getZoom()>maxZoom*1) {
					map.setZoom(maxZoom*1);
				} 
			}
		}
		"; 
             
             
        $map .= "</script>"; 
        return $map; 
    } 
     
     
     
     
     
    /**  
     * Function addMarker  
     *  
     * This method puts a marker in the google map generated with the function map 
     *  
     * Pass an array with the options listed above in order to customize it 
     *  
     */  
    function addMarker($options){ 
        if($options==null) return null; 
        extract($options); 
        if (!isset($mapId)) { $mapId = "map_" . rand(1000,9999999); }
        if(!isset($latitude) || $latitude==null || !isset($longitude) || $longitude==null) return null; 
        if (!preg_match("/[-+]?\b[0-9]*\.?[0-9]+\b/", $latitude) || !preg_match("/[-+]?\b[0-9]*\.?[0-9]+\b/", $longitude)) return null;         
        if(!isset($id)) $id=rand(); 
        if(!isset($infoWindow)) $infoWindow=$this->defaultInfoWindowM; 
        if(!isset($infoWindowAutoClose)) $infoWindowAutoClose=$this->defaultInfoWindowAutoClose; 
        if(!isset($windowText)) $windowText=$this->defaultWindowTextM; 
        $marker = "<script>"; 
        if(isset($markerIcon)) $marker .= "var image = '".$markerIcon."';"; 
        if(isset($shadowIcon)) $marker .= "var shadowImage = '".$shadowIcon."';"; 
		if(isset($markerParams)) { 
			foreach ($markerParams as $k=>$v) { 
				$marker .= "var " . $k . "='" . addslashes($v) . "'; ";
			}
		}
		
		
		//override most recent map
       	$marker .= " map = mapsArray['".$mapId."']; "; 		
		
		//setup the new map
        $marker .= "
    		var myLatLng = new google.maps.LatLng(".$latitude.", ".$longitude."); 
			var marker_".$id." = new google.maps.Marker({ 
				id: '".$id."',
				position: myLatLng, 
				map: map,";
				if(isset($markerIcon)) $marker .= "icon: image,";
				if(isset($shadowIcon)) $marker .= "shadow: shadowImage,";
				if(isset($markerParams)) {
					foreach ($markerParams as $k=>$v) {
						$marker .= $k . ": " . $k . ",";
					}
				}
		$marker .= " 
			});
		"; 
		$marker .= " 
			var contentString = '".$windowText."'; 
			var infowindow".$id." = new google.maps.InfoWindow({ 
				content: contentString 
			});
		"; 
		if($infoWindow){    
			$marker .= "
			//add listener to window
			google.maps.event.addListener(marker_".$id.", 'click', function() { 
				infowindow".$id.".open(map,marker_".$id."); 
			});
			"; 
		} 
		
		
		//store the markers for this map, so we can reference them later
		if (isset($mapId)) { 
			$marker .= " map.markersArray.push(marker_".$id."); "; //store in active markers
		}
		
        $marker .= "</script>"; 
        return $marker; 
    } 
    
    
    
    function fitMarkers ($mapId, $maxZoom=15) {
    	//run function for map
		$script .= "<script>gmap_fitMarkers ('".$mapId."', '".$maxZoom."');</script>";
		return $script;
    }
    
    
	
	
	
	function clearMap ($mapId) {   	    
    	//run function for map
		$script .= "
		<script>
		var allMarkers = gmap_getMarkers('".$mapId."');
		gmap_toggleMarkers ('".$mapId."', allMarkers, 'hide');
		</script>
		";
		return $script;
    }
    
} 
?>