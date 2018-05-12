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

 if($requestPage!="home" ){
if($requestPage!=""    )
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
}
$os->siteValidation();
if($os->getSettings('Deactivate Site')!=0){  echo '<style>
 .deactivateMessage{ margin:150px 0px 0px 250px ; font-size:20px; font-style:italic; color:#FF0000; font-weight:bold;}
 </style><div class="deactivateMessage">'.$os->getSettings('Deactivate Message').'</div>'; exit();}

  
   

?>	