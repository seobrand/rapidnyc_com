<?php

class ListingAmenity extends AppModel {

	public $name = 'ListingAmenity';
	
	public $hasAndBelongsToMany = array('Listing');
	

}
