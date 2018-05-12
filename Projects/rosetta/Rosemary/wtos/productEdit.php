<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='product';
$primeryTable='product';
$primeryField='productId';
$editHeader='Edit Product';
$addHeader='Add Product';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
// get row data
if($rowId)
  {
        
		
		$where="$primeryField='$rowId'";
		$pageData=$os->getT($primeryTable,'',$where);
		
		$catArr = $os->getMe("SELECT GROUP_CONCAT(productcategoryId) AS catIds FROM productcategorymap WHERE productId='$rowId'");
		$feaArr = $os->getMe("SELECT GROUP_CONCAT(productfeatureId) AS feaIds FROM productfeaturemap WHERE productId='$rowId'");
		$catStrArr = array();
		$feaStrArr = array();
		
		if(is_array($catArr) && count($catArr)>0){$catArr=$catArr[0];$catIds = $catArr['catIds'];$catStrArr=explode(',',$catIds);}
		
		if(is_array($feaArr) && count($feaArr)>0){$feaArr=$feaArr[0];$feaIds = $feaArr['feaIds'];$feaStrArr=explode(',',$feaIds);}
		
		
		if(isset($pageData[0]))
		{
		  $pageData=$pageData[0];
		}
        
  }else{ $editHeader=$addHeader;  }
include('tinyMCE.php');
?>
<form  action="<? echo $listPAGEUrl ?>" method="post"   enctype="multipart/form-data"  id="recordEditForm"  >
	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						
												
						<fieldset class="cFielSets"  >
						<legend  class="cLegend">Records Details</legend>
						<span>    </span> 
						
						<table border="0" class="formClass"   >
												
						
<tr >
	  									<td>Name </td>
										<td><input value="<?php if(isset($pageData['name'])){ echo $pageData['name']; } ?>" type="text" name="name" id="name" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Code </td>
										<td><input value="<?php if(isset($pageData['code'])){ echo $pageData['code']; } ?>" type="text" name="code" id="code" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
                                        
                                        <tr >
	  									<td>Make </td>
										<td><input value="<?php if(isset($pageData['make'])){ echo $pageData['make']; } ?>" type="text" name="make" id="make" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
                                        
										<tr >
	  									<td>Model </td>
										<td><input value="<?php if(isset($pageData['model'])){ echo $pageData['model']; } ?>" type="text" name="model" id="model" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Short Description </td>
										<td>
 <textarea name="shortDescription" id="shortDescription" class="textarea"><?php if(isset($pageData['shortDescription'])){ echo stripslashes($pageData['shortDescription']); } ?></textarea>                                
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Specifications </td>
										<td>
<textarea name="fullDescription" id="fullDescription" class="textarea"><?php if(isset($pageData['fullDescription'])){ echo stripslashes($pageData['fullDescription']); } ?></textarea>
										</td>						
										</tr>
											
										
										
										
										<tr >
	  									<td>Price </td>
										<td><input value="<?php if(isset($pageData['ourPrice'])){ echo $pageData['ourPrice']; } ?>" type="text" name="ourPrice" id="ourPrice" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
                                        
                                        <tr >
	  									<td>Old Price </td>
										<td><input value="<?php if(isset($pageData['oldPrice'])){ echo $pageData['oldPrice']; } ?>" type="text" name="oldPrice" id="oldPrice" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										<tr >
	  									<td>Active </td>
										<td><select name="active" id="active" class="newSelectBox" >	<? 
										  $os->onlyOption($os->activeStatus,$pageData['active']);	?></select>	
  
										</td>						
										</tr>
                                        
										<tr >
	  									<td>Status </td>
										<td><select name="status" id="status" class="newSelectBox" >	<? 
										  $os->onlyOption($os->productStatus,$pageData['status']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr>
	  									<td>Featured </td>
										<td><select name="featured" id="featured" class="newSelectBox" >	<? 
										  $os->onlyOption($os->productFeatured,$pageData['featured']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Orders </td>
										<td><input value="<?php if(isset($pageData['orders'])){ echo $pageData['orders']; } ?>" type="text" name="orders" id="orders" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Dealer </td>
										<td><select name="dealerId" id="dealerId" class="newSelectBox" >
										<option value="">Select Dealer</option>
							 		<?
							
							 $os->optionsHTML($pageData['dealerId'],'customerId','name','customer',"dealer='Yes'",'name ASC','');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										
						
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Cancel" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						
						
					</div>
			  </td>
              
              <td valign="top" style="padding:5px; background:#FFFFFF; width:250px; border:2px solid #A6A6A6;">
			  <!-- category -- features-->
			  <style>
			  .hding{ text-align:center; font-size:15px; font-weight:bold; background:#464646; color:#FFFFFF; padding:5px;}
			  .ctHding{ color:#363636; font-weight:bold; font-size:13px; background:#E4E4E4; padding:2px 0px 2px 0px;}<!--0070A6-->
			  .ckbox{}
			  .subCat{ margin-left:20px; color:#494949; margin-top:3px;}
			  .pType{ font-size:9px; font-weight:normal;}
			  </style>
			  <div style="font-family:Verdana, Arial, Helvetica, sans-serif; overflow-y:scroll;">
			  <div class="hding">Categoty</div>
			  
			  <div style="margin:10px;">
			  	<?php 
				    $featureIds='';
					$categoryA = $os->get_productcategory(" parentId=0");
					if(is_array($categoryA) && count($categoryA)>0){
					foreach($categoryA as $k=>$cVal){
					$pcId = $cVal['productcategoryId'];
					$extraStyle = '';
					if(strlen($cVal['title'])>15){$extraStyle='style="font-size:10px;"';}
				?>
				<div style="margin-top:5px;">
				<div class="ctHding" <?php echo $extraStyle;?>>
				<input type="hidden" name="featureIdsA[]" value="<? echo str_replace(',,','', $cVal['featureIds']); ?>" />
				<input <?php if(is_array($catStrArr) && in_array($cVal['productcategoryId'],$catStrArr)){ 	$featureIds .=str_replace(',,','',$cVal['featureIds']); ?> checked="checked"<?php }?> type="checkbox" name="ctgr[]" id="" value="<?php echo $cVal['productcategoryId'];?>" onclick="getFeaturesIds('<? echo  $rowId?>')" />&nbsp;<?php echo $cVal['title'];?>&nbsp;
				<span class="pType"><?php if($cVal['productType']!=''){?>[<?php echo $cVal['productType'];?>]<?php }?></span>
				</div>
				<?php 
					$subCat1A = $os->get_productcategory(" parentId='$pcId'");
					if(is_array($subCat1A) && count($subCat1A)>0){
					foreach($subCat1A as $sk1=>$sVal1){
				?>
				<div class="subCat">
				<input type="hidden" name="featureIdsA[]" value="<? echo str_replace(',,','', $sVal1['featureIds']); ?>" />
				<input <?php if(is_array($catStrArr) && in_array($sVal1['productcategoryId'],$catStrArr)){?> checked="checked"<?php }?> class="ckbox" type="checkbox" name="ctgr[]" id="" value="<?php echo $sVal1['productcategoryId'];?>" onclick="getFeaturesIds('<? echo  $rowId?>')"  />&nbsp;<?php echo $sVal1['title'];?></div>
				<?php }}?>
				
				</div>
				<?php }}?>
			  </div>
			
			   <div class="hding">Features</div>
			  
					
				<div style="margin:10px;" id="featuresDivId">
			
			  
			  </div>
				<script> getCategoryFeatures ('<? echo $featureIds ?>','<? echo  $rowId?>') </script>
			 </div>
			  <!-- category -- features-end -->
			
			  </td>
			  </tr>
			</table>
</form>

				<script>
				tmce('fullDescription');
				 dateCalander();
				</script>	

   
	<? include('bottom.php')?>