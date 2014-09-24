<?php

class Lead extends AppModel {
	
	public $name = "Lead";
	
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
		)
	);


}