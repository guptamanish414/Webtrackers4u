<?php 

 error_reporting(E_ERROR | E_PARSE);

#------ site configuration ---------#  

##e## editable area 



$site['droot']=$_SERVER[DOCUMENT_ROOT];

$site['devSiteURL']='http://'.$_SERVER['SERVER_NAME'];



if(!in_array($_SERVER['SERVER_ADDR'],array('127.0.0.1','::1')))

{  

   

	 

	$devFolder='';	  ##e## example 'wtos/'

		

	$site['host']='rowflexcouk.ipagemysql.com';  

	$site['user']='rowflex_user';  

	$site['pass']='N-%0#Tmd#4I,';  

	$site['db']='rowflexwtdb';

	

	$site['droot']=$site['droot'].'/';



}

else

{

	$devFolder='expandproperties.co.uk/';  	  ##e## example 'wtos/'

	 

	

	$site['host']='localhost';  

	$site['user']='root';  

	$site['pass']='';  

	$site['db']='rowflex';  



	 

}



 







$site['siteTitle']='expandproperties';

$site['siteHeading']=$site['siteTitle'];

$site['keywords']='';

$site['description']=''; 

 

 

 #-----------------------------  non editable area -----------------------------#

 

$devSiteURL=$site['devSiteURL']; 

$site['root']=$site['droot']."/".$devFolder;      

$site['url']=$devSiteURL.'/'.$devFolder; 

$site['imgPath']=$site['droot']."/".$devFolder.'';

$site['theme']='wtos-theme';

$site['themePath']=$site['url'].$site['theme']."/";

$site['urlFront']=$site['url'];

 









$site['defaultLanguage']="English"; #English

$site['classes']=$site['root'].'classes';

$site['language']=$site['root'].'language';

$site['application']=$site['root'].'application';

$site['loginKey']=$site['db'];

$site['shortcut icon']=$site['themePath'].'images/fav.png';



// site added for contact and emai information


$site['homeContact']="0208 472 5579";
$site['mobileContact']="07507659389";
$site['contactEmail']="info@rowflex.co.uk";



function inclPath($dir='')

{

  global $site;

  $dir=($dir!='')?$site[$dir]:$site['root'];

  return $dir;

}











 