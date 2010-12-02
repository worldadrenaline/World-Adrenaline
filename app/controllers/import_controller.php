<?php
class ImportController extends AppController {

	var $name = 'Import';
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array(
    	    'updateActivities',
    	    'updateCountries',
    	    'refreshOperators',
    	    'updateOperators',
    	    'updateKumutuSuppliers'
    	    );
	}
						  
	function index() {
	}
	
	function updateActivities() {
 		App::import('Xml');
		$methodUrl = 'http://api.kumutu.com/0.4/activityTypes/get.xml';
		$uri = $methodUrl.'?apikey='.Configure::read('apikey');

		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);

		foreach ($parsed_xml['ActivityTypes']['Category'] as $activityType) {
			$activityTypes[] = $activityType['CategoryItem'];
		}
		
		$this->Import->updateDbActivities($activityTypes);
		exit;
	   
	 }
 
	function updateCountries() {
        App::import('Xml');
        $methodUrl = 'http://api.kumutu.com/0.4/countries/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');

		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);

		foreach ($parsed_xml['Countries']['Country'] as $country) {
			$countries[] = $country['CountryName'];
		}
		
		$this->Import->updateDbCountries($countries);
		exit;
	}
 
	function refreshOperators() {
        App::import('Xml');
        $methodUrl = 'http://api.kumutu.com/0.4/prospects/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');
		
		// Retrieve number of Prospects pages from from Kumutu
		$xmlObject = new Xml($uri);
		$parsed_xml = Set::reverse($xmlObject);
		$totalPages = $parsed_xml['Prospects']['Paging']['TotalPages'];
		
		for($currentPage=1;$currentPage<=$totalPages;$currentPage++) {
			//	retrieve and parse page i
			$uriPage = $uri.'&page='.$currentPage;
			$xmlObject = new Xml($uriPage);
			$parsed_xml = Set::reverse($xmlObject);
			$operators = $parsed_xml['Prospects']['Prospect'];

			$this->Import->updateDbOperators($operators);
			
			//Free up memory from XML object
			$xmlObject->__destruct();
			unset($xmlObject);
		}
		exit;
	}

	function updateOperators() {
	
		App::import('Xml');
        $methodUrl = 'http://api.kumutu.com/0.4/prospects/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey').'&modified=30';

		$xmlObject = new Xml($uri);
		$parsed_xml = Set::reverse($xmlObject);
		
		if (isset($parsed_xml['Prospects']['Prospect'])) {
			// Check for multiple prospects updates hack. Should be made more elegant in future release.
			if (Set::countDim($parsed_xml['Prospects']['Prospect']) > 1) {
				$operators = $parsed_xml['Prospects']['Prospect'];
				$this->Import->updateDbOperators($operators);
			} 
			else {
				$operator = $parsed_xml['Prospects']['Prospect'];
				$this->Import->updateDbOperator($operator);
			} 
			
		}
		
		//Free up memory from XML object
		$xmlObject->__destruct();
		unset($xmlObject);

		exit;
	}



	function updateKumutuSuppliers() {

		App::import('Xml');
        $methodUrl = 'http://api.kumutu.com/0.4/suppliers/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');

		$xmlObject = new Xml($uri);
		$parsed_xml = Set::reverse($xmlObject);
		
		if (isset($parsed_xml['Suppliers']['Supplier'])) {
			if (Set::countDim($parsed_xml['Suppliers']['Supplier']) > 1) {
				$suppliers = $parsed_xml['Suppliers']['Supplier'];
				$this->Import->updateKumutuSuppliers($suppliers);
			} 
			else {
			    // if only 1 supplier, we should do something
				//$supplier = $parsed_xml['Suppliers']['Supplier'];
				//$this->Import->updateKumutuSuppliers($supplier);
			} 
			
		}
		
		//Free up memory from XML object
		$xmlObject->__destruct();
		unset($xmlObject);

		exit;
	}

   
	function emptyOperators() {
		$this->Import->emptyDbOperators();
		exit; 
	}

}
?>
