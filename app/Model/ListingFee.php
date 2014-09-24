<?php

class ListingFee extends AppModel {
	public $name = 'ListingFee';
	
	public $hasMany = array('Listing');


}