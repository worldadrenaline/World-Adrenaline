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
        //$methodUrl = 'http://kumutu.local/0.4/prospects/get.xml';
        $methodUrl = 'http://kumutu:Ku7r1beDB@kumutu.local/0.4/prospects/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');
		
		// Retrieve number of Prospects pages from from Kumutu
		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);
		$totalPages = $parsed_xml['Prospects']['Paging']['TotalPages'];
		
		for($currentPage=1;$currentPage<=$totalPages;$currentPage++) {
			//	retrieve and parse page i
			$uriPage = $uri.'&page='.$currentPage;
			debug($uriPage);
			
			$xmlObject = new Xml($uriPage);
			$parsed_xml = Set::reverse($xmlObject);
			$operators = $parsed_xml['Prospects']['Prospect'];

			$this->Cronjob->updateDbOperators($operators);
			
			//Get memory usage
			$mem_usage = memory_get_usage(true);
			if ($mem_usage < 1024)
			    echo "Memory: ".$mem_usage." bytes";
			elseif ($mem_usage < 1048576)
			    echo "Memory: ".round($mem_usage/1024,2)." kilobytes";
			else
			    echo "Memory: ".round($mem_usage/1048576,2)." megabytes";
			   
			echo "<br/>";
			//End memory usage
			
			//Free up memory from XML object
			$xmlObject->__destruct();
			unset($xmlObject);
		}
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
