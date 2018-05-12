<?
include(inclPath('classes').'/sm.php');
function varP($key)
{
  $postval='';
  if(isset($_POST[$key]))
  {
     $postval=str_replace('m#m','&',$_POST[$key]);
  }
  return $postval;
  
}

function varG($key)
{
  $getval='';
  if(isset($_GET[$key]))
  {
     $getval=$_GET[$key];
  }
  return $getval;
  
}

function tinyMce()
{
  include('tinyMCE.php'); 
}

function selectedTab($seoid, $page)
{
 if($page==''){$page='home';}
  if($seoid==$page)
  {
   echo  'class="selected"';
  }
 
}

class os extends sm 
{
	var $currency = '&pound;';
		
function mq($query)
	{
	  return mysql_query($query);
	}
	function mfa($rs)
	{
	 return mysql_fetch_assoc($rs);
	}

 
}
$GLOBALS['currency'] = '&pound;';

$os= new os;
