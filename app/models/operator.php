<?php
class Operator extends AppModel {

	var $name = 'Operator';
	var $hasOne = array('ActivityType', 'Country');
	var $validate = array(
		'CountryID' => array('notempty')
	);
}
?>