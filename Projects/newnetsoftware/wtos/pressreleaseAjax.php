<? 
/*
   # wtos version : 1.1
   # page called by ajax script in pressreleaseDataView.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'wtosCommon.php');
$pluginName='';
$os->loadPluginConstant($pluginName);

 
?><?

if($os->get('WT_pressreleaseListing')=='OK')
 
{
    $where='';
	$showPerPage= $os->post('showPerPage');
	 	
	
$andtitle=  $os->postAndQuery('title_s','title','%');
$anddetails=  $os->postAndQuery('details_s','details','%');

    $f_releaseDate_s= $os->post('f_releaseDate_s'); $t_releaseDate_s= $os->post('t_releaseDate_s');
   $andreleaseDate=$os->DateQ('releaseDate',$f_releaseDate_s,$t_releaseDate_s,$sTime='00:00:00',$eTime='59:59:59');
$andactive=  $os->postAndQuery('active_s','active','%');

	   
	$searchKey=$os->post('searchKey');
	if($searchKey!=''){
	$where ="and ( title like '%$searchKey%' Or details like '%$searchKey%' Or active like '%$searchKey%' )";
 
	}
		
	$listingQuery="  select * from pressrelease where pressReleaseId>0   $where   $andtitle  $anddetails  $andreleaseDate  $andactive     order by pressReleaseId desc";
	  
	$resource=$os->pagingQuery($listingQuery,$os->showPerPage,false,true);
	$rsRecords=$resource['resource'];
	 
 
?>
<div class="listingRecords">
<div class="pagingLinkCss">Total:<b><? echo $os->val($resource,'totalRec'); ?></b>  &nbsp;&nbsp; <? echo $resource['links']; ?>   </div>

<table  border="0" cellspacing="2" cellpadding="2" class="noBorder"  >
							<tr class="borderTitle" >
						
	                            <td >#</td>
									<td >Action </td>
								

											
<td ><b>title</b></td>  
  <td ><b>details</b></td>  
  <td ><b>releaseDate</b></td>  
  <td ><b>active</b></td>  
  						
							 
 
						       	</tr>
							
							
							
							<?php
								  
						  	 $serial=$os->val($resource,'serial');  
						 
							while($record=$os->mfa( $rsRecords)){ 
							 $serial++;
							    
								
							
						
							 ?>
							<tr class="trListing">
							<td><?php echo $serial; ?>     </td>
							<td> 
							<? if($os->access('wtView')){ ?>
							<span  class="actionLink" ><a href="javascript:void(0)"  onclick="WT_pressreleaseGetById('<? echo $record['pressReleaseId'];?>')" >Edit</a></span>  <? } ?>  </td>
								
<td><?php echo $record['title']?> </td>  
  <td><?php echo $record['details']?> </td>  
  <td><?php echo $os->showDate($record['releaseDate']);?> </td>  
  <td> <? if(isset($os->activeInactive[$record['active']])){ echo  $os->activeInactive[$record['active']]; } ?></td> 
  
								
				 </tr>
                          <? 
						  
						 
						  } ?>  
							
		
			
			
							 
		</table> 
		
		
		
		</div>
		
		<br />
		
		
						
<?php 
exit();
	
}
 





if($os->get('WT_pressreleaseEditAndSave')=='OK')
{
 $pressReleaseId=$os->post('pressReleaseId');
 
 
		 
 $dataToSave['title']=addslashes($os->post('title')); 
 $dataToSave['details']=addslashes($os->post('details')); 
 $dataToSave['releaseDate']=$os->saveDate($os->post('releaseDate')); 
 $dataToSave['active']=addslashes($os->post('active')); 

 
		
		
		//$dataToSave['modifyDate']=$os->now();
		//$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($pressReleaseId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		 
          $qResult=$os->save('pressrelease',$dataToSave,'pressReleaseId',$pressReleaseId);///    allowed char '\*#@/"~$^.,()|+_-=:££ 	
		if($qResult)  
				{
		if($pressReleaseId>0 ){ $mgs= " Data updated Successfully";}
		if($pressReleaseId<1 ){ $mgs= " Data Added Successfully"; $pressReleaseId=  $qResult;}
		
		  $mgs=$pressReleaseId."#-#".$mgs;
		}
		else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		//_d($dataToSave);
		echo $mgs;		
 
exit();
	
} 
 
if($os->get('WT_pressreleaseGetById')=='OK')
{
		$pressReleaseId=$os->post('pressReleaseId');
		
		if($pressReleaseId>0)	
		{
		$wheres=" where pressReleaseId='$pressReleaseId'";
		}
	    $dataQuery=" select * from pressrelease  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
 $record['title']=$record['title'];
 $record['details']=$record['details'];
 $record['releaseDate']=$os->showDate($record['releaseDate']); 
 $record['active']=$record['active'];

		
		
		echo  json_encode($record);	 
 
exit();
	
}
 
 
if($os->get('WT_pressreleaseDeleteRowById')=='OK')
{ 

$pressReleaseId=$os->post('pressReleaseId');
 if($pressReleaseId>0){
 $updateQuery="delete from pressrelease where pressReleaseId='$pressReleaseId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
 
