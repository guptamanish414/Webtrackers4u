<?php
include('includes/config.php');
include('top.php');

// config 
$DivIds['AJAXPAGE']='propertyEdit';
 

$listPAGE='property';
 
$primeryTable='property';
$primeryField='propertyId';
$listHeader='List Property';

 
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
		
		
 $dataToSave['title']=addslashes(varP('title')); 
 $dataToSave['name']=addslashes(varP('name')); 
 $dataToSave['locationId']=varP('locationId'); 
 $dataToSave['address']=addslashes(varP('address')); 
 $dataToSave['postcode']=varP('postcode'); 
 $dataToSave['price']=varP('price'); 
 $dataToSave['bed']=varP('bed'); 
 $dataToSave['bath']=varP('bath'); 
 $dataToSave['reception']=varP('reception'); 
 $dataToSave['priority']=varP('priority');
 $dataToSave['purposeType']=varP('purposeType');
 $dataToSave['featured']=varP('featured'); 
 $dataToSave['label']=addslashes(varP('label')); 
 $dataToSave['shortDescription']=addslashes(varP('shortDescription')); 
 $dataToSave['fullDescription']=addslashes(varP('fullDescription')); 
 $dataToSave['type']=varP('type'); 
 $dataToSave['propertyType']=varP('propertyType'); 
 $dataToSave['priceUnit']=$os->propUnit[$dataToSave['type']]; 
// $dataToSave['seoId']=str_replace(array('-',' ','`',"'",'--','---'),'-',$dataToSave['title'].'-'.$dataToSave['address'].'-for-'.$dataToSave['type']);
  $dataToSave['seoId']=str_replace(array('-',' ','`',"'",'--','---'),'-',$dataToSave['title'].'-for-'.$dataToSave['type']);
  
  
 
  
 $dataToSave['active']=varP('active'); 
 if($rowId<1){$dataToSave['active']=1;}
		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	 
	 
	 
	 
	 
	                $floorplan=$os->UploadPhoto('floorplan',$site['imgPath'].'wtos-images');
					if($floorplan){
					$dataToSave['floorplan']='wtos-images/'.$floorplan;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'floorplan',$site['imgPath']);}
					} 					
					
					
					
					$EPC=$os->UploadPhoto('EPC',$site['imgPath'].'wtos-images');
				   	if($EPC){
					$dataToSave['EPC']='wtos-images/'.$EPC;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'EPC',$site['imgPath']);}
					} 					
					
					
					
					$print=$os->UploadPhoto('print',$site['imgPath'].'wtos-images');
				   	if($print){
					$dataToSave['print']='wtos-images/'.$print;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'print',$site['imgPath']);}
					} 					
					
			         $brochurePdf=$os->UploadPhoto('brochurePdf',$site['imgPath'].'wtos-images');
				   	if($brochurePdf){
					$dataToSave['brochurePdf']='wtos-images/'.$brochurePdf;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'brochurePdf',$site['imgPath']);}
					} 					
					
					
					$qrCode=$os->UploadPhoto('qrCode',$site['imgPath'].'wtos-images');
				   	if($qrCode){
					$dataToSave['qrCode']='wtos-images/'.$qrCode;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'qrCode',$site['imgPath']);}
					} 					
					
					$gasCertificate=$os->UploadPhoto('gasCertificate',$site['imgPath'].'wtos-images');
				   	if($gasCertificate){
					$dataToSave['gasCertificate']='wtos-images/'.$gasCertificate;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'gasCertificate',$site['imgPath']);}
					} 	
 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	 
	 }
	
	
}
 

/* searching */

	$active= $os->setNget('active',$primeryTable);
	$andActive=($active!=-1 && $active!='' )? " and active='$active'":'';
	$andtitleA=  $os->andField('title','title',$primeryTable,'%');
	$title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
	$andnameA=  $os->andField('name','name',$primeryTable,'%');
	$name=$andnameA['value']; $andname=$andnameA['andField'];	 
	$andpostcodeA=  $os->andField('postcode','postcode',$primeryTable,'%');
	$postcode=$andpostcodeA['value']; $andpostcode=$andpostcodeA['andField'];	 
	$andbedA=  $os->andField('bed','bed',$primeryTable,'%');
	$bed=$andbedA['value']; $andbed=$andbedA['andField'];	 
	$andbathA=  $os->andField('bath','bath',$primeryTable,'%');
	$bath=$andbathA['value']; $andbath=$andbathA['andField'];	 
	$andfeaturedA=  $os->andField('featured','featured',$primeryTable,'%');
	$featured=$andfeaturedA['value']; $andfeatured=$andfeaturedA['andField'];	 
	$andtypeA=  $os->andField('type','type',$primeryTable,'%');
	$type=$andtypeA['value']; $andtype=$andtypeA['andField'];	 
  
  $orderBy= $os->setNget('orderBy',$primeryTable);  
  $ascDesc= $os->setNget('ascDesc',$primeryTable);  
  $orderByascDesc="order by $primeryField desc";
   if($orderBy !='' && $ascDesc!=""){
   $orderByascDesc="order by $orderBy $ascDesc ";
   }	 
		
		
	 
  
  


 $listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  $andname $andActive  $andpostcode  $andbed  $andbath  $andfeatured  $andtype $andType      $hidden  $orderByascDesc ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 
$colorFeatured=array('No'=>'FFFFFF','Yes'=>'FF9900');

$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');
$statuslist=array('-1'=>'All','1'=>'Active','0'=>'Inactive');

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>
<style>
 
</style>
	<table class="container"  >
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
	

 Title:<input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
  <!-- Name:--><input type="text" name="name" id="name" value="<?php echo $name?>" style="width:100px; display:none;" /> &nbsp;  
   Postcode:<input type="text" name="postcode" id="postcode" value="<?php echo $postcode?>" style="width:100px;" /> &nbsp;  
   Bed:<input type="text" name="bed" id="bed" value="<?php echo $bed?>" style="width:100px;" /> &nbsp; 
    
  Status<select name="active" id="active_search"  onchange="javascript:window.location='<? $seoLink->getLink('property',true); ?>?active='+this.value"><?php $os->onlyOption($statuslist,$active);	?>
							</select>
    
   Featured:<select name="featured" id="featured" class="textbox fWidth" style="width:60px;">
							<option value=""> All </option>
							 
							<?
							 
							$os->onlyOption($os->propFeature,$featured);
							  
							?>
							</select>&nbsp;  
							
							
							 Order By:<select name="orderBy" id="orderBy" class="textbox fWidth" style="width:60px;">
							<option value="">   </option>	 <?     $os->onlyOption($os->orderBy,$orderBy);	?>	</select>
							<select name="ascDesc" id="ascDesc" class="textbox fWidth" style="width:60px;">
							<option value="">   </option>	 <?     $os->onlyOption($os->ascDesc,$ascDesc);	?>	</select>
							
							
							
							&nbsp;  
							
							
							
  Type: 
  
	 <select name="type" id="type" class="textbox fWidth" style="width:60px;">
							<option value=""> Select Type</option><?							 
							$os->onlyOption($os->propType,$type);							  
							?>	</select>	&nbsp;   
	
	<a class="tlinkCss searches" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="tlinkCss reset" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				&nbsp; <a class="tlinkCss refresh" style="color:#000000; margin-left:20px;" href="<? echo $_SERVER['REQUEST_URI']; ?>" > Refresh </a>    
				 <span style="float:right"><a  class="tlinkCss add"  href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0')" style="color:#FF0000;">Add Property</a></span></div>
				   
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Title</b></td>  
 
  <td ><b>Action Link</b></td> 
  <td ><b>Location</b></td>  
 
 
  <td ><b>Price</b></td>  
  <td ><b>Bed</b></td>  
  <td ><b>Bath</b></td>  
   <td ><b>Sofa</b></td>  
  <!--<td ><b>Reception</b></td>  -->
 <!-- <td ><b>Priority</b></td>  -->
  <td ><b>Featured</b></td>  
  <td ><b>Label</b></td>  
  <td ><b>Type</b></td>  
    <td ><b>Status</b></td> 
  
	
								
								
								
							</tr>
							
							 
							
							
							
							<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								$location =$os->getByFld('propertylocation','propertylocationId',$record['locationId'],'title');
							
							 ?>
							
							<tr class="border" >
								<td><?php echo $i?>     </td>
								
								
<td><b><?php echo $record['title']?></b>
<div class="actionLinksDiv_notinuse" style="font-size:12px; width:600px; margin-top:-5px; display:none"><!-- temporary display none and  
						
						
<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>&nbsp;&nbsp;
<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>&nbsp;&nbsp;
<a class="editButton" href="<? $site['url'] ?>print-window.php?propertyId=<?php echo $record['propertyId']?>"  >Print</a> &nbsp;&nbsp;
<a class="editButton" href="<? $site['url'] ?>print-brochure.php?propertyId=<?php echo $record['propertyId']?>"  >Brochure</a> &nbsp;&nbsp;
 RightMove
<a class="editButton" href="javascript:void(0);" onclick="javascript:popupURL('<? $site['url'] ?>rightMove.php?jsonRequest=addProperty&propertyId=<?php echo $record['propertyId']?>');"   > Upload</a>&nbsp&nbsp;
<a class="editButton"   href="javascript:void(0);" onclick="javascript:popupURL('<? $site['url'] ?>rightMove.php?jsonRequest=deleteProperty&propertyId=<?php echo $record['propertyId']?>')"   > Delete</a>&nbsp&nbsp;
<!--<a class="editButton"  href="javascript:void(0);" onclick="javascript:popupURL('<? $site['url'] ?>rightMove.php?jsonRequest=getPerformance&propertyId=<?php echo $record['propertyId']?>')" title="performance call"   > perform</a>&nbsp-->
<a class="editButton"  href="javascript:void(0);" onclick="javascript:popupURL('<? $site['url'] ?>rightMove.php?jsonRequest=getBranch&propertyId=<?php echo $record['propertyId']?>')"   > Get Branch</a>&nbsp&nbsp;
 </div>
 
  </td> 
 
  <td>
  <? if($record['rightmoveLink']!='' && $notinuse){ ?>
  <a style="font-size:9px" target="_blank" href="<?php echo $record['rightmoveLink']?>">Rightmove Link</a>
  <? } ?>
   <a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>&nbsp;&nbsp;
<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>&nbsp;&nbsp;
  </td> 
  <td><?php echo $location; ?> </td>  
 
 
  <td><?php echo $record['price']?> </td>  
  <td><?php echo $record['bed']?> </td>  
  <td><?php echo $record['bath']?> </td>  
    <td><?php echo $record['sofa']?> </td>  
 <!-- <td><?php echo $record['reception']?> </td>  -->
<!--  <td><?php echo $record['priority']?> </td>  -->
 <td><?php $os->changeStatusDD($os->propFeature,$record['featured'],'property','featured','propertyId',$DivIds['EDITID'],$colorFeatured); ?>  </td> 
  <td><?php echo $record['label']?> </td>  
  <td><b><?php echo $os->propType[$record['type']]?> </b>
  <?php $os->changeStatusDD($os->propertyType,$record['propertyType'],'property','propertyType','propertyId',$DivIds['EDITID']); ?>
  </td>  
   <td><?php $os->changeStatusDD($status,$record['active'],'property','active','propertyId',$DivIds['EDITID'],$colorStatus); ?>  </td>	
      		
							 	
						
						  
														
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
		 var nameV= os.getVal('name'); 
		 var postcodeV= os.getVal('postcode'); 
		 var bedV= os.getVal('bed'); 
		 var bathV= os.getVal('bath'); 
		 var featuredV= os.getVal('featured'); 
		 var typeV= os.getVal('type'); 
		 var orderByV= os.getVal('orderBy'); 
		 var ascDescV= os.getVal('ascDesc'); 
		 
		// if(orderByV!='')
	//	 {
	//	   if(ascDescV==''){ "Please select order.";}
	//	 }
		 
		 
		window.location='<?php echo $listPAGEUrl; ?>title='+titleV +'&name='+nameV +'&postcode='+postcodeV +'&bed='+bedV +'&bath='+bathV +'&featured='+featuredV +'&type='+typeV+'&orderBy='+orderByV+'&ascDesc='+ascDescV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>title=&name=&postcode=&bed=&bath=&featured=&type=&orderBy=&ascDesc=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>