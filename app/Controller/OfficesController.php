<?php 
class OfficesController extends AppController {
	public $name = 'Offices';
	public $components = array('Offices');
	public $helpers = array('GoogleMapV3');
	
	//index	
	public function index() {
		//redirect to search
		$this->redirect(array('controller'=>'about', 'action'=>'contact'), 301);
	}
	
	
	
	
	
	
	//AGENTS
	public function agents($id=null) {
		//office specified?
		if ($id) {
			//get office
			$this->Office->id = $id;
			$office = $this->Office->read();
			$this->set('office',$office);
			
			//page title and meta
			$this->set('title_for_layout', $office['Office']['name'] . " - Apartment Brokers");
			
		} else {
			//offices grouped into regions
			$this->set('offices_by_region',$this->Offices->OfficesByRegion());
			
			//page title and meta
			$this->set('title_for_layout', "New York Apartment Brokers");
		}
		
		
		

	}
	
	
	
	
	

	//VIEW
	public function view($id=null) {
		$this->Office->id = $id;
		$office = $this->Office->read();
		$this->set('office',$office);
		
		//page title and meta
		$this->set('title_for_layout', $office['Office']['name'] . " - No Broker Fee");

	}
	
}