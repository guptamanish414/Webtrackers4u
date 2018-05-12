<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='orderdetails';
$primeryTable='orderdetails';
$primeryField='orderdetailsId';
$editHeader='Edit Order Details';
$addHeader='Add Order Details';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','orderId'),'');

$orderId = varG('orderId');
if($orderId<1){echo '<font style="color:#FF0000; font-weight:bold;">Order Id Not Found...</font>';exit();}
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
	  									<td>Product </td>
										<td><select name="productId" id="productId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['productId'],'productId','name','product');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Quantity </td>
										<td><input value="<?php if(isset($pageData['quantity'])){ echo $pageData['quantity']; } ?>" type="text" name="quantity" id="quantity" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Price </td>
										<td><input value="<?php if(isset($pageData['ourPrice'])){ echo $pageData['ourPrice']; } ?>" type="text" name="ourPrice" id="ourPrice" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Amount </td>
										<td><input value="<?php if(isset($pageData['totalAmount'])){ echo $pageData['totalAmount']; } ?>" type="text" name="totalAmount" id="totalAmount" class="textbox fWidth"/>
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