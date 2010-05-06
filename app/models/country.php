<?php
class Country extends AppModel {

	var $name = 'Country';
	var $validate = array(
		'CountryName' => array('notempty'),
	);
	var $belongsTo = 'Operator'; 

}
?>