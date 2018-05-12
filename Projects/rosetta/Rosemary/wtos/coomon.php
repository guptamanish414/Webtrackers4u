<? 
include(inclPath('classes').'/export.php');
#include(inclPath('classes').'/tooltip.php');
include('os.php');

$pagevar['defaultPage']='home.php';
$pageVar['segment']=array();

$sefu= new sefu('.php');
$seoLink=&$sefu;
$requestPage= $sefu->LoadPageName();
$pageVar[segment]=$sefu->getSegments();
$content=$pagevar[defaultPage];


$os->loginKey=$site['loginKey'];
$os->processLogin('username','password','admin');
if($_SESSION[$os->loginKey]['active']!=1){  $os->Logout();}
if(is_array($_SESSION[$os->loginKey]) && $_SESSION[$os->loginKey]!='')
{
	$os->userDetails=$_SESSION[$os->loginKey];

}

if($_GET['logout']=="logout")
{
	 $os->Logout();
	 
	 $os->Execute($os->rId[jump], $site['url'].'login.php',"results"); 
}

if($os->CurrentPageName()!='login.php')
{
	 if(!$os->isLogin())
	  {
		 $os->Execute($os->rId[jump], $site['url'].'login.php',"results"); 
		 exit();
	  }
}





if($_GET['dLoad']=='true')
{
  $export->download($site['db'].'.sql',$export->dbDump($site['db']));
}


 
?>