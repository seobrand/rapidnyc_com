<?php

class Landlord extends AppModel {
	
	public $name = "Landlord";
	
	public $validate = array(
		'email' => array(
			'rule'=>'email',
			'message'=>'Invalid email format',
			'required'=>false,
			'allowEmpty'=>true
		),
		'phone'  => array(
			'rule'=>'phone',
			'message'=>'Invalid phone format',
			'required'=>false,
			'allowEmpty'=>true
		),
		'rent' => array(
			'rule'=>array('decimal',2, '/^\d+(?:\.\d{1,2})?$/'),
			'message'=>'Rent must be a number',
			'required'=>true
		),
		'first_name' => array(
			'rule'=>'notEmpty',
			'message'=>'We need a name',
			'required'=>true
		)
	);


}