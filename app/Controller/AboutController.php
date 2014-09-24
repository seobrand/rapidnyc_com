<?php
App::import("Vendor", "iContactApi/iContactApi");
class AboutController extends AppController {
	public $name = 'About';
	public $components = array('Offices');
	public $helpers = array('GoogleMapV3');


	//index	
	public function index() {
		//redirect to search
		$this->redirect(array('controller'=>'about', 'action'=>'about_us'), 301);
	}
	



	/* ABOUT US */
	public function about_us() {


		//page title and meta
		$this->set('title_for_layout', "About Us");

	}
	
	
	
	
	/* CONTACT */
	public function contact() {
		
		//offices grouped into regions
		$this->set('offices_by_region',$this->Offices->OfficesByRegion());

		//page title and meta
		$this->set('title_for_layout', "Contact Us");

		
	}




	/* TESTIMONIALS */
	public function testimonials() {
	        
		$testimonials = array(                
			"2" => "Our experience here at Rapid Realty was very good! The agent was helpful and knowledgeable about the area. He showed us nearby subways and restaurants. Definitely would recommend him!",
			"1" => "My experience here at Rapid Realty was excellent. No problems. Thank you!",
			"3" => "My experience here at Rapid Realty was quick, easy, and very comforting. Positive!",
			"11" => "Our experience here at Rapid Realty was great, the agent was very informative &amp; helpful, I would recommend Rapid Realty to all my friends. The apartment was the right size for my family.",
			"7" => "My experience here at Rapid was accommodating. The agent picked me up, so that I could view the apartment. (The agent) was able to answer all of my questions regarding local attractions and transportation.",                   
			"4" => "My experience here at Rapid Realty was great. Personable agents w/no fuss and who knew what I wanted saved me time and a new apartment in a couple of hours. The apartment itself, the agent, and the neighborhoods were all great.",
			"8" => "My experience here at Rapid Realty was very comfortable and painless.",
			"6" => "My experience here at Rapid Realty was very good. I felt secure the entire time. My agent accompanied me through the whole process.",
			"9" => "Our experience here at Rapid Realty was pleasant and helpful. The agent we worked with really understood our needs and assisted us in finding us an apartment and helping us collect all the information we needed.",
			"10" => "My experience here at Rapid Realty was great, (the agent) was very helpful.. I would recommend Rapid to a friend.",
			"12" => "My experience here at Rapid Realty was a pleasure. My agent has been extremely helpful, patient, and friendly.",
			"5" => "Our experience here at Rapid Realty was excellent. (The agent) was very knowledgeable and found an incredible 3 bedroom apartment in a great neighborhood.",
			"13" => "I heard about Rapid through a referral from craigslist ad. I replied to another craigslist post, but since that agent was unable to accommodate my needs he referred me to a Rapid Realty agent.",
			"14" => "My experience here at Rapid Realty was excellent! The agent was very knowledgeable and helpful. He knew where all the markets, subways, and entertainment were. I would definitely recommend Rapid Realty to friends and family."
		);
		$this->set("testimonials",$testimonials);
		
		
		//page title and meta
		$this->set('title_for_layout', "Rapid Realty Reviews");

		
	}


	public function newsletter()
	{
		$this->layout=	'ajax';
		$this->autoRender	=	false;
	
	
		// Give the API your information
		iContactApi::getInstance()->setConfig(array(
		'appId'       => '3UHF5fdSRPWtQiHwU9mXajbw1tYYtfbj',
		'apiPassword' => 'corporam',
		'apiUsername' => 'medicamusainc'
				));
	
		// Store the singleton
		$oiContact = iContactApi::getInstance();
		// Try to make the call(s)
		try {
			//Create a contact
			$cid	=	$oiContact->addContact($this->request->data('email'));
				
			$res	=	$oiContact->subscribeContactToList($cid->contactId, 94811, 'normal');
				
				
		} catch (Exception $oException) { // Catch any exceptions
			// Dump errors
			var_dump($oiContact->getErrors());
			// Grab the last raw request data
			//var_dump($oiContact->getLastRequest());
			// Grab the last raw response data
			var_dump($oiContact->getLastResponse());
		}
		
		die('1');
	}



}

