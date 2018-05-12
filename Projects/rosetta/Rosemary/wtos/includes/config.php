<?php 
error_reporting(0);
//include(substr(getcwd(),0,-5).'/wtos.acc.php');

#------ site configuration ---------# 
##e## editable area 
$site['droot']=$_SERVER[DOCUMENT_ROOT].'/';
$site['devSiteURL']='http://'.$_SERVER['SERVER_NAME'].'/';


if(in_array($_SERVER['SERVER_ADDR'],array('127.0.0.1','0::1')))
{  
   
				
	 
	$devFolder='Rosemary/wtos/';	  ##e## example 'wtos/'
		
	
	
	$site['host']='localhost';  
	$site['user']='rosettam_webprop';  
	$site['pass']='VDF{}w[F~=*_';  
	$site['db']='rosettam_websitedb';

}
else
{
	$devFolder='rosetta/Rosemary/wtos/';  	  ##e## example 'wtos/'
	 
	
	$site['host']='localhost';  
	$site['user']='root';  
	$site['pass']='';  
	$site['db']='rosetta';  

	 
}
 
	

$site['siteTitle']='WTOS Administration';
$site['siteHeading']=$site['siteTitle'];
$site['keywords']=' wtos.in - software for all ';
$site['description']=' wtos.in - software for all '; 
 
 
 
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
//echo "<pre>";
//print_r($site);