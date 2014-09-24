<?php 

//show debugging on this controll
Configure::write('debug', 2);



class ImportController extends AppController {
	public $name = 'Import';
	public $components = array('DataSync');

	public function report() {
		$this->layout = 'blank'; 
	}
	
	
	public function import_database($category=NULL) {
		$this->autoRender = false;
		//only allow to run with cron dispatcher
		//if (!defined('CRON_DISPATCHER')) { $this->redirect('/'); exit(); }
		
		$results = $this->DataSync->importDatabase($category);
	}



	public function cloud_photos() {
		$this->layout = 'blank'; 
				
		$this->DataSync->syncCloudPhotos();		
		$this->render('report');
	}



	public function check_cloud_photos() {
		$this->layout = 'blank'; 
				
		$results = $this->DataSync->checkCloudPhotos();
		
		echo "<pre>"; print_r($results); echo "</pre>";
		$this->render('report');
	}



}

?>