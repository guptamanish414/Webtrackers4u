<?php 

 error_reporting(E_ERROR | E_PARSE);

 

#------ site configuration ---------# 

##e## editable area 

$site['droot']=$_SERVER[DOCUMENT_ROOT];

$site['devSiteURL']='http://'.$_SERVER['SERVER_NAME'].'/';

 


if(!in_array($_SERVER['SERVER_ADDR'],array('127.0.0.1','::1')))

{ 
   

				

	 

	$devFolder='wtos/';	  ##e## example 'wtos/'

		

	
	$site['host']='rowflexcouk.ipagemysql.com';  

	$site['user']='rowflex_user';  

	$site['pass']='N-%0#Tmd#4I,';  

	$site['db']='rowflexwtdb';

	

	$site['droot']=$site['droot'].'/';



}

else

{

	$devFolder='expandproperties.co.uk/wtos/';   	  ##e## example 'wtos/'

	 

	
	$site['host']='localhost';  

	$site['user']='root';  

	$site['pass']='';  

	$site['db']='rowflex';  




	 

}

 









$site['siteTitle']='expandproperties';

$site['siteHeading']=$site['siteTitle'];

$site['keywords']='wtos.in - software for all ';

$site['description']='wtos.in - software for all '; 

 

 

 

#-----------------------------  non editable area -----------------------------#

 

$devSiteURL=$site['devSiteURL']; 

$site['root']=$site['droot'].$devFolder;      

$site['url']=$devSiteURL.$devFolder; 

$site['imgPath']=str_replace('/wtos/','/',$site['droot'].$devFolder.'');

$site['theme']='wtos-theme';

$site['themePath']=$site['url'].$site['theme']."/";

$site['urlFront']=str_replace('/wtos/','/',$site['url']);





$site['devFolder']=$devFolder;

$site['defaultLanguage']="English"; #English

$site['classes']=$site['root'].'classes';

$site['language']=$site['root'].'language';

$site['application']=$site['root'].'application';

$site['loginKey']='wtos-'.$site['db'];

$site['shortcut icon']=$site['themePath'].'images/fav.png';







function inclPath($dir='')

{

  global $site;

  $dir=($dir!='')?$site[$dir]:$site['root'];

  return $dir;

}

?>

<?php
date_default_timezone_set('Europe/London');

// if (date_default_timezone_get()) {
//     echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
// }

// if (ini_get('date.timezone')) {
//     echo 'date.timezone: ' . ini_get('date.timezone');
// }

//echo date_default_timezone_get();

?>


