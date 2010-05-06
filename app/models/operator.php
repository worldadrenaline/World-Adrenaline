<?php
class Operator extends AppModel {

	var $name = 'Operator';
	var $hasOne = array('ActivityType', 'Country');
	//var $hasOne = array('Country');
	var $validate = array(
		'CountryID' => array('notempty')
	);
}
?>