<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='imageEdit';
$listPAGE='image';
$primeryTable='image';
$primeryField='imageId';
$listHeader='Image List';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft','imageType','imageTypeId'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','imageType','imageTypeId'),'');


$imageType = $_GET['imageType'];

$imageTypeId = $_GET['imageTypeId'];


if($imageType=='' || $imageTypeId<1){echo '<font style="color:#FF0000; font-weight:bold;">Image Type or Image Type Id Not Found...</font>';exit();}


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
					if($_FILES['image']['name']!=''){list($width,$height,$type,$attr) = getimagesize($_FILES['image']['tmp_name']);}#for Thumbnail
                    $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images/product/');
				   	if($image){
					$dataToSave['image']='wtos-images/product/'.$image;
				//	if($rowId && $_FILES['image']['name']!='') {  $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);}
##thumb start				
createThumbnail($type,$width,$height,$thumb_width='59',$thumb_height='50',$image,$site['imgPath'].'wtos-images/product/',$site['imgPath'].'wtos-images/product/thumb_59x50/');
createThumbnail($type,$width,$height,$thumb_width='180',$thumb_height='254',$image,$site['imgPath'].'wtos-images/product/',$site['imgPath'].'wtos-images/product/thumb_180x254/');
##thumb end	
					} 					
					 
					
					
 $dataToSave['imageType']=varP('imageType'); 
 $dataToSave['active']=1;
$dataToSave['imageTypeId']=$imageTypeId;


$dataToSave['modifyBy']=$os->userDetails['adminId'];
 $dataToSave['modifyDate']=$os->now();

	if($rowId<1){	 
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
   
	/*$andimageTypeA=  $os->andField('imageType','imageType',$primeryTable,'%');
  $imageType=$andimageTypeA['value']; $andimageType=$andimageTypeA['andField'];	*/
   
$active= $os->setNget('active',$primeryTable);  //for session set
$andActive=($active!=-1 && $active!='' )? " and active='$active'":'';
   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  AND imageType='$imageType' AND imageTypeId='$imageTypeId'  $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......

$featuredOptions = $os->yesNO;
$featuredColors = array('No'=>'FF9B9B','Yes'=>'C4FFD2');



?>

	<table class="container">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext">Search Option   <!--<span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span>--></div>
			  <div class="searchB">
<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="buttonSa">
	

 Title:<input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
   <!--Image Type:--><select id="imageType"  name="imageType" class="SelectBox" style="display:none;">	
   										<option value="">All</option>									
										<?php $os->onlyOption($os->imageType,$imageType);?>
										</select>  
   Active&nbsp;
	<select class="SelectBox" name="active" id="active_search"  onchange="javascript:window.location='<?php echo $listPAGEUrl; ?>active='+this.value">
	<option value="-1">All</option>
	<?php $os->onlyOption($os->activeOptions,$active);	?>
	</select>
	&nbsp;
	 
	
	<a  class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a  href="javascript:void(0)" class="searchReset" onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a class="addButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 <style>.listTable td{ text-align:center;}</style>
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Title</b></td>  
  <td ><b>Image</b></td>  
  <!--<td ><b>Image Type</b></td> -->
   <td ><b>Featured</b></td>  
  <td ><b>Active</b></td>  
  
								
								 
								
                                
								
								
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
								
								
<td><?php echo $record['title']?> </td>  
  <td><img src="<?php  echo $site['urlFront'].$record['image']; ?>"  height="50" width="50" /></td>  
  <!--<td><?php echo $record['imageType']?> </td>--> 
   <td>  
	<?php $os->changeStatusDD($featuredOptions,$record['featured'],'image','featured','imageId',$DivIds['EDITID'],$featuredColors); ?>
  </td> 
   <td><?php $os->changeStatusDD($os->activeOptions,$record['active'],'image','active','imageId',$DivIds['EDITID'],$os->activeColors); ?>  </td>
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a  class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
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
	 
	   
 var titleV= os.getVal('title'); 
 var imageTypeV= os.getVal('imageType'); 
window.location='<?php echo $listPAGEUrl; ?>title='+titleV +'&imageType='+imageTypeV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>title=&imageType=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>