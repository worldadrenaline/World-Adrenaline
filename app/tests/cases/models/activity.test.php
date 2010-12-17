<?php 
/* SVN FILE: $Id$ */
/* Activity Test cases generated on: 2010-12-08 00:56:28 : 1291769788*/
App::import('Model', 'Activity');

class ActivityTestCase extends CakeTestCase {
	var $Activity = null;
	var $fixtures = array('app.activity');

	function startTest() {
		$this->Activity =& ClassRegistry::init('Activity');
	}

	function testActivityInstance() {
		$this->assertTrue(is_a($this->Activity, 'Activity'));
	}

	function testActivityFind() {
		$this->Activity->recursive = -1;
		$results = $this->Activity->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Activity' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>