<?php
class Country extends AppModel {

	var $name = 'Country';
	var $validate = array(
		'CountryName' => array('notempty'),
	);

//	var $belongsTo = 'Operator'; 
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Operator' => array(
			'className' => 'Operator',
			'foreignKey' => 'country_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

	
	

}
?>