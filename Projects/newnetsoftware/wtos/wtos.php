<?php
include($site['library'].'wtosLibrary.php');
include($site['global-property'].'wtosGlobalFunction.php');
class wtos extends librarySettings  /// property only for backoffice
{
		
		
		
		
		
		
		
		// local settings
		var $showPerPage=20;   #overwritten
		var $dateFormat='d-m-Y';  #overwritten
		var $dateFormatJs='dd-mm-yy'; #overwritten
		var $dateFormatDB='Y-m-d h:i:s'; #overwritten
		var $wtAccess=array('wtAdd'=>true,'wtEdit'=>true,'wtDelete'=>true,'wtView'=>true); #overwritten
		var $activeInactive= array ('Active' => 'Active','Inactive' => 'Inactive');
		
		
		
		// system default settings
		
		
		var  $adminTitle='Wtos administration system'; 
		var  $adminDescription='wtos  administration system';
		var  $adminKeywords='wtos  administration system ';
		
		
		var $boxContainer=array (  'None' => 'None', 'Div' => 'Div',  'Span' => 'Span');
		var $boxYesNo= array ('Yes' => 'Yes', 'No' => 'No' ); 
		var $boxActive=array ('Active' => 'Active','Inactive' => 'Inactive'); 
		var $boxActiveColor=array ('Active' => '9FFFB8','Inactive' => 'FF8080'); 
		
		var $adminType=  array ('Admin' => 'Admin','Super Admin' => 'Super Admin'); 
		var $adminActive= array ('Active' => 'Active','Inactive' => 'Inactive'); 
		var $contactUsStatus= array ( 'New' => 'New',  'Viewed' => 'Viewed' );
		var $galleryCatagoryActive= array ( 'Active' => 'Active', 'Inactive' => 'Inactive'  );
		var $photoGalleryStatus= array ( 'Active' => 'Active', 'Inactive' => 'Inactive'  );
		
		var $noticeboardStatus= array ( 'Active' => 'Active', 'Inactive' => 'Inactive'  );
		var $noticeboardStatuseColor=array ('Active' => '9FFFB8','Inactive' => 'FF8080'); 
		
		 
		
		var $pageContentStatusColor=array ('1' => '9FFFB8','0' => 'FF8080');
		var $pageContentStatus=array ('1' => 'Active','0' => 'Inactive'); 
		
		
  
		var $adminAccess=array();  //  var $adminAccess=array('Add'=>'Add','Edit'=>'Edit','Delete'=>'Delete','View'=>'View');  // add more here
	  
	  
function checkAccess($accKey=''){
		if($accKey!=''){
			$accArr = array();
			
			if($this->userDetails['access']!=''){
				$accArr = explode(',',$this->userDetails['access']);
			}
			if(is_array($accArr) && in_array($accKey,$accArr)){
				return true;
			}
		}
		else{
			return false;
		}
	}
		 
  
			
}
$os=new wtos;
$os->loadWtosService($site['loginKey-wtos']);
 
 
 
?>