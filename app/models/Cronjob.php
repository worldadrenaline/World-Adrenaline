<?
class Cronjob extends AppModel {  
        var $name = 'Cronjob'; 
		 var $useTable = false;
		
 function makeActivityEntry($aNewCategory)
	{
	  
	   for($i=0;$i<count($aNewCategory);$i++)
	   {
	    $name=addslashes($aNewCategory[$i]['Name']);
		$id=$aNewCategory[$i]['ID'];
		$SOQL = "INSERT INTO activities (id,ActName) Values  ('".$id."','".$name."')";
        $aCategories= $this->query($SOQL);
	   }
	 
	}
	
	function makeCountryEntry($aNewCountry)
	{
	  
	   for($i=0;$i<count($aNewCountry);$i++)
	   {
	    $name=addslashes($aNewCountry[$i]['value']);
		$code=$aNewCountry[$i]['Code'];
		$SOQL = "INSERT INTO countries (CountryID,CountryName) Values  ('".$code."','".$name."')";
        $aCntr= $this->query($SOQL);
	   }
	 
	}
	
	
	function makeProspectEntry($aProspect)
	{
	  
	  
	   for($i=0;$i<count($aProspect);$i++)
	   {
	        $aCompanyName[]=$aProspect[$i]['CompanyName'];
			$aCategory[]=$aProspect[$i]['Category'];
			$aURLs[]=$aProspect[$i]['URLs'];
			$aAddress[]=$aProspect[$i]['Address'];
		
		   $id=$aCompanyName[$i]['ID'];  
	       $oprName=$aCompanyName[$i]['ShortName'];
           $type=$aCategory[$i]['Type'];
		   $ActName=$aCategory[$i]['CategoryItem']['Name'];
		   $City=$aAddress[$i]['CityName'];
		   $StateProv=$aAddress[$i]['StateProv']['StateCode'];
           $CountryName=$aAddress[$i]['CountryName']['value'];
		   $CountryCode=$aAddress[$i]['CountryName']['Code'];
		    
		$SOQL = "INSERT INTO operators (id,name,Type,ActivityType,City,StateProvince,Country,CountryID) Values  ('".$aCompanyName[$i]['ID']."','".$aCompanyName[$i]['ShortName']."','".$aCategory[$i]['Type']."','".$aCategory[$i]['CategoryItem']['Name']."','".$aAddress[$i]['CityName']."','".$aAddress[$i]['StateProv']['StateCode']."','".$aAddress[$i]['CountryName']['value']."','".$aAddress[$i]['CountryName']['Code']."')";
     //   exit;
		$aCntr= $this->query($SOQL);
	   }
	  
	}
	
function makeActivity24Entry($aNewCategory)
	{
	  
	   for($i=0;$i<count($aNewCategory);$i++)
	   {
	    $name=addslashes($aNewCategory[$i]['Name']);
		$id=$aNewCategory[$i]['ID'];
		
		   $SOQL = "SELECT * FROM activities WHERE id='".$id."'";
           $aOper= $this->query($SOQL); 
		   if(count($aOper)>0)
		   {
		   $SOQL = "DELETE * FROM activities WHERE id='".$id."'";
           $this->query($SOQL);
		   }
		   
		
		$SOQL = "INSERT INTO activities (id,ActName) Values  ('".$id."','".$name."')";
        $aCategories= $this->query($SOQL);
	   }
	 
	}
	
	function makeCountry24Entry($aNewCountry)
	{
	  
	   for($i=0;$i<count($aNewCountry);$i++)
	   {
	    $name=addslashes($aNewCountry[$i]['value']);
		$code=$aNewCountry[$i]['Code'];
		
		   $SOQL = "SELECT * FROM countries WHERE CountryID='".$code."'";
           $aOper= $this->query($SOQL); 
		   if(count($aOper)>0)
		   {
		   $SOQL = "DELETE * FROM countries WHERE CountryID='".$code."'";
           $this->query($SOQL);
		   }
		   
		
		$SOQL = "INSERT INTO countries (CountryID,CountryName) Values  ('".$code."','".$name."')";
        $aCntr= $this->query($SOQL);
	   }
	 
	}
	
	
	function makeProspect24Entry($aProspect)
	{
	  
	  
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
		   $ActName=$aCategory[$i]['CategoryItem']['Name'];
		   $City=$aAddress[$i]['CityName'];
		   $StateProv=$aAddress[$i]['StateProv']['StateCode'];
           $CountryName=$aAddress[$i]['CountryName']['value'];
		   $CountryCode=$aAddress[$i]['CountryName']['Code'];
		    
		$SOQL = "INSERT INTO operators (id,name,Type,ActivityType,City,StateProvince,Country,CountryID) Values  ('".$aCompanyName[$i]['ID']."','".$aCompanyName[$i]['ShortName']."','".$aCategory[$i]['Type']."','".$aCategory[$i]['CategoryItem']['Name']."','".$aAddress[$i]['CityName']."','".$aAddress[$i]['StateProv']['StateCode']."','".$aAddress[$i]['CountryName']['value']."','".$aAddress[$i]['CountryName']['Code']."')";
     //   exit;
		$aCntr= $this->query($SOQL);
	   }
	  
	}
		
 
function truncActivityEntry()
	{
	  
	 	$SOQL = "TRUNCATE TABLE  activities";
        $this->query($SOQL);
	 
	}
	
function truncCountryEntry()
	{
	  
	 	$SOQL = "TRUNCATE TABLE  countries";
        $this->query($SOQL);
	 }
	
	
function truncProspectEntry()
	{
	  
	 	$SOQL = "TRUNCATE TABLE  operators";
        $this->query($SOQL);
	  
	}
	

}	


?>
