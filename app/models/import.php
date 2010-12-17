<?php
App::import('Sanitize');
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
			$shortname = addslashes($supplier['CompanyName']['ShortName']); 
			
			$latitude = $supplier['Position']['Latitude'];
			$longitude = $supplier['Position']['Longitude'];
			
			$activityType = $supplier['Category']['CategoryItem']['Name'];
			$activity_type_id = $supplier['Category']['CategoryItem']['ID'];
			
			if(!is_array($supplier['Address']['CityName'])){ $city = addslashes($supplier['Address']['CityName']); } else { $city = '';};

			$countryISO = $supplier['Address']['CountryName']['Code'];
			$country_id = $supplier['Address']['CountryName']['ID'];
			
			if(isset($supplier['Address']['StateProv']['value'])){ $stateProvince = addslashes($supplier['Address']['StateProv']['value']); } else { $stateProvince = '';}
			if(!is_array($supplier['ContactInfo']['Phones']['Phone']['PhoneNumber'])){ $phone = $supplier['ContactInfo']['Phones']['Phone']['PhoneNumber']; } else { $phone = ''; }			

			foreach ($supplier['MultimediaDescriptions']['MultimediaDescription'] as $media) {

                $logoFile = null;
                $imageFile = array();
                foreach($media as $item) {
                    if(isset($item['TextItem'])) {
                        foreach($item['TextItem'] as $text) {
                            if ($text['Title'] == 'Description') { $description = trim(Sanitize::html(addslashes($text['Description']['value']), array('remove' => true))); }
                        }                        
                    }
                    
                    if(isset($item['ImageItem'])) {
                        foreach($item['ImageItem'] as $image) {
                        
                            if (isset($image['IsLogo']) && $image['IsLogo'] == 'true') { 
                                foreach ($image['ImageFormat'] as $format) {
                                    if ($format['DimensionCategory'] == 'Thumbnail') { $logoFile = addslashes($format['URL']); }
                                }
                            }
                            
                            if (isset($image['IsLogo']) && $image['IsLogo'] == 'false') { 
                                foreach ($image['ImageFormat'] as $format) {
                                    if ($format['DimensionCategory'] == 'Thumbnail') { $imageFile[] = addslashes($format['URL']);}
                                }
                            }
                        }
                    }
                }
			} 

			$modified = $supplier['Modified'];

			$SOQL = "INSERT INTO operators (id,name,shortname,city,country_id,countryISO,stateProvince,phone,description,activityType,activity_type_id,latitude,longitude,hasEmail,modified,source,logoFile,imageFile_1,imageFile_2,imageFile_3,imageFile_4) VALUES ('".$id."','".$name."','".$shortname."','".$city."','".$country_id."','".$countryISO."','".$stateProvince."','".$phone."','".$description."','".$activityType."','".$activity_type_id."','".$latitude."','".$longitude."','".$hasEmail."','".$modified."','".$source."','".$logoFile."','".$imageFile[0]."','".$imageFile[1]."','".$imageFile[2]."','".$imageFile[3]."') ON DUPLICATE KEY UPDATE name='".$name."', shortname='".$shortname."', city='".$city."', country_id='".$country_id."', countryISO='".$countryISO."',stateProvince='".$stateProvince."', phone='".$phone."', description='".$description."', activityType='".$activityType."', activity_type_id='".$activity_type_id."', latitude='".$latitude."', longitude='".$longitude."', hasEmail='".$hasEmail."', modified='".$modified."', source='".$source."', logoFile='".$logoFile."', imageFile_1='".$imageFile[0]."', imageFile_2='".$imageFile[1]."', imageFile_3='".$imageFile[2]."', imageFile_4='".$imageFile[3]."'";
			$result = $this->query($SOQL);
			
  		}
	}
	
	
	function updateKumutuActivities($activities) {
	
  		foreach ($activities as $activity) {

			$source = "kumutu";
			
			$id = $activity['ActivityName']['ID'];
			$operator_id = $activity['SupplierInfo']['CompanyName']['ID'];
			
			$name = addslashes($activity['ActivityName']['value']);
			$shortname = addslashes($activity['ActivityName']['ShortName']);
			
			$activityType = $activity['Category'][1]['CategoryItem']['Name'];
			$activityType_id = $activity['Category'][1]['CategoryItem']['ID'];
			
			$latitude = $activity['Position']['Latitude'];
			$longitude = $activity['Position']['Longitude'];
			
			foreach ($activity['MultimediaDescriptions']['MultimediaDescription'] as $media) {

                foreach($media as $item) {
                    if(isset($item['TextItem'])) {
                        if ($item['TextItem']['Title'] == 'Long') { $description = trim(Sanitize::html(addslashes($item['TextItem']['Description']['value']), array('remove' => true))); }
                    }

                   /*TODO: get images
                    if(isset($item['ImageItem'])) {
                        foreach($item['ImageItem'] as $image) {
                            foreach ($image['ImageFormat'] as $format) {
                                if ($format['DimensionCategory'] == 'Thumbnail') { $imageFile[] = addslashes($format['URL']);}
                            }
                        }
                    }
                    */
                    $imageFile[0]='';
                    $imageFile[1]='';
                    $imageFile[2]='';
                    $imageFile[3]='';

                }
			} 

            $currency = $activity['General']['Charge']['CurrencyCode'];
            $priceMin = $activity['General']['Charge']['MinPrice'];

			$modified = $activity['Modified'];

			$SOQL = "INSERT INTO activities (id,operator_id,name,shortname,description,activityType,activityType_id,currency,priceMin,latitude,longitude,imageFile_1,imageFile_2,imageFile_3,imageFile_4,source,modified) VALUES ('".$id."','".$operator_id."','".$name."','".$shortname."','".$description."','".$activityType."','".$activityType_id."','".$currency."','".$priceMin."','".$latitude."','".$longitude."','".$imageFile[0]."','".$imageFile[1]."','".$imageFile[2]."','".$imageFile[3]."','".$source."','".$modified."') ON DUPLICATE KEY UPDATE operator_id='".$operator_id."', name='".$name."',  shortname='".$shortname."', description='".$description."', activityType='".$activityType."', activityType_id='".$activityType_id."', currency='".$currency."', priceMin='".$priceMin."', latitude='".$latitude."', longitude='".$longitude."', imageFile_1='".$imageFile[0]."', imageFile_2='".$imageFile[1]."', imageFile_3='".$imageFile[2]."', imageFile_4='".$imageFile[3]."', source='".$source."', modified='".$modified."'";
			$result = $this->query($SOQL);
			
  		}
	}

	
		
	function emptyDbOperators() {
		$SOQL = "TRUNCATE TABLE operators";
		$this->query($SOQL);
	}
	

}	


?>
