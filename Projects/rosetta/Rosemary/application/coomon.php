<? 

include(inclPath('classes').'/export.php');
#include(inclPath('classes').'/tooltip.php');
include('os.php');
  
$pagevar['defaultPage']='home.php';
$pageVar['segment']=array();

$sefu= new sefu('');
$seoLink=&$sefu;
$requestPage= $sefu->LoadPageName();
$pageVar['segment']=$sefu->getSegments();
$content=$pagevar['defaultPage'];
 
 
$lang=$os-> getLang();
if($lang!='')
{
$andLangId=" and langId=$lang";
} 

 
if($requestPage!="" && $requestPage!="home")
{
   
   $os->wtospage =$os->get_pagecontent("active=1 and seoId='".$requestPage."'" );
   $os->wtospage=$os->wtospage['0'];   
  
   if($os->wtospage['pagecontentId']>0)
   {
     $content='content.php';
   
   }elseif(file_exists(inclPath('application').'/'.$requestPage.'.php'))
  {
    
	 $content=$requestPage;
	 
  }
  else
  {
	 echo 'Page Not Found';
	 exit(); 
  }

}
$os->siteValidation();
if($os->getSettings('Deactivate Site')!=0){  echo '<style>
 .deactivateMessage{ margin:150px 0px 0px 250px ; font-size:20px; font-style:italic; color:#FF0000; font-weight:bold;}
 </style><div class="deactivateMessage">'.$os->getSettings('Deactivate Message').'</div>'; exit();}
 
 
 ##login and logout start 
  $os->loginKey='rosette-Login';
  $os->processLogin('email','password','customer');

  if($_SESSION[$os->loginKey]['status']!='Active'){  $os->Logout();}
  
  if(is_array($_SESSION[$os->loginKey]) && $_SESSION[$os->loginKey]!=''){		
		$os->userDetails=$_SESSION[$os->loginKey];		
		##Redirect after login start
		if(isset($_POST['SystemLogin'])){
			$login_redirect=$site['url'];
			
			if($_POST['redirect']!=''){$login_redirect=$_POST['redirect'];}
			
			header("location:$login_redirect");	
		}
		##Redirect after login end	
	}
	
	if($_GET['logout']=="logout"){
		$os->Logout();	
		$redirectLocation = $site['url'];
		header("location:$redirectLocation");	
	}
 
?>	