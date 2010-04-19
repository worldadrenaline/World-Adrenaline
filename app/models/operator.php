<?php
class Operator extends AppModel {

	var $name = 'Operator';
	var $validate = array(
		'CountryID' => array('notempty')
	);

}
?>