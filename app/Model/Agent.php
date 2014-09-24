<?php

class Agent extends AppModel {

	public $name = 'Agent';
	public $order = 'CONCAT(first_name,\' \',last_name)';
	
	public $belongsTo = array('Office');
	
}