<?php

class ListingsController extends AppController {
	public $name = 'Listings';
	public $uses = array('Listing');
	public $helpers = array('Number', 'Text', 'Time', 'Js', 'Youtube');
	 public $components = array('Listings');
	
	/*
	 * public $components = array(
			'Listings',
			'RequestHandler',
			'Rest.Rest' => array(
					'catchredir' => true,
					'debug' => 2,
					'actions' => array(
					 	'view' => array(
					 			'extract' => array('listing.Listing' => "listings.0"),
					 	),
							'search_results' => array(
									'extract' => array('listings'),
							),
					),
					'ratelimit' => array(
							'enable' => false
					)
			)
	);



	public function beforeFilter () {
		
		$username = 'hellomac1';
		$apikey = 'kK897wsd83rkaly98098i5kjlahJOE';
		
		if ($this->Rest->isActive()) {
			$apiUser = $this->User->validateAPI($username, $apikey);
			if (!$apiUser) {
				$msg = sprintf('Unable to log you in with the supplied credentials. ');
				return $this->Rest->abort(array('status' => '403', 'error' => $msg));
			}
		}
		parent::beforeFilter();
	}

	 * 
	 * */
	//paginator options
	public $paginate = array(
			'limit' => 25,
			'order' => array(
					'Listing.update_time' => 'desc'
			)
	);

	//index
	public function index() {
		//redirect to search
		$this->redirect(array('controller'=>'listings', 'action'=>'search'), 301);
	}





	// ------------------------------------------------------------


	//agent_card
	public function agent_card() {

		$this->layout = 'modal';

		//page title and meta
		$this->set('title_for_layout', "Brooklyn Apartments For Rent");

	}







	// ------------------------------------------------------------


	//search
	public function search($id=NULL) {

		//page title and meta
		$this->set('title_for_layout', "New York Apartments, Brooklyn Apartments");


		//RUN SEARCH OR SHOW SEARCH FORM

		//did we post data to this?  if so, then run search
		if ($this->request->data && $this->request->is('post')) {

			//store their search criteria in the session
			$this->Session->write('Listings.searchCriteria', $this->request->data);

			//redirect to the results page to review the results
			$this->redirect(array('controller'=>'listings', 'action'=>'search_results'));

			//if we didn't post data, then setup an existing search criteria
		} else {

			//retrieve search criteria data
			$this->request->data = $this->Session->read('Listings.searchCriteria');

			//VARIABLES
			//get regions
			$regions = $this->Listing->Neighborhood->Region->find("list");
			$this->set('regions',$regions);
			//chunk the regions
			$this->set('regions_chunked', array_chunk($regions,ceil(count($regions)/6), TRUE));

			//get neighborhoods
			$neighborhoods = $this->Listings->NeighborhoodsByRegion();
			$this->set('neighborhoods_by_region', $neighborhoods);
			//chunk the neighborhoods, for column display
			foreach ($neighborhoods as $region_id=>$hoods) {
				$chunks = array_chunk($hoods,ceil(count($hoods)/4), TRUE); //preserve keys
				$neighborhoods[$region_id] = $chunks;
			}
			$this->set('neighborhoods_by_region_chunked', $neighborhoods);

			//get listing types
			$listing_types_residential = $this->Listings->getListingTypes('Residential');
			$listing_types_commercial = $this->Listings->getListingTypes('Commercial');
			$this->set('listing_types_residential', $listing_types_residential);
			$this->set('listing_types_commercial', $listing_types_commercial);

			//get bedrooms
			$bedrooms = $this->Listings->getBedrooms();
			$this->set('bedrooms', $bedrooms);

			//get amenities
			$this->set('listingAmenities', $this->Listing->ListingAmenity->find("list"));
		}


		//START NEW SEARCH? (wipe out saved criteria data)
		if ($this->request->params['pass'] && $this->request->params['pass'][0]=="new") {
			$this->request->data = array();
			$this->Session->delete('Listings.searchCriteria');
			$this->Session->delete('Listings.searchResultsPage');
			//page title and meta
			$this->set('title_for_layout', "Search New York Apartments");
		}

	}
	// ------------------------------------------------------------


	//search
	public function search_2($id=NULL) 
	{
		$this->layout	=	'new_default';
		//page title and meta
		$this->set('title_for_layout', "New York Apartments, Brooklyn Apartments");

		//RUN SEARCH OR SHOW SEARCH FORM
		//did we post data to this?  if so, then run search
		if ($this->request->data && $this->request->is('post')) {
			//store their search criteria in the session
			$this->Session->write('Listings.searchCriteria', $this->request->data);
			//redirect to the results page to review the results
			$this->redirect(array('controller'=>'listings', 'action'=>'search_results'));
			//if we didn't post data, then setup an existing search criteria
		} else {
			//retrieve search criteria data
			$this->request->data = $this->Session->read('Listings.searchCriteria');
			//VARIABLES
			//get regions
			$regions = $this->Listing->Neighborhood->Region->find("list");
			$this->set('regions',$regions);
			//chunk the regions
			$this->set('regions_chunked', array_chunk($regions,ceil(count($regions)/4), TRUE));
			//get neighborhoods
			$neighborhoods = $this->Listings->NeighborhoodsByRegion();
			$this->set('neighborhoods_by_region', $neighborhoods);
			//chunk the neighborhoods, for column display
			foreach ($neighborhoods as $region_id=>$hoods) {
				$chunks = array_chunk($hoods,ceil(count($hoods)/4), TRUE); //preserve keys
				$neighborhoods[$region_id] = $chunks;
			}
			$this->set('neighborhoods_by_region_chunked', $neighborhoods);
			//get listing types
			$listing_types_residential = $this->Listings->getListingTypes('Residential');
			$listing_types_commercial = $this->Listings->getListingTypes('Commercial');
			$this->set('listing_types_residential', $listing_types_residential);
			$this->set('listing_types_commercial', $listing_types_commercial);

			//get bedrooms
			$bedrooms = $this->Listings->getBedrooms();
			$this->set('bedrooms', $bedrooms);

			//get amenities
			$this->set('listingAmenities', $this->Listing->ListingAmenity->find("list"));
		}


		//START NEW SEARCH? (wipe out saved criteria data)
		if ($this->request->params['pass'] && $this->request->params['pass'][0]=="new") {
			$this->request->data = array();
			$this->Session->delete('Listings.searchCriteria');
			$this->Session->delete('Listings.searchResultsPage');

			//page title and meta
			$this->set('title_for_layout', "Search New York Apartments");
		}

	}
	// ------------------------------------------------------------
	//search results
	public function search_results() {


		//page title and meta
		$this->set('title_for_layout', "Search Results - New York & Brooklyn Apartments");



		//retrieve the search criteria
		$data = $this->Session->read('Listings.searchCriteria');

		//save the search results page, so we can recall it when using "back to search results" links
		$this->Session->write('Listings.searchResultsPage', "/".$this->request->url);

		//if we have data, then run the search
		if ($data) {


			//if a listing_id was specified, then we can ignore the other criteria
			if ($data['Listing']['listing_id']) {
				$ids[] = $data['Listing']['listing_id'];
					
				//otherwise, use criteria
			} else {

				//get bedrooms variable
				$bedrooms = $this->Listings->getBedrooms();
				$this->set('bedrooms', $bedrooms);
				//get the regions
				$regions = $this->Listing->Neighborhood->Region->find('list');
				$this->set('regions', $regions);
					
				//build out search criteria
				$conditions = array();

				//which models and fields do we want to search?
				$requestFields = array(
						'Listing'=>array(
								'bedrooms',
								'listing_type_id',
								'neighborhood_id'
						),
						'ListingAmenity'=>array(
								'listing_amenity_id'
						)
				);

				//check our request data to see if we specified these values
				foreach ($requestFields as $model=>$fields) {
					if (isset($data[$model])) {
						//setup conditions
						foreach ($fields as $field) {
							if (isset($data[$model][$field])) {
								$conditions[] = array($field => $data[$model][$field]);
							}
						}
					}
				}
					
				//manually adjust for rent range
				if (isset($data['Listing']['rent_min'])) {
					$conditions[] = "Listing.rent >=" . $data['Listing']['rent_min'];
				}
				if (isset($data['Listing']['rent_max'])) {
					$conditions[] = "Listing.rent <=" . $data['Listing']['rent_max'];
				}

				//setup options
				$options = array();

				//left join HABTM tables (a complicated, dumb way to have to do this)
				$options['joins'] = $this->Listings->habtmJoin(array('listingAmenity')); //use our ListingsComponent to shortcut the join array for HABTM join

				$options['conditions'] = $conditions;
				$options['group'] = 'Listing.id';
				$options['fields'] = 'Listing.id'; //just limit our results to ids - we can get details with paginate
				$options['contain'] = true; //limit to just the Listing model data

				//run the search for our data, and filter out the ids
				$listings = $this->Listing->find('all',$options);
				$ids = array();
				foreach ($listings as $listing) {
					$ids[] = $listing['Listing']['id'];
				}
			}

			//now get the paginated results
			$listings = array('Listing.id'=>$ids);
			$listings = $this->paginate('Listing',$listings);
			$listings = $this->Listings->assignDefaultPhotos($listings); //assign a "coming soon" photo, if we have no photos

			//if we got results, then render the results screen
			if ($listings) {
				$this->set('listings', $listings);
					
				//otherwise throw an error message
			} else {
				$this->Session->setFlash('Error: Search failed. Please try again.');
				$this->redirect(array('controller'=>'listings', 'action'=>'search'));
			}


			//if we didn't have search data, then redirect back to search page
		} else {
			$this->Session->setFlash('No search results were found. Please run a new search.');
			$this->redirect(array('controller'=>'listings', 'action'=>'search'));
		}

	}




	// ------------------------------------------------------------


	//view
	public function view($id=NULL) {

		//get the listing
		$this->Listing->id = $id;
		$listing = $this->Listing->read();
		$listing = $this->Listings->assignDefaultPhotos($listing); //assign a "coming soon" photo, if we have no photos
		$this->set('listing', $listing);



		// Compact All results
		$this->set( compact('listing'));

		//if we can't find the listing, redirect with a failure
		if (!$listing['Listing']['id']) {
			//			$this->Session->setFlash('This listing cannot be found or is no longer available. Please try a new search.');
			//			$this->redirect(array('controller'=>'listings', 'action'=>'search'), 301);
		}

		//do we have a url to previous search results?
		$backUrl = $this->Session->read('Listings.searchResultsPage');
		$this->set('backUrl',$backUrl);

		//get bedrooms variable
		$bedrooms = $this->Listings->getBedrooms();
		//change "Studio" name, if commercial
		if ($listing['ListingType']['category']=="Commercial") {
			$bedrooms[0] = "N/A";
		}
		$this->set('bedrooms', $bedrooms);

		//get the regions
		$regions = $this->Listing->Neighborhood->Region->find('list');
		$this->set('regions', $regions);


		//setup the meta data for facebook
		$fb_meta = "";
		$fb_meta .= "<meta property=\"og:title\" content=\"" . "$" . $listing['Listing']['rent'] . " - " . $bedrooms[$listing['Listing']['bedrooms']] . " " . $listing['ListingType']['name'] . " in " . $listing['Neighborhood']['name'] . ", " . $regions[$listing['Neighborhood']['region_id']] . "\" />\n\t";
		$fb_meta .= "<meta property=\"og:description\" content=\"Check out this apartment on RapidNYC.com. New York apartments for rent. Hundreds of no-fee listings, thousands of low-fee listings.\" />\n\t";
		$fb_meta .= "<meta property=\"og:image\" content=\"" . $listing['ListingPhoto'][0]['url'] . "\" />\n\t";
		$fb_meta .= "<meta property=\"og:url\" content=\"http://www.rapidnyc.com/listings/view/" . $listing['Listing']['id'] . "\" />\n\t";
		$this->set('fb_meta',$fb_meta);

		//setup the addThis details
		$addThis = array(
				'title' => addslashes("$" . $listing['Listing']['rent'] . " - " . $bedrooms[$listing['Listing']['bedrooms']] . " " . $listing['ListingType']['name'] . " in " . $listing['Neighborhood']['name'] . ", " . $regions[$listing['Neighborhood']['region_id']] . " #RR"),
				'description' => addslashes('Check out this apartment on RapidNYC.com. New York apartments for rent. Hundreds of no-fee listings, thousands of low-fee listings.')
		);
		$this->set('addThis',$addThis);



		//page title and meta
		$this->set('title_for_layout', $bedrooms[$listing['Listing']['bedrooms']] . " " . $listing['Neighborhood']['name'] . " " . $listing['ListingType']['name'] . " for rent");

	}

}
