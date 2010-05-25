<?php
class Import extends AppModel {
	var $name = 'Import'; 
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
	*  Adds or updates an array of operators to the database
	*/
	function updateDbOperators($operators) {
	  
  		foreach ($operators as $operator) {
			
			$id = $operator['CompanyName']['ID'];
			$name = addslashes($operator['CompanyName']['value']);
			
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
			
  		}
	}
	
	/*
	*  Adds or updates a single operator to the database
	*/
	function updateDbOperator($operator) {
	  
			$id = $operator['CompanyName']['ID'];
			$name = addslashes($operator['CompanyName']['value']);
			
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
			
	}
		
	function emptyDbOperators() {
		$SOQL = "TRUNCATE TABLE operators";
		$this->query($SOQL);
	}
	

}	


?>
