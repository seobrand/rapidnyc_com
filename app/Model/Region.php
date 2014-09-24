<?php

class Region extends AppModel {
	public $name = 'Region';
	public $order = 'Region.name';

	public $hasMany = array('Neighborhood');

}