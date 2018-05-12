<? session_start();
ob_start();
include('includes/config.php');
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

if($_GET['addStock']=='ok')
{
  
	
	  $dataToSave['purchaseDate']=$_GET['purchaseDate'];
	  $dataToSave['vendorId']=$_GET['vendorId'];
	  $dataToSave['addedBy']=$os->userDetails['adminId'];
	  $dataToSave['addedDate']=date('Y-m-d h:i:s');
	  
	//  _d($dataToSave);
	 $id= $os->save_purchaseorder($dataToSave);
	 echo $id;
	
}

if($_GET['addSale']=='ok')
{
  
	
	  $dataToSave['saleDate']=$_GET['saleDate'];
	  $dataToSave['distributorId']=$_GET['distributorId'];
	 
	  $dataToSave['addedDate']=date('Y-m-d h:i:s');
	    
	   if($os->userDetails['adminType']!='Super Admin')
	   {
			$dataToSave['storeId']= $os->userDetails['storeId'];
			$dataToSave['addedBy']=$os->userDetails['adminId'];
	   }
	  
	//  _d($dataToSave);
	 $id= $os->save_saleorder($dataToSave);
	 echo $id;
	
}
if($_GET['addBill']=='ok')
{
  
	
	  $saleId=$_GET['saleId'];
	  $dataToSave['balance']=$_GET['balance'];
	  $dataToSave['paidDate']=$os->dmyToDB($_GET['paidDate']);
	  $dataToSave['saleDate']=$os->dmyToDB($_GET['paidDate']); #----------  somthing  need to change  
	   	 $sD=explode('/',$_GET['paidDate'])	;
	    $dataToSave['sYear']=$sD[2];
		 $dataToSave['sMonth']=$sD[1];
		  $dataToSave['sDate']=$sD[0];
	  
	  $dataToSave['paidAmount']=$_GET['paidAmount'];
	  $dataToSave['totalAmount']=$_GET['totalAmount'];
	  
	
	 $id= $os->save_saleorder($dataToSave,'saleId',$saleId);
	 echo $id;
	
}