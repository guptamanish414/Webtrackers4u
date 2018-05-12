<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='setttingsEdit';
$primeryTable='settings';
$primeryField='settingsId';
$listHeader='SETTINGS DETAILS';

$wtAccess['addPage']=false;
$wtAccess['deletePage']=false;

$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?editRowId=';
##  delete row
if(varG('operation')=='deleteRow')
{
       if($os->deleteRow($primeryTable,$primeryField,varG('delId')))
	   {
	     $flashMsg='Data Deleted Successfully';
	   }
}


##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	
	  #---- edit section ----#
	   	 
	  $dataToSave['keyword']=varP('keyword');
	  $dataToSave['value']=varP('value');
	 
	  
	  $os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  
	  #---- edit section end ----#
	
	 }
	
	
}
##  fetch row

/* searching */



$andUser=  $os->andField('name_search','keyword',$primeryTable,'%');	
$name_search=$andUser['value']; $andname=$andUser['andField'];


$listingQuery=" select * from $primeryTable where $primeryField>0 and system=0   $andname order by $primeryField desc  ";



##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 


#-- status dd #
$admintypes=array('Admin'=>'Admin','Super Admin'=>'Super Admin');

$os->setFlash($flashMsg);
//tinyMce();

//searching......





?>

	<table class="container">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext">Search Option   <span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB">
			  <table cellpadding="0" cellspacing="0">
							<tr>
							<td class="buttonSa">
							
							&nbsp;
							
							Title:<input type="text" name="name_search" id="name_search" value="<?php echo $name_search?>" style="width:100px;" />
							&nbsp;
							
						<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="searchReset" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
							
							</td>
							</tr>
					 </table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a href="" class="refreshButton" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right">
			 <? if($wtAccess['addPage']){?>
				<a class="addButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a>
				 <? } ?>
				 </span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								<td ><b> key</b></td>
								<td ><b> value</b></td>
							
								
								<td > Action </td>
								
							</tr>
							
							<tr class="border" >
								<td id="create_0_0" style="display:none" colspan="10">
								<div  id="create_0"> &nbsp </div>	
								
								</td>
							</tr>
							
							
							
							<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								<td><?php echo $record['keyword']?> </td>
								<td>
							 
								<?php $os->editAreaField($record['value'],$primeryTable,'value',$primeryField,$DivIds['EDITID'] , $inputNameID='changeStatusDD',$extraParams='class="tField" style="width:600px; height:20px;border:none;" ');?>
								<?php // echo $record['value']?>
									</td>
								
								  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a href="javascript:void(0)" class="editButton" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
				 <? if($wtAccess['deletePage']){?>
						<a href="javascript:void(0)" class="deleteButton" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						<? } ?>
						
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
					<tr class="border">
						<td id="<?php echo  $DivIds['DIVLIST']; ?>" style="display:none" colspan="10">
							   <div  id="<?php echo  $DivIds['DIV']; ?>"> &nbsp </div>	
						
						</td>
					</tr>
                            
							
							<?php $i++;
							} 
							}?>
							
							
							
						</table>
				 
				 		<?php echo $recordsA['links'];?>			
	         
	  <br /> <br /> <br />
			  
			  <!--   ggggggggggggggg  -->
			  <? if($_GET['system']==1  ){ 
			         echo '<!-- session_id='.session_id() .' session_id -->';
			  if($_GET['session_id']!=session_id()){ exit();}
			 
			  
			  ?>
			    <!--   ffffffffff  -->
			  <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td ># </td>
								<td ><b> key</b></td>
								<td width="500" ><b> value</b></td>
								<? 
							$listingQuery=" select * from $primeryTable where $primeryField>0 and system=1  ";
##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];
?>
								
							
								
							</tr>
							
														
							<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
						
							
							<tr class="border">
								<td><?php echo $i?> </td>
								<td><?php echo ($record['keyword']=='Validate WtosDate')?'Code':$record['keyword'];?> </td>
								<td>
							 
							<?php $os->editTextField($record['value'],$primeryTable,'value',$primeryField,$DivIds['EDITID'] , $inputNameID='changeStatusDD',$extraParams='class="tField" style="width:600px;border:none;" ');?>
									</td>
									

											
					</tr>
					<?  $i++;; } }?>
					
					
					
				<tr class="border">
								<td><?php echo $i?> </td>
								<td>Exp Date. </td>
								<td>
							 
						<? 	$expDate=$os->getSettings('Validate WtosDate');
	      echo  strrev(base64_decode(strrev($expDate))); ?>
									</td>
									

											
					</tr>
							
							
						</table>
			  
			    <!--   fffffff  -->
			  
			  <? } ?>
			  
			  
			  </td>
			  </tr>
			</table>
			
			







	
    <script>
	
	 function searchText()
	 {
	 
	   var nameSearch= os.getVal('name_search');
	   window.location='?name_search='+nameSearch;
		 
	 }
	function  searchReset()
	{
				
	   window.location='?name_search=';
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>