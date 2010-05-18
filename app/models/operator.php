<?php
class Operator extends AppModel {

	var $name = 'Operator';
	var $validate = array(
		'country_id' => array('numeric'),
		'countryISO' => array('notempty'),
		'activity_type_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ActivityType' => array(
			'className' => 'ActivityType',
			'foreignKey' => 'activity_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'Request' => array(
			'className' => 'Request',
			'foreignKey' => 'operator_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	

}
?>