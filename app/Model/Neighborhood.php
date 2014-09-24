<?php

class Neighborhood extends AppModel {

	public $name = 'Neighborhood';
	public $belongsTo = array('Region');
	
	public $hasMany = array('Listing', 'Office');
	

}
