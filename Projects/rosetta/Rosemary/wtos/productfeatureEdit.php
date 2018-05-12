<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='productfeature';
$primeryTable='productfeature';
$primeryField='productfeatureId';
$editHeader='Edit Product Feature';
$addHeader='Add Product Feature';
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

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						<form  action="<? echo $listPAGEUrl ?>" method="post"   enctype="multipart/form-data"  

id="recordEditForm"  >
												
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
							
							 $os->optionsHTML($pageData['parentId'],'productfeatureId','title','productfeature');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Price </td>
										<td><input value="<?php if(isset($pageData['price'])){ echo $pageData['price']; } ?>" type="text" name="price" id="price" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Product Type </td>
										<td><input value="<?php if(isset($pageData['productType'])){ echo $pageData['productType']; } ?>" type="text" name="productType" id="productType" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										
						
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Cancel" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


				<script>
				 dateCalander();
				</script>	

   
	<? include('bottom.php')?>