<?php
#------ site configuration ---------#  
error_reporting(0);
//error_reporting(~ E_ALL);

##e## editable area 

$site['droot']=$_SERVER[DOCUMENT_ROOT];
$site['devSiteURL']='http://'.$_SERVER['SERVER_NAME'].'/';

if(!in_array($_SERVER['SERVER_ADDR'],array('127.0.0.1','::1')))
{  
   
	 
	
	$devFolder='Rosemary/';	  ##e## example 'wtos/'
		
	$site['host']='localhost';  
	$site['user']='rosettam_webprop';  
	$site['pass']='VDF{}w[F~=*_';  
	$site['db']='rosettam_websitedb';  
	
	$site['droot']=$site['droot'].'/';

}
else
{
	$devFolder='rosetta/Rosemary/';  	  ##e## example 'wtos/'
	
	$site['host']='localhost';  
	$site['user']='root';  
	$site['pass']='';  
	$site['db']='rosetta';  

	 
}

	//$devFolder='';  	  ##e## example 'wtos/'
//	
//	$site['host']='localhost';  
//	$site['user']='root';  
//	$site['pass']='';  
//	$site['db']='rosette';  




$site['siteTitle']='Rosette';
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
 
function inclPath($dir='')
{
  global $site;
  $dir=($dir!='')?$site[$dir]:$site['root'];
  return $dir;
}





 