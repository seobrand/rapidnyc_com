<?php 

class OfficesComponent extends Component {


	function initialize($controller) {
		//load necessary models
		$this->Neighborhood = ClassRegistry::init('Neighborhood');
		$this->Office = ClassRegistry::init('Office');
	}

	
	
	
    // --------------------------------------------------------
    
    
    

	/* 
	Create an array of offices, grouped by region 
	*/
    function OfficesByRegion() {
		
		//build an array of offices grouped in offices and regions	
		$regions = $this->Neighborhood->Region->find("list");
		$offices = $this->Office->find("all");
		
		//create an array of offices
		$offices_by_region = array();
		
		//create array for each region
		foreach ($regions as $region_id=>$region_name) {
			$region = array(
				'name'=>$region_name,
				'offices'=>array()
			);
			$offices_by_region[$region_id] = $region;
		}
		unset($regions);
		
		//create an array within each region that hold the offices
		foreach ($offices as $offices_k=>$office) {
			$region_id = $office['Neighborhood']['region_id'];
			$offices_by_region[$region_id]['offices'][] = $office;
			unset($offices[$offices_k]);
		}
		//unset any regions with no offices
		foreach ($offices_by_region as $k=>$v) {
			if (!$v['offices']) { unset($offices_by_region[$k]); }
		}
		
		return $offices_by_region;
		
    }
        
    
    
}