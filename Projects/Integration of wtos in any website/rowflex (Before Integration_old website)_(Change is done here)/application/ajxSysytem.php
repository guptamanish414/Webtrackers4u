<? session_start();
ob_start();
include('../includes/config.php');
include('coomon.php');
ob_end_clean();




if(isset($_GET['actionPage']))
{
  
	$wtAjax['ajaxRowId']=0;
	if(isset($_GET['ajaxRowId']))
	{
	 	$wtAjax['ajaxRowId']=$_GET['ajaxRowId'];
	
	}
   include($_GET['actionPage'].'.php');
}

if($_GET['changeStatus']=='change')
{
  
	
	$newStatus=varG('newStatus');
	$table=varG('table');
	$satusfld=varG('satusfld');
	$idFld=varG('idFld');
	$idVal=varG('idVal');
    $data[$satusfld]=$newStatus;
	$os->saveR($table,$data,$idFld,$idVal);
	echo 'Status changed successfully';
	
}

if($_GET['changeLanguage']=='OK' &&  $_GET['langId']>0)
{

 
 
 	if($os->setLang($_GET['langId'])){ echo 1;exit();}
}


