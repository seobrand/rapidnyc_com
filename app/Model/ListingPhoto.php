<?php

class ListingPhoto extends AppModel {
	public $name = 'ListingPhoto';


	//Joins
	public $belongsTo = array('Listing');
	
}

