<? 
error_reporting($site['environment']);
include($site['application'].'os.php');
$pageVar['segment']=array();
$os->wtospage=array();
$os->sefu()->setExtension('');//$os->sefu()->setExtension('.ijk');
$pagevar['defaultPage']='wtHome.php';//   to design home page seperately
$requestPage= $os->sefu->LoadPageName();
$pageVar['segment']=$os->sefu->getSegments();
$content=$pagevar['defaultPage'];
// $lang=$os-> getLang();
$lang='';
$andLangId='';
if($lang!='')
{
 $andLangId=" and langId=$lang";
} 

 


if($requestPage!="" && $requestPage!="home" )
{

 
    $os->wtospage =$os->rowByField('','pagecontent','seoId',$requestPage," and active=1  " ,'',' 1');
	 
    if($os->wtospage['pagecontentId']>0)
    { 
	    $pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));
        $pageBody=$os->replaceWtBox($pageBody);
        $content='wtContent.php';
   
      }elseif(file_exists($site['application'].$requestPage.'.php'))
     {
     
	     $content=$requestPage.'.php';
	 
      }
     else
     {
	 echo 'Error: Page Not Found.';
	 exit(); 
     }

}else{
  
			$os->wtospage =$os->rowByField('','pagecontent','isHome','Yes'," and active=1  " ,'',' 1');
			$pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));
			$pageBody=$os->replaceWtBox($pageBody);
			 

      

}
 
$os->siteValidation();   
if($os->getSettings('Deactivate Site')!=0){  echo '<style>
 .deactivateMessage{ margin:150px 0px 0px 250px ; font-size:20px; font-style:italic; color:#FF0000; font-weight:bold;}
 </style><div class="deactivateMessage">'.$os->getSettings('Deactivate Message').'</div>'; exit();}
 
 $updateHit="update settings set value=value+1 where keyword='hitCoount'";
 $os->mq($updateHit);
 
  
 
 #---------  not need 
 
 
 /*$os->wtospage['metaTitle']='';
$os->wtospage['metaTag']='';
$os->wtospage['metaDescription']='';
$os->wtospage['heading']='';*/
// declare --------------------