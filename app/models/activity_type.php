<?php
class ActivityType extends AppModel {

	var $name = 'ActivityType';
	//var $belongsTo = 'Operator'; 
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Operator' => array(
            'className' => 'Operator',
            'foreignKey' => 'activity_type_id',
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