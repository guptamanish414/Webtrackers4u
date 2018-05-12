<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='property';
$primeryTable='property';
$primeryField='propertyId';
$editHeader='Edit Property';
$addHeader='Add Property';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');

 
 
 function resizeImage($img)
{

global $site;
 /*list($width, $height) = getimagesize($img);
   $newwidth = 50;
 $newheight = 50;
 echo $img;
  $thumb = imagecreatetruecolor($newwidth, $newheight);
  $source = imagecreatefromjpeg($img);
  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
  imagejpeg($thumb,$img,100);*/
  $img=$site['imgPath'].$img;
  include('resizeImage.php');
 
   $image = new SimpleImage();
   $image->load($img);
   $image->resize(1090,650);
   $image->save($img);
    
}

$listPAGEUrl2='propertyEdit'.'.php?'.$os->addParams(array('hideTopLeft'),'');
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
 $dataToSave['postcode']=addslashes(varP('postcode')); 
 $dataToSave['price']=varP('price'); 
 $dataToSave['bed']=varP('bed'); 
 $dataToSave['bath']=varP('bath'); 
 $dataToSave['sofa']=varP('sofa'); 
  $dataToSave['houseNO']=varP('houseNO'); 
 $dataToSave['RoadName']=varP('RoadName'); 
 
 $dataToSave['reception']=varP('reception'); 
 $dataToSave['priority']=varP('priority'); 
 $dataToSave['featured']=varP('featured');
 $dataToSave['purposeType']=varP('purposeType');
 $dataToSave['label']=addslashes(varP('label')); 
 $dataToSave['shortDescription']=addslashes(varP('shortDescription')); 
 $dataToSave['fullDescription']=addslashes(varP('fullDescription')); 
 $dataToSave['type']=varP('type'); 
  $dataToSave['propertyType']=varP('propertyType'); 
 
 $dataToSave['leasehold']=addslashes(varP('leasehold')); 
 $dataToSave['groundrent']=addslashes(varP('groundrent')); 
 $dataToSave['servicecharge']=addslashes(varP('servicecharge')); 
 $dataToSave['counciltax']=addslashes(varP('counciltax')); 
 $dataToSave['underground']=addslashes(varP('underground')); 
 $dataToSave['leaseyears']=addslashes(varP('leaseyears')); 
 $dataToSave['epcvalue']=addslashes(varP('epcvalue')); 
 
 
	$dataToSave['printStyle']=addslashes(varP('printStyle')); 
	$dataToSave['bulletText1']=addslashes(varP('bulletText1')); 
	$dataToSave['bulletText2']=addslashes(varP('bulletText2')); 
	$dataToSave['bulletText3']=addslashes(varP('bulletText3')); 
	$dataToSave['bulletText4']=addslashes(varP('bulletText4')); 
	$dataToSave['bulletText5']=addslashes(varP('bulletText5')); 
 
 
 
 
 
 $dataToSave['priceUnit']=$os->propUnit[$dataToSave['type']]; 
 // $dataToSave['seoId']=str_replace(array('-',' ','`',"'",'--','---'),'-',$dataToSave['title'].'-'.$dataToSave['address'].'-for-'.$dataToSave['type']);
  $dataToSave['seoId']=str_replace(array('-',' ','`',"'",'--','---'),'-',$dataToSave['title'].'-for-'.$dataToSave['type']);
  $seoid=uniqueSEOid($dataToSave['seoId'],$dataToSave['seoId'],$rowId);
  $dataToSave['seoId']=$autoSeoId;
  

  
 //$dataToSave['active']=varP('active'); 
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
					
					resizeImage($dataToSave['print']);
					
					
					
					
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
	  $rowId=$insertedId;
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	 
	 }
	
	
}
 

// get row data
if($rowId)
  {
        
		
		$where="$primeryField='$rowId'";
		$pageData=$os->getT($primeryTable,'',$where);
		
		
		if(isset($pageData[0]))
		{
		  $pageData=$pageData[0];
		}
        
  }else{ $editHeader=$addHeader;  }


?>
<?
include('tinyMCE.php');
?>


	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						<form  action="<? echo $listPAGEUrl2 ?>" method="post"   enctype="multipart/form-data"  

id="recordEditForm"  >




												
						<fieldset class="cFielSets"  >
						<legend  class="cLegend">Records Details</legend>
						<span>    </span> 
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Back To List" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
						
						
						
						<table border="0" class="formClass"   >
						<tr >
	  									<td style="width:95px;">Name </td>
										<td colspan="10"  >
										<input value="<?php if(isset($pageData['name'])){ echo $pageData['name']; } ?>" type="text" name="name" id="name" class="textbox fWidth"  style="width:400px;"  /><br /><span class="hintstext">Put a name to identify property ,Only for software reff and search[ex:Fairfield Road E3 2 bed ]</span>
										
										 
										</td>	
											 
										 				
										</tr>
						
						<tr >
	  									<td>Type </td>
										<td colspan="9">
										 
										  <select name="type" id="type" class="textbox fWidth" style="width:60px;">	<? 
										  $os->onlyOption($os->propType,$pageData['type']);	?></select>	
							 
								       <select name="propertyType" id="propertyType" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->propertyType,$pageData['propertyType']);	?></select>	
										  
										 &nbsp; Label    <select name="label" id="label" class="textbox fWidth" style="width:120px;">
							
							 
							<?
							 
							$os->onlyOption($os->propLebel,$pageData['label']);
							  
							?>
							</select>
							             &nbsp; Location <select name="locationId" id="locationId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['locationId'],'propertylocationId','title','propertylocation');
							?>
							</select>
							
										</td>
										 
																
									</tr>
						
						
												
						
<tr >
	  									<td>Title </td>
										<td colspan="10">
										<input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth" style="width:400px;" />
										
										&nbsp; Postcode <input value="<?php if(isset($pageData['postcode'])){ echo $pageData['postcode']; } ?>" type="text" name="postcode" id="postcode" class="textbox fWidth" style="width:60px;"/>
										<br /><span class="hintstext">Title is visible in the website[Ex: "Fairfield Road E3"]</span>
										</td>
										 
										
										  
																
									</tr>
									
											
										<tr>
	  									<td>Address</td>
										<td colspan="10">
										<input value="<?php if(isset($pageData['address'])){ echo $pageData['address']; } ?>" type="text" name="address" id="address" class="textbox fWidth" style="width:400px;"/>
										</td>
															
										</tr>
										
										
										<tr>
	  									<td> Street Name</td>
										<td colspan="10">
									<input value="<?php if(isset($pageData['RoadName'])){ echo $pageData['RoadName']; } ?>" type="text" name="RoadName" id="RoadName" class="textbox fWidth"/>	&nbsp;  House Number/Name <input value="<?php if(isset($pageData['houseNO'])){ echo $pageData['houseNO']; } ?>" type="text" name="houseNO" id="houseNO" class="textbox fWidth" style="width:200px;"/>  [ Both fields Only for rightmove]
										</td>
																
										</tr>
										
										 
											
										
										<tr>
										
										<td>Featured </td>
										<td colspan="10">
										 
										 <select name="featured" id="featured" class="textbox fWidth" style="width:150px;">
							
							 
							<?
							 
							$os->onlyOption($os->propFeature,$pageData['featured']);
							  
							?>
							</select>	&nbsp; Bed <input value="<?php if(isset($pageData['bed'])){ echo $pageData['bed']; } ?>" type="text" name="bed" id="bed" class="textbox fWidth" style="width:40px;"/> &nbsp;Bath 	<input value="<?php if(isset($pageData['bath'])){ echo $pageData['bath']; } ?>" type="text" name="bath" id="bath" class="textbox fWidth" style="width:40px;"/> &nbsp;Sofa    <input value="<?php if(isset($pageData['sofa'])){ echo $pageData['sofa']; } ?>" type="text" name="sofa" id="sofa" class="textbox fWidth" style="width:40px;"/> &nbsp; Price <input value="<?php if(isset($pageData['price'])){ echo $pageData['price']; } ?>" type="text" name="price" id="price" class="textbox fWidth" style="width:90px;"/>
							 <!--<input value="<?php if(isset($pageData['priority'])){ echo $pageData['priority']; } ?>" type="text" name="priority" id="priority" class="textbox fWidth"/>-->
										</td>						
										
	  									
	  								
										</tr>
										
										
											<tr>
											<td>
												Purpose
											</td>
											<td>
												<select name="purposeType" id="purposeType" class="textbox fWidth" style="width:150px;">
							
							 
														<?
														 
														$os->onlyOption($os->purposePorperty,$pageData['purposeType']);
														  
														?>
												</select>
											<td>
										</tr>
									 
										<tr>
										
										<td>Lease Info </td>
										<td>
										 
										<!--<input value="<?php if(isset($pageData['leasehold'])){ echo $pageData['leasehold']; } ?>" type="text" name="leasehold" id="leasehold" class="textbox fWidth"/>-->
										
										<select name="leasehold" id="leasehold" class="textbox fWidth" style="width:140px;">
							<option value=""> </option>
							 
							<?
							 
							$os->onlyOption($os->leasehold,$pageData['leasehold']);
							  
							?>
							</select>	
							
						years <input value="<?php if(isset($pageData['leaseyears'])){ echo $pageData['leaseyears']; } ?>" type="text" name="leaseyears" id="leaseyears" class="textbox fWidth" style="width:35px;"/>
							 
							 
							 
										</td>						
										
	  									<td>Ground Rent </td>
										<td>
										 
										<input value="<?php if(isset($pageData['groundrent'])){ echo $pageData['groundrent']; } ?>" type="text" name="groundrent" id="groundrent" class="textbox fWidth"/>
							
										
										</td>	
	  									<td> Service Charge</td>
										<td>
										 <input value="<?php if(isset($pageData['servicecharge'])){ echo $pageData['servicecharge']; } ?>" type="text" name="servicecharge" id="servicecharge" class="textbox fWidth"/>
										</td>						
										
	  														
										</tr>
										
										<tr>
										
										<td>Council Tax </td>
										<td>
										<input value="<?php if(isset($pageData['counciltax'])){ echo $pageData['counciltax']; } ?>" type="text" name="counciltax" id="counciltax" class="textbox fWidth"/>
										</td>						
										
	  									<td>Underground </td>
										<td>
										 
									<input value="<?php if(isset($pageData['underground'])){ echo $pageData['underground']; } ?>" type="text" name="underground" id="underground" class="textbox fWidth"/>
							
										
										</td>	
	  									<td>EPC </td>
										<td><input value="<?php if(isset($pageData['epcvalue'])){ echo $pageData['epcvalue']; } ?>" type="text" name="epcvalue" id="epcvalue" class="textbox fWidth"/>										</td>						
										
	  														
										</tr>
									 
										
										
											
										
										<tr >
	  									<td> Description </td>
										<td colspan="10">
										 
										<textarea class="textbox fWidth" name="fullDescription" id="fullDescription" rows="4" cols="100"><?php if(isset($pageData['fullDescription'])){ echo $pageData['fullDescription']; } ?></textarea>	
										</td>						
										</tr>
										
										<tr  >
	  									<td>Print Description<br />
										
<input type="radio" name="printStyle" value="bulletStyle"  onclick="showBullet('bulletStyle');" <? if($pageData['printStyle']=='bulletStyle' || $pageData['printStyle']=='' ){ ?> checked="checked" <? } ?>    /> Bullet Style <br />
										<input type="radio" name="printStyle" value="textareaStyle" onclick="showBullet('textareaStyle');" <? if($pageData['printStyle']=='textareaStyle'){ ?> checked="checked" <? } ?> /> Text Editor
										
										
										 </td>
										<td colspan="10" style="height:230px;">
									<div style="display:none; height:225px;" id="textareaStyle">
										<textarea class="textbox fWidth" name="shortDescription" id="shortDescription" rows="2" cols="100"><?php if(isset($pageData['shortDescription'])){ echo $pageData['shortDescription']; } ?></textarea>	
										</div>
											<div style="display:block;height:160px; border:1px solid #F4F4F4; padding:50px 10px 10px 10px; "   id="bulletStyle">
		&bull;<input value="<?php if(isset($pageData['bulletText1'])){ echo $pageData['bulletText1']; } ?>" type="text" name="bulletText1" id="bulletText1" class="textbox fWidth" style="width:500px;"/><br />
		&bull;<input value="<?php if(isset($pageData['bulletText2'])){ echo $pageData['bulletText2']; } ?>" type="text" name="bulletText2" id="bulletText2" class="textbox fWidth" style="width:500px;"/><br />									
		&bull;<input value="<?php if(isset($pageData['bulletText3'])){ echo $pageData['bulletText3']; } ?>" type="text" name="bulletText3" id="bulletText3" class="textbox fWidth" style="width:500px;"/><br />									       
		&bull;<input value="<?php if(isset($pageData['bulletText4'])){ echo $pageData['bulletText4']; } ?>" type="text" name="bulletText4" id="bulletText4" class="textbox fWidth" style="width:500px;"/><br />
		&bull;<input value="<?php if(isset($pageData['bulletText5'])){ echo $pageData['bulletText5']; } ?>" type="text" name="bulletText5" id="bulletText5" class="textbox fWidth" style="width:500px;"/><br />									</div>
										<script>
										function showBullet(style)
										{
										
										 os.hide('textareaStyle');
										  os.hide('bulletStyle');
										    os.show(style);
										
										}
										<?  if($pageData['printStyle']){ ?>
										
										 showBullet('<?  echo $pageData['printStyle']; ?>');
										 <?  } ?>
										</script>
										</td>						
										</tr>
										<tr><td></td><td colspan="20"> <font style="color:#FF0000; font-weight:bold;">Special char , space not allowed in any image of file name.</font></td></tr>
												
											
										
										<tr>
										<td>Floorplan  <br />
										
									</td>
										<td >
										 <? if($pageData['floorplan']!=''){ ?>
										<a href="<?php  echo $site['urlFront'].$pageData['floorplan']; ?>"  target="_blank" />
							<img  src="<?  echo $site['urlFront'] ?><?php  echo $pageData['floorplan']; ?>" height="100"	 />		
										
										</a>
										<? } ?>
										<img id="floorplanPreview" src="" height="100" style="display:none;"	 />		
                                         <br> 
										  
										  <input type="file" name="floorplan"  id="floorplan" onchange="readURL(this,'floorplanPreview') "/>
 
										</td>						
										
	  									<td>EPC </td>
										<td >
										 
									 
                                       
									    <? if($pageData['EPC']!=''){ ?>
										<a href="<?php  echo $site['urlFront'].$pageData['EPC']; ?>"  target="_blank" />
							<img src="<? echo $site['urlFront'] ?><?php  echo $pageData['EPC']; ?>"	height="100"	 />		
										
										</a>
										<? } ?>
									   <img id="epcPreview" src="" height="100" style="display:none;"	 />		
									     <br>  <input type="file" name="EPC"  id="EPC" onchange="readURL(this,'epcPreview') "/>
										
										</td>						
										
	  									<td>Print Image </td>
										<td>
										
										 <? if($pageData['print']!=''){ ?>
										<a href="<?php  echo $site['urlFront'].$pageData['print']; ?>"  target="_blank" />
							<img src="<? echo $site['urlFront'] ?><?php  echo $pageData['print']; ?>"	height="100"	 />		
										
										</a>
										<? } ?>
										
										 <img id="printPreview" src="" height="100" style="display:none;"	 />		
										<!-- <a href="<?php  echo $site['urlFront'].$pageData['print']; ?>"  target="_blank" /><?php   echo  $pageData['print']; ?></a>-->
                                         <br>  <input type="file" name="print"  id="print" onchange="readURL(this,'printPreview') "/> 
										 
										 <font style="font-style:italic; color:#9B0000">image should be   1090x650 </font>
															</td>	
										</tr>
											
									   <tr style="display:none;" >
	  									<td>Active </td>
										<td colspan="10">
										<input value="<?php if(isset($pageData['active'])){ echo $pageData['active']; } ?>" type="text" name="active" id="active" class="textbox fWidth"/>
										</td>						
										</tr>		
											
											
											
											
										
										<tr>
	  									<td>Brochure PDF </td>
										<td >
										 <? if($pageData['brochurePdf']!=''){ ?>
										<a href="<?php  echo $site['urlFront'].$pageData['brochurePdf']; ?>"  target="_blank" />
										  pdf
							<!--<img src="<? echo $site['urlFront'] ?><?php  echo $pageData['brochurePdf']; ?>"	height="100"	 />		-->
										
										</a>
										<? } ?>
										  <br> 
										  <br>  <input type="file" name="brochurePdf"  id="brochurePdf"/> 
										</td>	
										
										<td>QR Code Image </td>
										<td >
										 <? if($pageData['qrCode']!=''){ ?>
										<a href="<?php  echo $site['urlFront'].$pageData['qrCode']; ?>"  target="_blank" />
							<img src="<? echo $site['urlFront'] ?><?php  echo $pageData['qrCode']; ?>"	height="100"	 />		
										
										</a>
										<? } ?>
										 <img id="qrcodePreview" src="" height="100" style="display:none;"	 />		
									 
										  <br>  <input type="file" name="qrCode"  id="qrCode" onchange="readURL(this,'qrcodePreview') "/> 
										</td>	
										
										<td>Gas Certificate </td>
										<td co >
										 <? if($pageData['gasCertificate']!=''){ ?>
										<a href="<?php  echo $site['urlFront'].$pageData['gasCertificate']; ?>"  target="_blank" />
										  pdf
							<!--<img src="<? echo $site['urlFront'] ?><?php  echo $pageData['gasCertificate']; ?>"	height="100"	 />		-->
										
										</a>
										<? } ?>
										  <br> 
										  <br>  <input type="file" name="gasCertificate"  id="gasCertificate"/> 
										</td>	
										
										
															
										</tr>
											
										
										
						
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Back To List" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
							 <!-- iframe set  parameter -->
							 <? if($notdisabled){?>
						 <input type="button" name="ajaxSubmit" value="<? echo  ($rowId)?'Save':'Add'; ?>"  onclick="formDatas()" />	
						 <span id="updatemsg"> </span>
						 <script>
						  // collect values    
						  function formDatas()
						  {
						      var paramsIframe='operation=updateField&title='+os.getVal('title')+
								'&name='+os.getVal('name')+
								'&locationId='+os.getVal('locationId')+
								'&address='+os.getVal('address')+
								'&postcode='+os.getVal('postcode')+
								'&price='+os.getVal('price')+
								'&bed='+os.getVal('bed')+
								'&bath='+os.getVal('bath')+
								'&reception='+os.getVal('reception')+
								'&priority='+os.getVal('priority')+
								'&featured='+os.getVal('featured')+
								'&label='+os.getVal('label')+
								'&shortDescription='+os.getVal('shortDescription')+
								'&fullDescription='+os.getVal('fullDescription')+
								'&type='+os.getVal('type')+							 
								'&priceUnit='+os.getVal('priceUnit');
														
								
								
						      saveFormData(paramsIframe,'<?php echo $primeryTable ?>','<?php echo $primeryField ?>','<?php echo $rowId ?>')
						  }
                         
  						 </script>	
					       <?  }?>
						 <!-- iframe set parameter end -->
						
						
						
						
						
						</form>
						
					</div>
					
					
					
					  <!-- iframe set  -->
				  <?php include('iframeTabs.php'); ?>
				   <? $iframeHide= ($rowId)?'display:block':'display:none';   ?>
			       <div class="iFrameTabs" style=" <?php echo $iframeHide; ?>" id="iFrameTabs" >  
			            <div id="tabHolder" style="padding:0px 0px 0px 0px;">
						<div class="tabs" id="tab1" onclick="openTab('tab1');" >Images</div>
						
						<div class="tab lastTab" id="" onclick="#" >&nbsp; </div>
						
						<div style="clear:both"> </div>
						 
						
						
						<div id="tab1tab1" class="tabText" style="display:block;"> 
						<iframe src="propertyimage.php?hideTopLeft=1&<?php echo $primeryField ?>=<?php echo $rowId ?>" class="iframeLink" name="iF[]" width="1100" height="480" style="border:none;"></iframe>
						
						
						</div>
						
			            </div>
			   </div>
			   <!-- iframe set  end -->
					
					
			  </td>
			  </tr>
			</table>

<script>

 //tmce('shortDescription');
 // tmce('fullDescription');
 
 function readURL(input,prevId) {

if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
 os.show(prevId);
$('#'+prevId).attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}
 
 
 </script>
		 

   
	<? include('bottom.php')?>