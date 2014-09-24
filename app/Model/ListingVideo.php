<?php

class ListingVideo extends AppModel {
	public $name = 'ListingVideo';


	//Joins
	public $belongsTo = array('Listing');
	
}

