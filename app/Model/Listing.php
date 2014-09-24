<?php

class Listing extends AppModel {
    public $name = 'Listing';
	public $actsAs = array('SoftDelete.SoftDelete', 'Containable'); //add softDelete behavior from the plugin SoftDelete.

	//Joins
	public $belongsTo = array(
		'ListingFee',
		'ListingType',
		'Neighborhood'
	);
	
	public $hasMany = array(
		'ListingPhoto'=>array(
			'order'=>'rank'
		),
		'ListingVideo'=>array(
			'order'=>'rank'
		)
	);
	
	public $hasAndBelongsToMany = array(
		'ListingAmenity'
	);
	


}