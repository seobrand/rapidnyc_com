<?php

class LeadsController extends AppController {
	public $name = 'Leads';
	public $helpers = array('Number', 'Text', 'Time', 'Js');
	public $components = array('Listings');


	// ------------------------------------------------------------


	//add
	public function add() {
	
		$this->layout = 'modal';
	
		//SAVE POSTED DATA
		if ($this->request->is('post') || $this->request->is('put')) {

			//clean up phone
			$phone = $this->request->data['Lead']['phone'];
			$phone = preg_replace("~[^0-9]~", "", $phone); //keep only digits
			$phone = substr($phone,0,1)=="1" ? substr($phone,1) : $phone; //remove leading "1"
			$phone = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone); //format xxx-xxx-xxxx
			$this->request->data['Lead']['phone'] = $phone;
			
			//add session id 
			$session_id = session_id();
			$this->request->data['Lead']['session'] = $session_id;
			
			//check if we already have a record for this session?
			if ($session_id) {
				$lead = $this->Lead->find('first',array('conditions'=>array('session'=>$session_id)));
				//if we have a lead, add the id to our current data, so we can update it
				if ($lead) {
					$this->Lead->id = $lead['Lead']['id'];
				}
			}
			
			//save the core record and render the thanks page
			if ($this->Lead->save($this->request->data)) {
				$this->Session->write('Leads.id',$this->Lead->id);
			} 	
			
			
			
			//add to lead farm at rapidnyc.net
			//setup lead farm data
			$lead = $this->Lead->read();
			$data = array();
			$data['lead_first']		= $lead['Lead']['first_name'];
			$data['lead_last']		= $lead['Lead']['last_name'];
			$data['lead_phone1'] 	= $lead['Lead']['phone'];
			$data['lead_email'] 	= $lead['Lead']['email'];
			$data['lead_move_date']	= $lead['Lead']['move_date'];
			$data['lead_budget'] 	= $lead['Lead']['budget'];
			$data['lead_type'] 		= "";
			$data['lead_beds'] 		= $lead['Lead']['bedrooms'];
			$data['lead_lease'] 	= $lead['Lead']['lease'];
			$data['lead_credit'] 	= $lead['Lead']['credit'];
			$data['lead_source']	= "Website";
			$data['lead_marketing_source'] = "Website";
			$data['lead_web_id'] 	= $lead['Lead']['session'];
			
			//only continue if we have enough data
			if (($data['lead_first'] || $data['lead_last']) && ($data['lead_phone1'] || $data['lead_email'])) {
				//setup post fields
				$fields = $data;
				//add key as a post variable
				$fields['k'] = "dk340tgkg_2n39mvmDKjsflwek";
								
				//url-ify the data for the POST
				foreach($fields as $key=>$value) { $fields_string .= $key.'='.urlencode($value).'&'; }
				rtrim($fields_string,'&');
				
				//open connection
				$url = "http://www.rapidnyc.net/public/receive/add_lead?script=1";
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,$url);
				curl_setopt($ch,CURLOPT_POST,count($fields));
				curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
				$result = curl_exec($ch);
				curl_close($ch);
			}



			//redirect to the thanks page
			$this->redirect(array('controller'=>'leads', 'action'=>'add_thanks'));
		
			
		
		//READ CURRENT DATA
		} else {
			$lead_id = $this->Session->read('Leads.id');
			if ($lead_id) {
				$this->Lead->id = $lead_id;
				$this->request->data = $this->Lead->read();
			}
		}
				
		//VARIABLES FOR THE FORM
		$this->set('bedrooms', $this->Listings->getBedrooms());

		//lease options
		$leases = array(
			'Lease 1' => 'My lease expires this month',
			'Lease 2' => 'My lease expires next month',
			'Lease 3' => 'My lease expires in 2+ months',
			'No Lease' => 'I\'m month-to-month or have no lease'
		);		
		$this->set('leases',$leases);
		
		//credit scores
		$credits = array(
			'' => 'Estimated Credit Score',
			'1' => '1 Bad',
			'2' => '2 Poor',
			'3' => '3 Good',
			'4' => '4 Great'
		);
		$this->set('credits',$credits);
		
		
		
		//page title and meta
		$this->set('title_for_layout', "No Broker's Fee Apartments");

	}
	
	
	
	// ------------------------------------------------------------
			
	
	
	public function add_thanks() {
	
		$this->layout = 'modal';
		
	}

	
	
	
}