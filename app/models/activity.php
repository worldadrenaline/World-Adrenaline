<?php
class Activity extends AppModel {

	var $name = 'Activity';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Operator' => array(
			'className' => 'Operator',
			'foreignKey' => 'operator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ActivityType' => array(
			'className' => 'ActivityType',
			'foreignKey' => 'activityType_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>