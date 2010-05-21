<?php
class CronjobsController extends AppController {

	var $name = 'Cronjobs';
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('updateActivities', 'updateCountries', 'refreshOperators', 'updateOperators');
	}
						  
	function index() {
	}
	
	function updateActivities() {
 		App::import('Xml');
		$methodUrl = 'http://kumutu.local/0.4/activityTypes/get.xml';
		$uri = $methodUrl.'?apikey='.Configure::read('apikey');

		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);

		foreach ($parsed_xml['ActivityTypes']['Category'] as $activityType) {
			$activityTypes[] = $activityType['CategoryItem'];
		}
		
		$this->Cronjob->updateDbActivities($activityTypes);
		exit;
	   
	 }
 
	function updateCountries() {
        App::import('Xml');
        $methodUrl = 'http://kumutu.local/0.4/countries/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');

		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);

		foreach ($parsed_xml['Countries']['Country'] as $country) {
			$countries[] = $country['CountryName'];
		}
		
		$this->Cronjob->updateDbCountries($countries);
		exit;
	}
 
	function refreshOperators() {
        App::import('Xml');
        $methodUrl = 'http://kumutu.local/0.4/prospects/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');
		
		// get numberofpages
		//for($i=0;$i<=numberofpages;$i++)
		//for($i=0;$i<10;$i++)
		//{
		//	retrieve and parse page i
		//  possibly check if the xml doc is good and if so, then do below, otherwise stop with pages
		//  send to Cronjob->update
		//  if result is good, continue to next page?
		//  parse next page
		//}
		
		
		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);
		
		$operators = $parsed_xml['Prospects']['Prospect'];
		
		$this->Cronjob->refreshDbOperators($operators);
		exit;
	}

	function updateOperators() {
	
		App::import('Xml');
        $methodUrl = 'http://kumutu.local/0.4/prospects/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey').'&modified=30';

		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);
		
		if (isset($parsed_xml['Prospects']['Prospect'])) {
			$operators = $parsed_xml['Prospects']['Prospect'];
			$this->Cronjob->updateDbOperators($operators);
		}
		
	
	
		/*
		App::import('Xml');
		$file = "http://api.kumutu.com/api/prospects/index.xml?apikey=10132293094ba6bd772192f4.29432906&modified=24";
		$parsed_xml =& new XML($file);
		$parsed_xml = Set::reverse($parsed_xml);
		$aProspect=$parsed_xml['Prospects']['Prospect'];
		$this->Cronjob->updateDbProspects($aProspect);
		exit; 
		*/
		exit;
	}
   
	function emptyOperators() {
		$this->Cronjob->emptyDbOperators();
		exit; 
	}

}
?>
