<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='orders';
$primeryTable='orders';
$primeryField='orderId';
$editHeader='Edit Order';
$addHeader='Add Order';
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
	  									<td>Customer </td>
										<td><select name="customerId" id="customerId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['customerId'],'customerId','name','customer');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Status </td>
										<td><select name="status" id="status" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->orderStatus,$pageData['status']);	?></select>	
  
										</td>						
										</tr>
                                        
                                        <tr >
	  									<td>Payment Status </td>
										<td><select name="paymentStatus" id="paymentStatus" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->paymentStatus_order,$pageData['paymentStatus']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Note </td>
										<td><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Delivery Charge </td>
										<td><input value="<?php if(isset($pageData['deliveryCharge'])){ echo $pageData['deliveryCharge']; } ?>" type="text" name="deliveryCharge" id="deliveryCharge" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Delivery Date </td>
										<td><input value="<?php if(isset($pageData['deliveryDate'])){ echo $os->viewDate($pageData['deliveryDate']); } ?>" type="text" name="deliveryDate" id="deliveryDate" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Order Date </td>
										<td><input value="<?php if(isset($pageData['orderDate'])){ echo $os->viewDate($pageData['orderDate']); } ?>" type="text" name="orderDate" id="orderDate" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Amount </td>
										<td><input value="<?php if(isset($pageData['amount'])){ echo $pageData['amount']; } ?>" type="text" name="amount" id="amount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Discount Percent </td>
										<td><input value="<?php if(isset($pageData['discountPercent'])){ echo $pageData['discountPercent']; } ?>" type="text" name="discountPercent" id="discountPercent" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Discount Amount </td>
										<td><input value="<?php if(isset($pageData['discountAmount'])){ echo $pageData['discountAmount']; } ?>" type="text" name="discountAmount" id="discountAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Total Amount </td>
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