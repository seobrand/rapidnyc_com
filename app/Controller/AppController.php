<?php

class AppController extends Controller {
	public $name = "AppController";
	
	public $helpers = array('Html','Form', 'Session');
	public $uses = array('Agent'); //Models we need to link to
	public $components = array('Session');

	
	function beforeFilter() {
		
		//get our agent information
		$agent_id = $this->Session->read('Agents.id');
		$this->Agent->id = $agent_id;
		$agent = $this->Agent->read();
		$this->set('agent',$agent['Agent']);
		
		//set global values
		$gvals = array(
			'_phone' => $agent['Agent']['phone'] ? $agent['Agent']['phone'] : '347-404-5202',
			'_email' => $agent['Agent']['email'] ? $agent['Agent']['email'] : 'hello@rapidnyc.com'
		);
		$this->set($gvals);
		
	}
	
}