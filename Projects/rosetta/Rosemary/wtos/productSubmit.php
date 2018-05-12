<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='productSubmitEdit';
$listPAGE='productSubmit';
$primeryTable='productSubmit';
$primeryField='productSubmitId';
$listHeader='Product Submit List ';

 
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
		
		
 $dataToSave['name']=varP('name'); 
 $dataToSave['code']=varP('code'); 
 $dataToSave['make']=varP('make'); 
 $dataToSave['model']=varP('model'); 
 $dataToSave['description']=varP('description'); 
 $dataToSave['price']=varP('price'); 
 $dataToSave['availableQuantity']=varP('availableQuantity'); 
 $dataToSave['dealerId']=varP('dealerId'); 
 $dataToSave['status']=varP('status'); 
 $dataToSave['oldPrice']=varP('oldPrice'); 
 
 				if($_FILES['img1']['name']!=''){list($width,$height,$type,$attr) = getimagesize($_FILES['img1']['tmp_name']);}#for Thumbnail
 $img1=$os->UploadPhoto('img1',$site['imgPath'].'wtos-images/submit_product');
				   	if($img1!=''){
					$dataToSave['img1']='wtos-images/submit_product/'.$img1;
					createThumbnail($type,$width,$height,$thumb_width='150',$thumb_height='150',$img1,$site['imgPath'].'wtos-images/submit_product/',$site['imgPath'].'wtos-images/submit_product/thumb/');
					//if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'img1',$site['imgPath']);}
					} 					
				if($_FILES['img2']['name']!=''){list($width,$height,$type,$attr) = getimagesize($_FILES['img2']['tmp_name']);}#for Thumbnail					
 $img2=$os->UploadPhoto('img2',$site['imgPath'].'wtos-images/submit_product');
				   	if($img2!=''){
					$dataToSave['img2']='wtos-images/submit_product/'.$img2;
					createThumbnail($type,$width,$height,$thumb_width='150',$thumb_height='150',$img2,$site['imgPath'].'wtos-images/submit_product/',$site['imgPath'].'wtos-images/submit_product/thumb/');
					//if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'img2',$site['imgPath']);}
					}
										
					if($_FILES['img3']['name']!=''){list($width,$height,$type,$attr) = getimagesize($_FILES['img3']['tmp_name']);}#for Thumbnail	
 $img3=$os->UploadPhoto('img3',$site['imgPath'].'wtos-images/submit_product');
				   	if($img3!=''){
					$dataToSave['img3']='wtos-images/submit_product/'.$img3;
					createThumbnail($type,$width,$height,$thumb_width='150',$thumb_height='150',$img3,$site['imgPath'].'wtos-images/submit_product/',$site['imgPath'].'wtos-images/submit_product/thumb/');
					//if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'img3',$site['imgPath']);}
					} 					
						

		 
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

 
$andnameA=  $os->andField('name','name',$primeryTable,'%');
   $name=$andnameA['value']; $andname=$andnameA['andField'];	 
$andcodeA=  $os->andField('code','code',$primeryTable,'%');
   $code=$andcodeA['value']; $andcode=$andcodeA['andField'];	 
$andmakeA=  $os->andField('make','make',$primeryTable,'%');
   $make=$andmakeA['value']; $andmake=$andmakeA['andField'];	 
$anddescriptionA=  $os->andField('description','description',$primeryTable,'%');
   $description=$anddescriptionA['value']; $anddescription=$anddescriptionA['andField'];	 
$anddealerIdA=  $os->andField('dealerId','dealerId',$primeryTable,'%');
   $dealerId=$anddealerIdA['value']; $anddealerId=$anddealerIdA['andField'];	 
$andstatusA=  $os->andField('status','status',$primeryTable,'%');
   $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andname  $andcode  $andmake  $anddescription  $anddealerId  $andstatus    $andActive order by $primeryField desc  ";

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
	

 Name: <input type="text" name="name" id="name" value="<?php echo $name?>" style="width:100px;" /> &nbsp;  
   Code: <input type="text" name="code" id="code" value="<?php echo $code?>" style="width:100px;" /> &nbsp;  
   Make: <input type="text" name="make" id="make" value="<?php echo $make?>" style="width:100px;" /> &nbsp;  
   Description: <input type="text" name="description" id="description" value="<?php echo $description?>" style="width:100px;" /> &nbsp;  
   Dealer:
	
	
	<select name="dealerId" id="dealerId" class="SelectBox" style="width:150px;" ><option value="">All</option>		  	<? 
								
										  $os->optionsHTML($dealerId,'customerId','name','customer',"dealer='Yes'",'name ASC','');?>
							</select>
   Status:
	
	<select name="status" id="status" class="SelectBox"><option value="">All</option>	<? 
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
								
								
<td ><b>Name</b></td>  
  <td ><b>Code</b></td>  
  <td ><b>Make</b></td>  
  <td ><b>Model</b></td>  
  <td ><b>Description</b></td>  
  <td ><b>Price</b></td>  
  <td ><b>Available Qty</b></td>  
  <td ><b>Dealer</b></td>  
  <td ><b>Status</b></td>  
  <td ><b>Old Price</b></td>  
  <td ><b>Image 1</b></td>  
  
								
								 
								
                                
								
								
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
								
								
<td><?php echo $record['name']?> </td>  
  <td><?php echo $record['code']?> </td>  
  <td><?php echo $record['make']?> </td>  
  <td><?php echo $record['model']?> </td>  
  <td><?php echo $record['description']?> </td>  
  <td><?php echo $record['price']?> </td>  
  <td><?php echo $record['availableQuantity']?> </td>  
  <td><?php echo  
	$os->getByFld('customer','customerId',$record['dealerId'],'name'); ?></td> 
  <td><?php echo  
	$os->activeStatus[$record['status']]; ?></td> 
  <td><?php echo $record['oldPrice']?> </td>  
  <td>  
   <?php if($record['img1']!=''){?>
 <img alt="" onclick="showLargeImage('<?php echo $site['urlFront'].$record['img1'];?>')" class="listImg" src="<?php  echo $site['urlFront'].$record['img1']; ?>"/>
   <?php }?>
  </td>  
  
							 	
								
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
	 
	   
 var nameV= os.getVal('name'); 
 var codeV= os.getVal('code'); 
 var makeV= os.getVal('make'); 
 var descriptionV= os.getVal('description'); 
 var dealerIdV= os.getVal('dealerId'); 
 var statusV= os.getVal('status'); 
window.location='<?php echo $listPAGEUrl; ?>name='+nameV +'&code='+codeV +'&make='+makeV +'&description='+descriptionV +'&dealerId='+dealerIdV +'&status='+statusV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>name=&code=&make=&description=&dealerId=&status=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>