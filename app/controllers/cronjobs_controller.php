<?php
class CronjobsController extends AppController {

	var $name = 'Cronjobs';
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('insDbActivity', 'insDbCountry');
	}
						  
	function index() {
	}
	
 function insDbActivity() {
      
	    App::import('Xml');
        $file = "http:/dev./kumutu.com/api/activityTypes/list.xml?apikey=10132293094ba6bd772192f4.29432906";

       $parsed_xml =& new XML($file);
       $parsed_xml = Set::reverse($parsed_xml);

       $aCategory=$parsed_xml['ActivityTypes']['Category'];
	   for($i=0;$i<count($aCategory);$i++)
	   {
	      $aNewCategory[]=$aCategory[$i]['CategoryItem'];
	   } 
	   $this->Cronjob->makeActivityEntry($aNewCategory);
	   exit;
	 }
 
	function insDbCountry() {
        App::import('Xml');
        
        $methodUrl = 'http://kumutu.local/0.4/countries/get.xml';
	 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');
		$parsed_xml = new Xml($uri);
		$parsed_xml = Set::reverse($parsed_xml);
		
		//$countries = $parsed_xml['Countries']['Country'];

		foreach ($parsed_xml['Countries']['Country'] as $country) {
			$countries[] = $country['CountryName'];
		}
		
		$this->Cronjob->makeCountryEntry($countries);
		exit;
		       
       /*
       $file = "http://api.kumutu.com/api/countries/list.xml?apikey=10132293094ba6bd772192f4.29432906";
       $parsed_xml =& new XML($file);       
       $parsed_xml = Set::reverse($parsed_xml);
       
       $aCountry=$parsed_xml['Countries']['Country'];
	   
	   for($i=0;$i<count($aCountry);$i++)
	   {
	      $aNewCountry[]=$aCountry[$i]['CountryName'];
	   } 
	   
	   $this->Cronjob->makeCountryEntry($aNewCountry);
	   exit;
	   */
	}
 
  function insDbProspect()
  {
	   App::import('Xml');
	$file = "http://api.kumutu.com/0.4/prospects/get.xml?apikey=10132293094ba6bd772192f4.29432906";
       $parsed_xml =& new XML($file);
       $parsed_xml = Set::reverse($parsed_xml);
       $aProspect=$parsed_xml['Prospects']['Prospect'];
	   $this->Cronjob->makeProspectEntry($aProspect);
	   exit; 
  }

function insDb24Activity() {
       
	    App::import('Xml');

$file = "http://api.kumutu.com/api/activityTypes/list.xml?apikey=10132293094ba6bd772192f4.29432906&";
       $parsed_xml =& new XML($file);
       $parsed_xml = Set::reverse($parsed_xml);
       $aCategory=$parsed_xml['ActivityTypes']['Category'];
	   for($i=0;$i<count($aCategory);$i++)
	   {
	      $aNewCategory[]=$aCategory[$i]['CategoryItem'];
	   } 
	    $this->Cronjob->makeActivity24Entry($aNewCategory);
	   exit;
	 }
 
 function insDb24Country() {
        App::import('Xml');
$file = "http://api.kumutu.com/api/countries/list.xml?apikey=10132293094ba6bd772192f4.29432906";

       $parsed_xml =& new XML($file);
       $parsed_xml = Set::reverse($parsed_xml);
       $aCountry=$parsed_xml['Countries']['Country'];
	   for($i=0;$i<count($aCountry);$i++)
	   {
	      $aNewCountry[]=$aCountry[$i]['CountryName'];
	   } 
	   $this->Cronjob->makeCountry24Entry($aNewCountry);
	   exit;
	}
 
  function insDb24Prospect()
  {
      
	   App::import('Xml');
       $file = "http://api.kumutu.com/api/prospects/index.xml?apikey=10132293094ba6bd772192f4.29432906&modified=24";
       $parsed_xml =& new XML($file);
       $parsed_xml = Set::reverse($parsed_xml);
       $aProspect=$parsed_xml['Prospects']['Prospect'];
	   $this->Cronjob->makeProspect24Entry($aProspect);
	   exit; 
  }
  
function truncDbActivity() {
        $this->Cronjob->truncActivityEntry();
	    exit;
	 }
 
function truncDbCountry() {
       $this->Cronjob->truncCountryEntry();
	   exit;
	}
 
function truncDbProspect()
  {
       $this->Cronjob->truncProspectEntry();
	   exit; 
  }

}
?>
