<?php
class Group extends AppModel {

	var $name = 'Group';
	var $validate = array(
		'name' => array('notempty')
	);

	var $actsAs = array('Acl' => array('type' => 'requester'));
	 
	function parentNode() {
	    return null;
	}

}
?>