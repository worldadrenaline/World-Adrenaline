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
	*  Adds or updates an Kumutu prospects to the database
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
			$modified = $operator['Modified'];

			$SOQL = "INSERT INTO operators (id,name,city,country_id,stateProvince,countryISO,phone,description,activityType,activity_type_id,hasEmail,modified) VALUES ('".$id."','".$name."','".$city."','".$country_id."','".$stateProvince."','".$countryISO."','".$phone."','".$description."','".$activityType."','".$activity_type_id."','".$hasEmail."','".$modified."') ON DUPLICATE KEY UPDATE name='".$name."', city='".$city."', country_id='".$country_id."', stateProvince='".$stateProvince."', countryISO='".$countryISO."', phone='".$phone."', description='".$description."', activityType='".$activityType."', activity_type_id='".$activity_type_id."', hasEmail='".$hasEmail."', modified='".$modified."' ";
			$result = $this->query($SOQL);
			
  		}
	}
	
	/*
	*  Adds or updates a single Prospect to the database
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
			$modified = $operator['Modified'];

			$SOQL = "INSERT INTO operators (id,name,city,country_id,stateProvince,countryISO,phone,description,activityType,activity_type_id,hasEmail,modified) VALUES ('".$id."','".$name."','".$city."','".$country_id."','".$stateProvince."','".$countryISO."','".$phone."','".$description."','".$activityType."','".$activity_type_id."','".$hasEmail."','".$modified."') ON DUPLICATE KEY UPDATE name='".$name."', city='".$city."', country_id='".$country_id."', stateProvince='".$stateProvince."', countryISO='".$countryISO."', phone='".$phone."', description='".$description."', activityType='".$activityType."', activity_type_id='".$activity_type_id."', hasEmail='".$hasEmail."', modified='".$modified."' ";
			$result = $this->query($SOQL);
			
	}
	
	
	/*
	*  Adds or updates an Kumutu suppliers to the database
	*/
	function updateKumutuSuppliers($suppliers) {

  		foreach ($suppliers as $supplier) {
			$source = "kumutu";
			$hasEmail='1';
			
			$id = $supplier['CompanyName']['ID'];
			$name = addslashes($supplier['CompanyName']['value']);
			
			$latitude = $supplier['Position']['Latitude'];
			$longitude = $supplier['Position']['Longitude'];
			
			$activityType = $supplier['Category']['CategoryItem']['Name'];
			$activity_type_id = $supplier['Category']['CategoryItem']['ID'];
			
			if(!is_array($supplier['Address']['CityName'])){ $city = addslashes($supplier['Address']['CityName']); } else { $city = '';};

			$countryISO = $supplier['Address']['CountryName']['Code'];

            //TODO: get the real country code from the API or lookup locally, for now, using the USA
		//	$country_id = $supplier['Address']['CountryName']['ID'];
			$country_id = '233';
			
			if(!is_array($supplier['Address']['StateProv'])){ $stateProvince = $supplier['Address']['StateProv']['value']; } else { $stateProvince = '';};
			if(!is_array($supplier['ContactInfo']['Phones']['Phone']['PhoneNumber'])){ $phone = $supplier['ContactInfo']['Phones']['Phone']['PhoneNumber']; } else { $phone = ''; }			
			if(isset($supplier['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value'])) { $description = addslashes($operator['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value']); } else { $description = ''; }

			if(isset($supplier['MultimediaDescriptions']['MultimediaDescription']['ImageItems']['ImageItem']['ImageFormat']['URL'])) { $image = addslashes($supplier['MultimediaDescriptions']['MultimediaDescription']['ImageItems']['ImageItem']['ImageFormat']['URL']); } else { $image = ''; }
			
			//TODO: get modified date from API, not setting it to today
			$modified = date('Y-m-d H:i:s');

			$SOQL = "INSERT INTO operators (id,name,city,country_id,countryISO,stateProvince,phone,description,activityType,activity_type_id,latitude,longitude,hasEmail,modified,source) VALUES ('".$id."','".$name."','".$city."','".$country_id."','".$countryISO."','".$stateProvince."','".$phone."','".$description."','".$activityType."','".$activity_type_id."','".$latitude."','".$longitude."','".$hasEmail."','".$modified."','".$source."') ON DUPLICATE KEY UPDATE name='".$name."', city='".$city."', country_id='".$country_id."', stateProvince='".$stateProvince."', countryISO='".$countryISO."', phone='".$phone."', description='".$description."', activityType='".$activityType."', activity_type_id='".$activity_type_id."', hasEmail='".$hasEmail."', modified='".$modified."'";
			$result = $this->query($SOQL);
			
  		}
	}
	
	
	/*
	*  Adds or updates a single Kumutu supplier to the database
	*/
	function updateKumutuSupplier($supplier) {

/* TODO, what is there is only one supplier? Use this below.
			$id = $supplier['CompanyName']['ID'];
			$name = addslashes($supplier['CompanyName']['value']);
			
			if(!is_array($supplier['Address']['CityName'])){ $city = addslashes($supplier['Address']['CityName']); } else { $city = '';};
			$country_id = $supplier['Address']['CountryName']['ID'];
			if(!is_array($supplier['Address']['StateProv'])){ $stateProvince = $supplier['Address']['StateProv']; } else { $stateProvince = '';};
			$countryISO = $supplier['Address']['CountryName']['Code'];
			if(!is_array($supplier['Address']['Phone'])){ $phone = $supplier['Address']['Phone']; } else { $phone = ''; }			
			if(isset($supplier['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value'])) { $description = addslashes($supplier['MultimediaDescriptions']['MultimediaDescription']['TextItems']['TextItem']['Description']['value']); } else { $description = ''; }
			$activityType = $supplier['Category']['CategoryItem']['Name'];
			$activity_type_id = $supplier['Category']['CategoryItem']['ID'];
			if ( $supplier['HasEmail'] == 'True' ) { $hasEmail='1'; } else { $hasEmail='0'; }
			$modified = $supplier['Modified'];

			$SOQL = "INSERT INTO operators (id,name,city,country_id,stateProvince,countryISO,phone,description,activityType,activity_type_id,hasEmail,modified) VALUES ('".$id."','".$name."','".$city."','".$country_id."','".$stateProvince."','".$countryISO."','".$phone."','".$description."','".$activityType."','".$activity_type_id."','".$hasEmail."','".$modified."') ON DUPLICATE KEY UPDATE name='".$name."', city='".$city."', country_id='".$country_id."', stateProvince='".$stateProvince."', countryISO='".$countryISO."', phone='".$phone."', description='".$description."', activityType='".$activityType."', activity_type_id='".$activity_type_id."', hasEmail='".$hasEmail."', modified='".$modified."' ";
			$result = $this->query($SOQL);
 */			
	}

	
	
		
	function emptyDbOperators() {
		$SOQL = "TRUNCATE TABLE operators";
		$this->query($SOQL);
	}
	

}	


?>
