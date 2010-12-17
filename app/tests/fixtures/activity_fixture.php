<?php 
/* SVN FILE: $Id$ */
/* Activity Fixture generated on: 2010-12-08 00:56:28 : 1291769788*/

class ActivityFixture extends CakeTestFixture {
	var $name = 'Activity';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'primary'),
		'operator_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 128),
		'name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'shortname' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 128),
		'description' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'activityType' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'activityType_id' => array('type'=>'integer', 'null' => true, 'default' => '0'),
		'currency' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 5),
		'priceMin' => array('type'=>'integer', 'null' => true, 'default' => '0'),
		'latitude' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 45),
		'longitude' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 45),
		'imageFile_1' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'imageFile_2' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'imageFile_3' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'imageFile_4' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'source' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 128),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array()
	);
	var $records = array(array(
		'id'  => 1,
		'operator_id'  => 'Lorem ipsum dolor sit amet',
		'name'  => 'Lorem ipsum dolor sit amet',
		'shortname'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'activityType'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'activityType_id'  => 1,
		'currency'  => 'Lor',
		'priceMin'  => 1,
		'latitude'  => 1,
		'longitude'  => 1,
		'imageFile_1'  => 'Lorem ipsum dolor sit amet',
		'imageFile_2'  => 'Lorem ipsum dolor sit amet',
		'imageFile_3'  => 'Lorem ipsum dolor sit amet',
		'imageFile_4'  => 'Lorem ipsum dolor sit amet',
		'source'  => 'Lorem ipsum dolor sit amet',
		'modified'  => '2010-12-08 00:56:28'
	));
}
?>