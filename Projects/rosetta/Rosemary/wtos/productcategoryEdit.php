<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='productcategory';
$primeryTable='productcategory';
$primeryField='productcategoryId';
$editHeader='Edit Product Category';
$addHeader='Add Product Category';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
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
	<form  action="<? echo $listPAGEUrl ?>" method="post"   enctype="multipart/form-data"  id="recordEditForm">
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
	  									<td>Title </td>
										<td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Parent </td>
										<td><select name="parentId" id="parentId" class="newSelectBox" >
							<option value="">No Parent</option>
							 		<?
							
							 $os->optionsHTML($pageData['parentId'],'productcategoryId','title','productcategory');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Description </td>
										<td>
         <textarea name="description" id="description" class="textarea"><?php if(isset($pageData['description'])){ echo $pageData['description']; } ?></textarea>                               
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Product Type </td>
										<td><input value="<?php if(isset($pageData['productType'])){ echo $pageData['productType']; } ?>" type="text" name="productType" id="productType" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['img']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="img"  id="img"/>
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
              
                     <td valign="top">
			  <div style="font-family:Verdana, Arial, Helvetica, sans-serif; overflow-y:scroll;">
				<style>
			  .hding{ text-align:center; font-size:15px; font-weight:bold; background:#464646; color:#FFFFFF; padding:5px;}
			  .ctHding{ color:#363636; font-weight:bold; font-size:14px; background:#E4E4E4; padding:2px 0px 2px 0px;}<!--0070A6-->
			  .ckbox{}
			  .subCat{ margin-left:20px; color:#494949; margin-top:3px;}
			  .pType{ font-size:9px; font-weight:normal;}
			  </style>		
						         <div class="hding">Features</div>
			  
				
				<div style="margin:10px;">
			  	<?php 
				    $feaStrArr=array();
					if($pageData['featureIds']!=''){
				    $feaStrArr=explode(',',$pageData['featureIds']);
					}
					$featureA = $os->get_productfeature(" parentId=0");
					if(is_array($featureA) && count($featureA)>0){
					foreach($featureA as $fk=>$fVal){
					$fId = $fVal['productfeatureId'];
				?>
				<div style="margin-top:5px;">
				<div class="ctHding">
				<input <?php if(is_array($feaStrArr) && in_array($fVal['productfeatureId'],$feaStrArr)){?> checked="checked"<?php }?> type="checkbox" name="featureIds[]" id="" value="<?php echo $fVal['productfeatureId'];?>" />&nbsp;<?php echo $fVal['title'];?>&nbsp;
				<span class="pType"><?php if($fVal['productType']!=''){?>[<?php echo $fVal['productType'];?>]<?php }?></span>
				</div>
				<?php 
					$subfea1A = $os->get_productfeature(" parentId='$fId'");
					if(is_array($subfea1A) && count($subfea1A)>0){
					foreach($subfea1A as $fk1=>$fVal1){
				?>
				<div class="subCat">&nbsp;<?php echo $fVal1['title'];?></div>
				<?php }}?>
				
				</div>
				<?php }}?>
			  </div>
			  </div>
			  </td>
			  </tr>
			</table>
	</form>

				<script>
				 dateCalander();
				</script>	

   
	<? include('bottom.php')?>