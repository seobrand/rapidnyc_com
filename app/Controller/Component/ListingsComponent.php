<?php 

class ListingsComponent extends Component {


	function initialize($controller) {
		//load necessary models
		$this->Listing = ClassRegistry::init('Listing');
	}

	
	
	
    // --------------------------------------------------------
    
    
    

	/* 
	Create an array of neighborhoods, grouped by region 
		$array[region_id] = array( neighborhood_id => neighborhood_name )
	*/
    function NeighborhoodsByRegion($region_ids=NULL) {
    	
    	//setup conditions, if region_ids are specified
    	$conditions = array();
    	if ($region_ids) { $conditions = array("Region.id"=>$region_ids); }
    	
		//get all regions and neighborhoods
		$neighborhoods = $this->Listing->Neighborhood->find('list',array(
			'fields'=>'Neighborhood.id, Neighborhood.name, Region.id',
			'conditions' => $conditions,
			'recursive' => 0,
			'order' => 'Neighborhood.name'
		));
		
		return $neighborhoods;
    }
    
    


    // --------------------------------------------------------


    
    
    /* Array of bedrooms */
    function getBedrooms () {
    	$a = array();
    	$a[0] = "Studio";
    	$a[1] = "1 Bedroom";
    	$a[2] = "2 Bedrooms";
    	$a[3] = "3 Bedrooms";
    	$a[4] = "4 Bedrooms";
    	$a[5] = "5 Bedrooms";
    	$a[6] = "6 Bedrooms";
    	$a[7] = "7+ Bedrooms";
    	$a[20] = "Room for Rent";
    	$a[21] = "Parking Space";
    	return $a;
    }
 
 
 
 
    // --------------------------------------------------------
    
     
    
    
    /* Listing Types */
	function getListingTypes($type, $chunk_into_cols=NULL) {

		//Residential
		if ($type=="Residential") {
			$types = $this->Listing->ListingType->find('list', array(
				'conditions'=>array('ListingType.category'=>'Residential'),
				'order'=>array('ListingType.rank')
			));
		
		//Commercial
		} elseif ($type=="Commercial") {
			$types = $this->Listing->ListingType->find('list', array(
				'conditions'=>array('ListingType.category'=>'Commercial'),
				'order'=>array('ListingType.rank')
			));		
		}
		
		//Chunk them into columns?
		if ($chunk_into_cols) { 
			$chunked = array_chunk($types,ceil(count($types)/$chunk_into_cols), TRUE); //preserve keys
			$types = $chunked;
		}
		
		return $types;
	}
    
    
    
    
    // --------------------------------------------------------
    
    
    
 
    // --------------------------------------------------------
    
     
    
    
    /* Assign Default "Coming Soon" Photos */
	function assignDefaultPhotos($listings=array()) {
		
		//single or array?
		if (!$listings[0]) {
			$_single = 0;
			$listings[$_single] = $listings;
		}

		//setup the default photo info
		$noPhoto = array(
			'url' => '/img/rapid/no-photo_wm.png',
			'thumbnail_url' => '/img/rapid/no-photo_web.png',
			'rank' => 0
		);
		
		//loop listings and setup default photos, if we don't have one
		foreach ($listings as $k=>$listing) {
			if (!$listing['ListingPhoto']) {
				$listings[$k]['ListingPhoto'] = array($noPhoto);
			}
		}
		
		//if single, turn back into single
		if (isset($_single)) { $listings = $listings[$_single]; }
		
		return $listings;
	}
    
    
    
    
    // --------------------------------------------------------
    
    
    
    /* this helper will prevent us for having to type out the whole left join 
    sequence before using find() with our HABTM relational tables. it seems dumb
    that there isn't a built-in cakephp way to make these joins automatic. */
    
    function habtmJoin ($models) { 
   		
   		//ensure that we have an array of models
   		$models = is_array($models) ? $models : array($models);
   		
   		//array to store our joins
   		$joins = array();
   		
   		//listingAmenity
   		if (in_array("listingAmenity",$models)) {
			$join = array(
				'table' => 'listing_amenities_listings',
				'alias' => 'ListingAmenity',
				'type' => 'LEFT',
				'conditions' => array(
					'ListingAmenity.listing_id = Listing.id'
				)
			);
			$joins[] = $join;
		}
		
		return $joins;
    }
    
    
    
    
    
    
}