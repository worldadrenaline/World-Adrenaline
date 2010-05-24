<?php
class Cronjob extends AppModel {
	var $name = 'Cronjob'; 
	var $useTable = false;
		
	function updateDbActivities($activityTypes) {
		foreach ($activityTypes as $activityType) {
			$id = $activityType['ID'];
			$name = addslashes($activityType['Name']);
			$shortname = $activityType['ShortName'];
			$SOQL = "INSERT INTO activity_types (id,name,shortname) VALUES ('".$id."','".$name."','".$shortname."') ON DUPLICATE KEY UPDATE name='".$name."', shortname='".$shortname."' ";
			$result = $this->query($SOQL);
		} 
	}
	
	function updateDbCountries($countries) {
		foreach ($countries as $country) {
			$id = $country['ID'];
			$name = addslashes($country['value']);
			$iso = $country['Code'];
			$shortname = $country['ShortName'];
			$SOQL = "INSERT INTO countries (id,name,iso,shortname) VALUES ('".$id."','".$name."','".$iso."','".$shortname."') ON DUPLICATE KEY UPDATE name='".$name."', iso='".$iso."', shortname='".$shortname."' ";
			$result = $this->query($SOQL);
		}
	}
	
/*	
	function refreshDbOperators($operators) {
	  
  		foreach ($operators as $operator) {
			
			//debug($operator);
			
			$id = $operator['CompanyName']['ID'];
			$name = addslashes($operator['CompanyName']['value']);
			if(!is_array($operator['Address']['CityName'])){ $city = $operator['Address']['CityName']; } else { $city = '';};
			$country_id = $operator['Address']['CountryName']['ID'];
			if(!is_array($operator['Address']['StateProv'])){ $stateProvince = $operator['Address']['StateProv']; } else { $stateProvince = '';};
			$countryISO = $operator['Address']['CountryName']['Code'];
			if(!is_array($operator['Address']['Phone'])){ $phone = $operator['Address']['Phone']; } else { $phone = ''; }			
			if(isset($operator['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value'])) { $description = addslashes($operator['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value']); } else { $description = ''; }
			$activityType = $operator['Category']['CategoryItem']['Name'];
			$activity_type_id = $operator['Category']['CategoryItem']['ID'];
			if ( $operator['HasEmail'] == 'True' ) { $hasEmail='1'; } else { $hasEmail='0'; }

			$SOQL = "INSERT INTO operators (id,name,city,country_id,stateProvince,countryISO,phone,description,activityType,activity_type_id,hasEmail) VALUES ('".$id."','".$name."','".$city."','".$country_id."','".$stateProvince."','".$countryISO."','".$phone."','".$description."','".$activityType."','".$activity_type_id."','".$hasEmail."') ON DUPLICATE KEY UPDATE name='".$name."', city='".$city."', country_id='".$country_id."', stateProvince='".$stateProvince."', countryISO='".$countryISO."', phone='".$phone."', description='".$description."', activityType='".$activityType."', activity_type_id='".$activity_type_id."', hasEmail='".$hasEmail."' ";
			$result = $this->query($SOQL);
  		}
	}
*/
	
	function updateDbOperators($operators) {
	  
  		foreach ($operators as $operator) {
			
			//debug($operator);
			
			$id = $operator['CompanyName']['ID'];
			$name = addslashes($operator['CompanyName']['value']);
			
			//debug($id);
			//echo "ID: ".$id."\n";
			
			//Get memory usage
			/*
			$mem_usage = memory_get_usage(true);
			if ($mem_usage < 1024)
			    echo "Memory: ".$mem_usage." bytes";
			elseif ($mem_usage < 1048576)
			    echo "Memory: ".round($mem_usage/1024,2)." kilobytes";
			else
			    echo "Memory: ".round($mem_usage/1048576,2)." megabytes";
			   
			echo "<br/>";
			*/
			//End memory usage
		
			
			//$mem = "Memory: ". memory_get_usage() . "\n";
			//debug ($mem);
			
			
			if(!is_array($operator['Address']['CityName'])){ $city = addslashes($operator['Address']['CityName']); } else { $city = '';};
			$country_id = $operator['Address']['CountryName']['ID'];
			if(!is_array($operator['Address']['StateProv'])){ $stateProvince = $operator['Address']['StateProv']; } else { $stateProvince = '';};
			$countryISO = $operator['Address']['CountryName']['Code'];
			if(!is_array($operator['Address']['Phone'])){ $phone = $operator['Address']['Phone']; } else { $phone = ''; }			
			if(isset($operator['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value'])) { $description = addslashes($operator['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value']); } else { $description = ''; }
			$activityType = $operator['Category']['CategoryItem']['Name'];
			$activity_type_id = $operator['Category']['CategoryItem']['ID'];
			if ( $operator['HasEmail'] == 'True' ) { $hasEmail='1'; } else { $hasEmail='0'; }

			$SOQL = "INSERT INTO operators (id,name,city,country_id,stateProvince,countryISO,phone,description,activityType,activity_type_id,hasEmail) VALUES ('".$id."','".$name."','".$city."','".$country_id."','".$stateProvince."','".$countryISO."','".$phone."','".$description."','".$activityType."','".$activity_type_id."','".$hasEmail."') ON DUPLICATE KEY UPDATE name='".$name."', city='".$city."', country_id='".$country_id."', stateProvince='".$stateProvince."', countryISO='".$countryISO."', phone='".$phone."', description='".$description."', activityType='".$activityType."', activity_type_id='".$activity_type_id."', hasEmail='".$hasEmail."' ";
			$result = $this->query($SOQL);
			
			//Free up memory
			//unset($operators);
			//mysql_free_result($result);
			
  		}
	}


/*	
	function updateDbProspects($aProspect) {
	  
	  
	   for($i=0;$i<count($aProspect);$i++)
	   {
	        $aCompanyName[]=$aProspect[$i]['CompanyName'];
			$aCategory[]=$aProspect[$i]['Category'];
			$aURLs[]=$aProspect[$i]['URLs'];
			$aAddress[]=$aProspect[$i]['Address'];
		
		   $id=$aCompanyName[$i]['ID'];  
	       
		   $SOQL = "SELECT * FROM operators WHERE id='".$id."'";
           $aOper= $this->query($SOQL); 
		   if(count($aOper)>0)
		   {
		   $SOQL = "DELETE * FROM operators WHERE id='".$id."'";
           $this->query($SOQL);
		   }
		   
		   $oprName=$aCompanyName[$i]['ShortName'];
           $type=$aCategory[$i]['Type'];
		   $name=$aCategory[$i]['CategoryItem']['Name'];
		   $City=$aAddress[$i]['CityName'];
		   $StateProv=$aAddress[$i]['StateProv']['StateCode'];
           $CountryName=$aAddress[$i]['CountryName']['value'];
		   $CountryCode=$aAddress[$i]['CountryName']['Code'];
		    
		$SOQL = "INSERT INTO operators (id,name,Type,ActivityType,City,StateProvince,Country,CountryID) Values  ('".$aCompanyName[$i]['ID']."','".$aCompanyName[$i]['ShortName']."','".$aCategory[$i]['Type']."','".$aCategory[$i]['CategoryItem']['Name']."','".$aAddress[$i]['CityName']."','".$aAddress[$i]['StateProv']['StateCode']."','".$aAddress[$i]['CountryName']['value']."','".$aAddress[$i]['CountryName']['Code']."')";
     //   exit;
		$aCntr= $this->query($SOQL);
	   }
	  
	}
	*/
	
		
	function truncProspectEntry() {
		$SOQL = "TRUNCATE TABLE  operators";
		$this->query($SOQL);
	}
	

}	


?>
