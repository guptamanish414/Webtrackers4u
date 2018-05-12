<?php
include('includes/config.php');
include('top.php');
include('../wt-slider/sliderConfig.php');

// config 

$DivIds['AJAXPAGE']='appearanceEdit';
$listPAGE='appearance';
$primeryTable='appearance';
$primeryField='appearanceId';
$listHeader='Appearance';

 
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
		
		
 					$logoImage=$os->UploadPhoto('logoImage',$site['imgPath'].'wtos-images');
 
				   	if($logoImage!=''){$dataToSave['logoImage']='wtos-images/'.$logoImage;} 
									
					if($rowId && $_FILES['logoImage']['name']!='') {$os->removeImage($primeryTable,$primeryField,$rowId,'logoImage',$site['imgPath']);}
					
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$headerBgImg=$os->UploadPhoto('bodyBgImg',$site['imgPath'].'wtos-images');
 
				   	if($headerBgImg!=''){$dataToSave['bodyBgImg']='wtos-images/'.$headerBgImg;} 
									
					if($rowId && $_FILES['bodyBgImg']['name']!='') {$os->removeImage($primeryTable,$primeryField,$rowId,'bodyBgImg',$site['imgPath']);}
										
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$headerBgImg=$os->UploadPhoto('headerBgImg',$site['imgPath'].'wtos-images');
 
				   	if($headerBgImg!=''){$dataToSave['headerBgImg']='wtos-images/'.$headerBgImg;} 
									
					if($rowId && $_FILES['headerBgImg']['name']!='') {$os->removeImage($primeryTable,$primeryField,$rowId,'headerBgImg',$site['imgPath']);}
										
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


					$footerBgImg=$os->UploadPhoto('footerBgImg',$site['imgPath'].'wtos-images');
 
				   	if($footerBgImg!=''){$dataToSave['footerBgImg']='wtos-images/'.$footerBgImg;} 
									
					if($rowId && $_FILES['footerBgImg']['name']!='') {$os->removeImage($primeryTable,$primeryField,$rowId,'footerBgImg',$site['imgPath']);}



///////////////////////////////////////////////////////	//////////////////////////////////////////////////////////////////////////////////////////				

 $dataToSave['headerBgImgCss']=varP('headerBgImgCss'); 
 $dataToSave['footerBgImgCss']=varP('footerBgImgCss'); 
  $dataToSave['bodyBgImgCss']=varP('bodyBgImgCss'); 

					
					
 $dataToSave['sliderName']=varP('sliderName'); 
 $dataToSave['sliderEffect']=varP('sliderEffect'); 
 $dataToSave['sliderWidth']=varP('sliderWidth'); 
 $dataToSave['sliderHeight']=varP('sliderHeight'); 
 $dataToSave['sliderInterval']=varP('sliderInterval'); 

		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

   

$listingQuery=" select * from $primeryTable where $primeryField>0  order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 #-- status dd #
$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');


$yesNo = array('0'=>'No','1'=>'Yes');
$yesNoColorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9'); 
 

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
			  
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a class="addButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
							<td ><b>Logo Image</b></td> 
							<td ><b>Header BG Image</b></td>
							<td ><b>Footer BG Image</b></td>  
							<td style="width:250px;"><b>Slider Parameter</b></td>
							<td style="width:255px;"><b>CSS</b></td>
							<td >Status</td>
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
								
								
<td><img src="<?php  echo $site['urlFront'].$record['logoImage']; ?>"  height="70" width="70" /></td> 
<td><img src="<?php  echo $site['urlFront'].$record['headerBgImg']; ?>"  height="70" width="70" /></td>  
<td><img src="<?php  echo $site['urlFront'].$record['footerBgImg']; ?>"  height="70" width="70" /></td>  
  
  <td style="padding:0px; background:#F5F5F5;">
  <div style="border:1px solid #6A6A6A;">
	  <table border="0" cellpadding="0" cellpadding="0" class="listTable">
		  <tr>
		  <td width="30%">Name</td><td><?php if($record['sliderName']!=''){echo $sliderList[$record['sliderName']];}?></td>
		  </tr>
		  <tr>
			<td>Effect</td><td><?php if($record['sliderEffect']!=''){echo $sliderEffectList[$record['sliderName']][$record['sliderEffect']];}?></td>
		  </tr>
		  <tr>
			<td>Width</td><td><?php echo $record['sliderWidth']?></td>
		  </tr>
		  <tr>
			<td>Height</td>
			<td><?php echo $record['sliderHeight']?></td>
		   </tr>
		  <tr>
			<td>Interval</td>
			<td><?php echo $record['sliderInterval']?></td>
		   </tr> 
		  <tr>
			<td>AutoPlay</td>
			<td><?php $os->changeStatusDD($yesNo,$record['sliderAutoplay'],'appearance','sliderAutoplay','appearanceId',$DivIds['EDITID'],$yesNoColorStatus); ?></td>
		   </tr>
	  </table>
 </div>	  
  </td>
  
  
  <td valign="top"><?php $os->editAreaField(stripslashes( $record['css']),'appearance','css','appearanceId',$DivIds['EDITID'], $inputNameID='cssEdit',$extraParams='class="tArea" style="width:250px; height:100px;" ');?></td>
  
	<td><?php $os->changeStatusDD($status,$record['active'],'appearance','active','appearanceId',$DivIds['EDITID'],$colorStatus); ?>  </td>						 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<!--<a  class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>-->
						
						
						
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
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>







	
    <script>
	
	 function searchText()
	 {
	 
	   
 var sliderNameV= os.getVal('sliderName'); 
window.location='<?php echo $listPAGEUrl; ?>sliderName='+sliderNameV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>sliderName=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>