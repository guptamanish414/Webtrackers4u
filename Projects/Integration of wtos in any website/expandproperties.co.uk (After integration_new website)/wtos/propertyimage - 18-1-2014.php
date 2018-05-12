<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='propertyimageEdit';
$listPAGE='propertyimage';
$primeryTable='propertyimage';
$primeryField='propertyImageId';
$listHeader='List Property Image';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft','propertyId'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','propertyId'),'');
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
		
		
 $dataToSave['propertyId']=varP('propertyId'); 
 $dataToSave['title']=varP('title'); 

 $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
				   	if($image!=''){
					$dataToSave['image']='wtos-images/'.$image;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);}
					} 					
					
					
					
 $dataToSave['type']=varP('type'); 
 $dataToSave['active']=varP('active'); 

		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	 
	 }
	
	
}
 

/* searching */

 
$andpropertyIdA=  $os->andField('propertyId','propertyId',$primeryTable,'%');
  $propertyId=$andpropertyIdA['value']; $andpropertyId=$andpropertyIdA['andField'];	 
$andtitleA=  $os->andField('title','title',$primeryTable,'%');
  $title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
$andtypeA=  $os->andField('type','type',$primeryTable,'%');
  $type=$andtypeA['value']; $andtype=$andtypeA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andpropertyId  $andtitle  $andtype    $andActive order by priority asc, $primeryField desc  ";

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
			  
			  <div class="headertext" style="display:none;">Search Option   <span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB" style="display:none;">
<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="buttonSa">
	

<!-- Property:--><input type="text" name="propertyId" id="propertyId" value="<?php echo $propertyId?>" style="width:100px; display:none;" /> &nbsp;  
   Title:<input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
   Type:<input type="text" name="type" id="type" value="<?php echo $type?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="resetButton" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="<? echo $_SERVER['REQUEST_URI']; ?>" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a  class="addButton"  href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add Image</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								

  <td ><b>Title</b></td>  
  <td ><b>Image</b></td>  
 <td ><!--<b>Type</b>--> Order</td>  
 <td >  Print Order</td> 
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
  <td><img src="<?php  echo $site['urlFront'].$record['image']; ?>"  height="70" width="70" /></td>  
 <td> 
  
  <?php $os->editTextField($record['priority'],$primeryTable,'priority',$primeryField,$DivIds['EDITID'] , $inputNameID='pripritychange',$extraParams='class="tField" style="width:50px; border:1px solid #999999;" ');?>
  
   </td> 
   <td> 
  
  <?php $os->editTextField($record['printOrder'],$primeryTable,'printOrder',$primeryField,$DivIds['EDITID'] , $inputNameID='printOrderchange',$extraParams='class="tField" style="width:50px; border:1px solid #999999;" ');?>
  
   </td> 
  
  
  
   <td><?php $os->changeStatusDD($os->activeOptions,$record['active'],'propertyimage','active','propertyImageId',$DivIds['EDITID'],$os->activeColors); ?>  </td>
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
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
	 
	   
 var propertyIdV= os.getVal('propertyId'); 
 var titleV= os.getVal('title'); 
 var typeV= os.getVal('type'); 
window.location='<?php echo $listPAGEUrl; ?>propertyId='+propertyIdV +'&title='+titleV +'&type='+typeV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>propertyId=&title=&type=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>