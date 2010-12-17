<?php 
/* SVN FILE: $Id$ */
/* ActivitiesController Test cases generated on: 2010-12-08 00:56:28 : 1291769788*/
App::import('Controller', 'Activities');

class TestActivities extends ActivitiesController {
	var $autoRender = false;
}

class ActivitiesControllerTest extends CakeTestCase {
	var $Activities = null;

	function startTest() {
		$this->Activities = new TestActivities();
		$this->Activities->constructClasses();
	}

	function testActivitiesControllerInstance() {
		$this->assertTrue(is_a($this->Activities, 'ActivitiesController'));
	}

	function endTest() {
		unset($this->Activities);
	}
}
?>