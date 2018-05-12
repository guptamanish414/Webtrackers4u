<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='coupon';
$primeryTable='coupon';
$primeryField='couponId';
$editHeader='Edit Coupon';
$addHeader='Add Coupon';
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
        
  }else{ $editHeader=$addHeader; $pageData['generateDate'] = date('d-m-Y'); }

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
	  									<td>Code </td>
										<td><input value="<?php if(isset($pageData['code'])){ echo $pageData['code']; } ?>" type="text" name="code" id="code" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Details </td>
										<td><input value="<?php if(isset($pageData['details'])){ echo $pageData['details']; } ?>" type="text" name="details" id="details" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Valid From </td>
										<td><input value="<?php if(isset($pageData['validFrom'])){ echo $os->viewDate($pageData['validFrom']); } ?>" type="text" name="validFrom" id="validFrom" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Valid To </td>
										<td><input value="<?php if(isset($pageData['validTo'])){ echo $os->viewDate($pageData['validTo']); } ?>" type="text" name="validTo" id="validTo" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Generate Date </td>
										<td><input value="<?php if(isset($pageData['generateDate'])){ echo $os->viewDate($pageData['generateDate']); } ?>" type="text" name="generateDate" id="generateDate" class="textbox fWidth readonly" readonly="readonly" style="width:100px; font-weight:bold; color:#036; font-size:13px;"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Coupon Type </td>
										<td><select name="couponType" id="couponType" class="newSelectBox" >	<? 
										  $os->onlyOption($os->couponType,$pageData['couponType']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Product Count </td>
										<td><input value="<?php if(isset($pageData['productCount'])){ echo $pageData['productCount']; } ?>" type="text" name="productCount" id="productCount" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Discount </td>
										<td><input value="<?php if(isset($pageData['discount'])){ echo $pageData['discount']; } ?>" type="text" name="discount" id="discount" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Category </td>
										<td><select name="productcategoryId" id="productcategoryId" class="newSelectBox" >
							<option value="">All Category</option>
							 		<?
							
							 $os->optionsHTML($pageData['productcategoryId'],'productcategoryId','title','productcategory');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Status </td>
										<td><select name="status" id="status" class="SelectBox" >	<? 
										  $os->onlyOption($os->activeStatus,$pageData['status']);	?></select>	
  
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