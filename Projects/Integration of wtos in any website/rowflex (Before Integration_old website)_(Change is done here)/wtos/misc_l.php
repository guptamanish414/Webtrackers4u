<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='miscEdit_e';
$listPAGE='misc_l';
$primeryTable='misc';
$primeryField='miscId';
$listHeader='List Misc';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
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
		
		
 $dataToSave['adminId']=varP('adminId'); 
 $dataToSave['newsId']=varP('newsId'); 
 $dataToSave['pages']=$os->saveDate(varP('pages')); 
 $dataToSave['modifyDate']=varP('modifyDate'); 
 $dataToSave['active']=varP('active'); 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
		if($rowId < 1){
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		
		
	 
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 
$andadminIdA=  $os->andField('adminId','adminId',$primeryTable,'%');
   $adminId=$andadminIdA['value']; $andadminId=$andadminIdA['andField'];	 

    $f_pages= $os->setNget('f_pages',$primeryTable);
	$t_pages= $os->setNget('t_pages',$primeryTable);
   $andpages=$os->DateQ('pages',$f_pages,$t_pages,$sTime='00:00:00',$eTime='59:59:59');
   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andadminId  $andpages    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

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
	

 adminId:
	
	
	<select name="adminId" id="adminId" class="textbox fWidth" ><option value="">Select adminId</option>		  	<? 
								
										  $os->optionsHTML($adminId,'adminId','name','admin');?>
							</select>
  From pages: <input class="dtpk" type="text" name="f_pages" id="f_pages" value="<?php echo $f_pages?>" style="width:100px;" /> &nbsp;  
  To pages: <input class="dtpk" type="text" name="t_pages" id="t_pages" value="<?php echo $t_pages?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="resetButton" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a  class="addButton"  href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>adminId</b></td>  
  <td ><b>pages</b></td>  
  
								
								 
								
                                
								
								
								<td >Action </td>
								
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
								
								
<td><?php echo  
	$os->getByFld('admin','adminId',$record['adminId'],'name'); ?></td> 
  <td><?php echo $os->showDate($record['pages']);?> </td>  
  
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
				 
                            
							
							<?php $i++;
							} 
							}?>
							
							
							
						</table>
				 
				 		<?php echo $recordsA['links'];?>			
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>







	
    <script>
	
	 function searchText()
	 {
	 
	   
 var adminIdV= os.getVal('adminId'); 
 var f_pagesV= os.getVal('f_pages'); 
 var t_pagesV= os.getVal('t_pages'); 
window.location='<?php echo $listPAGEUrl; ?>adminId='+adminIdV +'&f_pages='+f_pagesV +'&t_pages='+t_pagesV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>adminId=&f_pages=&t_pages=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>