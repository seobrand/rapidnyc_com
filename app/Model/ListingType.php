<?php

class ListingType extends AppModel {

	public $name = 'ListingType';
	
	public $hasMany = array('Listing');
	

}
