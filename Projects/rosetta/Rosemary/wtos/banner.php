<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='bannerEdit';
$listPAGE='banner';
$primeryTable='banner';
$primeryField='bannerId';
$listHeader='Banner List';

 
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
		
		
 $dataToSave['title']=varP('title'); 
 $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images/Banner');
				   	if($image!=''){
					$dataToSave['image']='wtos-images/Banner/'.$image;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);}
					} 					
						
 $dataToSave['type']=varP('type'); 
 $dataToSave['link']=varP('link'); 
 $dataToSave['status']=varP('status'); 

		 
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

 
$andtitleA=  $os->andField('title','title',$primeryTable,'%');
   $title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
$andtypeA=  $os->andField('type','type',$primeryTable,'%');
   $type=$andtypeA['value']; $andtype=$andtypeA['andField'];	 
$andstatusA=  $os->andField('status','status',$primeryTable,'=');
   $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  $andtype  $andstatus    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 $activeColorStatus=array('Active'=>'A0EBB9','Inactive'=>'F2C6C6');

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
	

 Title: <input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
   Type:
	
	<select name="type" id="type" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->bannerType,$type);	?></select>	
   Status:
	
	<select name="status" id="status" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->activeStatus,$status);	?></select>	
  
	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="searchReset" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
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
								
								
<td ><b>Title</b></td>  
  <td ><b>Image</b></td>  
  <td ><b>Type</b></td>  
  <td ><b>Link</b></td>  
  <td ><b>Status</b></td>  
  
								
								 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
							<tr class="border" >
								<td id="create_0_0" style="display:none" colspan="10">
								<div  id="create_0"> &nbsp </div>	
								
								</td>
							</tr>
							
							
							
							<?php
							 $c=1;
							 $i=$os->slNo();
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								
								
<td><?php echo $record['title']?> </td>  
  <td>
  <?php if($record['image']!=''){?>
 <img alt="" onclick="showLargeImage('<?php echo $site['urlFront'].$record['image'];?>')" class="listImg" src="<?php  echo $site['urlFront'].$record['image']; ?>"/>
   <?php }?>
  </td>  
  <td><?php echo  
	$os->bannerType[$record['type']]; ?></td> 
  <td><?php echo $record['link']?> </td>  
  <td><?php $os->changeStatusDD($os->activeStatus,$record['status'],'banner','status','bannerId',$DivIds['EDITID'],$activeColorStatus); ?></td> 
  
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
				 
                            
							
							<?php $i++; $c++;
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
	 
	   
 var titleV= os.getVal('title'); 
 var typeV= os.getVal('type'); 
 var statusV= os.getVal('status'); 
window.location='<?php echo $listPAGEUrl; ?>title='+titleV +'&type='+typeV +'&status='+statusV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>title=&type=&status=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>