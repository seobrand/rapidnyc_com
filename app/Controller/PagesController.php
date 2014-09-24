<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');



/**
 * Load any Models that we need to use
 *
 * @var array
 */
	public $uses = array('Listing');



/* Components */
	public $components = array('Listings','Cookie');




/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
            
                if($this->Cookie->read('popupOpen')!='opened'){
                    $this->Cookie->write('popupOpen', 'opened', false, 0);
                    $this->set('openPopup',1);
                }
                
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		

		
		
		
		
		
		
				
		/* HOME PAGE */
		if ($this->viewVars['page']=="home") {
			
			//page title and meta
			$this->set('title_for_layout', "New York Apartments, Brooklyn Apartments, No Broker Fee");
			
			
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
				
				//get neighborhoods
				$neighborhoods = $this->Listings->NeighborhoodsByRegion();
				$this->set('neighborhoods_by_region', $neighborhoods);
				//chunk the neighborhoods, for column display
				foreach ($neighborhoods as $region_id=>$hoods) {
					$chunks = array_chunk($hoods,ceil(count($hoods)/3), TRUE); //preserve keys
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

			}   	    
			
			//show the US Jetways icon
			$this->set('show_jetways', true);
		}
		
		
		
		
		
		
		//RENDER
		$this->render(implode('/', $path));
	}	
}
