<?php

//load email functionality
App::uses('CakeEmail', 'Network/Email');



class LandlordsController extends AppController {
	public $name = "Landlords";
	public $helpers = array('Number', 'Text', 'Time', 'Js');
	public $components = array('Listings');
	
	
	//Listing 
	public function listing() {
	
		//SAVE POSTED DATA
		if ($this->request->is('post') || $this->request->is('put')) {

			//clean up phone
			$phone = $this->request->data['Landlord']['phone'];
			$phone = preg_replace("~[^0-9]~", "", $phone); //keep only digits
			$phone = substr($phone,0,1)=="1" ? substr($phone,1) : $phone; //remove leading "1"
			$phone = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone); //format xxx-xxx-xxxx
			$this->request->data['Landlord']['phone'] = $phone;
			
			//clean up rent
			$rent = $this->request->data['Landlord']['rent'];
			$rent = str_replace(array('$',',',' ',), '', $rent);
			$this->request->data['Landlord']['rent'] = $rent;
			
			//add session id and ip_address
			$session_id = session_id();
			$this->request->data['Landlord']['session'] = $session_id;
			$this->request->data['Landlord']['ip_address'] = $_SERVER['REMOTE_ADDR'];
						
			//save the core record and render the thanks page
			if ($this->Landlord->save($this->request->data)) {
				//save id to session
				$this->Session->write('Landlords.id',$this->Landlord->id); 				
				
				//email data
				$data = $this->Landlord->read();
				$data_fields = array('first_name', 'last_name', 'email', 'phone', 'bedrooms', 'bathrooms', 'rent', 'date_available', 'address_street', 'address_city', 'address_zip', 'notes', 'ip_address');
				$body = "";
				foreach ($data_fields as $field) {
					$body .= "<strong>" . $field . " = </strong>" . $data['Landlord'][$field] . "<br /><br />";
				}
				$email = new CakeEmail();
				$email->config('default');
				$email->from(array('listings@rapidnyc.com' => 'Rapid Realty'));
				$email->to('lolli@rapidnyc.com');
				$email->bcc('dbuss@rapidnyc.com');
				$email->subject('NEW LISTING: Listing Submitted Via Website');
				$email->emailFormat('html');
				$email->send($body);
								
				//redirect to Thanks page
				$this->redirect(array('controller'=>'landlords', 'action'=>'listing_thanks'));
				
			} else {
				$this->Session->setFlash('Please correct the errors below.');
			}	
			
		//READ CURRENT DATA
		} else {
			$landlord_id = $this->Session->read('Landlords.id');
			if ($landlord_id) {
				$this->Landlord->id = $landlord_id;
				$this->request->data = $this->Landlord->read();
			}
		} 
	
		//VARIABLES FOR THE FORM
		$this->set('bedrooms', $this->Listings->getBedrooms());
		$this->set('bathrooms', array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10));
		$this->set('addressStates', array(
			'AL'=>'AL', 'AK'=>'AK', 'AZ'=>'AZ', 'AR'=>'AR', 'CA'=>'CA', 'CO'=>'CO', 'CT'=>'CT', 'DE'=>'DE', 'DC'=>'DC', 'FL'=>'FL', 'GA'=>'GA', 'HI'=>'HI',
			'ID'=>'ID', 'IL'=>'IL', 'IN'=>'IN', 'IA'=>'IA', 'KS'=>'KA', 'KY'=>'KY', 'LA'=>'LA', 'ME'=>'ME', 'MD'=>'MD', 'MA'=>'MA', 'MI'=>'MI', 'MN'=>'MN',
			'MS'=>'MS', 'MO'=>'MO', 'MT'=>'MT', 'NE'=>'NE', 'NV'=>'NV', 'NH'=>'NH', 'NJ'=>'NJ', 'NM'=>'NM', 'NY'=>'NY', 'NC'=>'NC', 'ND'=>'ND', 'OH'=>'OH', 
			'OK'=>'OK', 'OR'=>'OR', 'PA'=>'PA', 'RI'=>'RI', 'SC'=>'SC', 'SD'=>'SD', 'TN'=>'TN', 'TX'=>'TX', 'UT'=>'UT', 'VT'=>'VT', 'VA'=>'VA', 'WA'=>'WA',
			'WV'=>'WV', 'WI'=>'WI', 'WY'=>'WI'
			)
		);
		
		//default the selected state to NY, if there is not state
		$this->request->data['Landlord']['address_state'] = $this->request->data['Landlord']['address_state'] ? $this->request->data['Landlord']['address_state'] : 'NY';
		
		


		//page title and meta
		$this->set('title_for_layout', "Landlords Apartment Listings");
		
		
	}
	
	
	
	
	//Thanks
	public function listing_thanks() {	
	
		//page title and meta
		$this->set('title_for_layout', "New York Apartments");

	
	}
	
	
	
	//Reasons
	public function reasons() {
	
		//page title and meta
		$this->set('title_for_layout', "Best Broker in New York");


	}


}