<?php

class Office extends AppModel {

	public $name = 'Office';
	public $order = "Office.name";
	
	public $belongsTo = 'Neighborhood';
	public $hasMany = array('Agent');

}