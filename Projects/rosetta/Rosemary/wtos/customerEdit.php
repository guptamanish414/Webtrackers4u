<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='customer';
$primeryTable='customer';
$primeryField='customerId';
$editHeader='Edit Customer';
$addHeader='Add Customer';
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
	  									<td>Name </td>
										<td><input value="<?php if(isset($pageData['name'])){ echo $pageData['name']; } ?>" type="text" name="name" id="name" class="bigTextBox  textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Phone </td>
										<td><input value="<?php if(isset($pageData['phone'])){ echo $pageData['phone']; } ?>" type="text" name="phone" id="phone" class="bigTextBox  textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Email </td>
										<td><input value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" id="email" class="bigTextBox  textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Address </td>
										<td>
                   <textarea name="address" id="address" class="textarea"><?php if(isset($pageData['address'])){ echo $pageData['address']; } ?></textarea>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Shipping Address </td>
										<td>
      <textarea name="shippingAddress" id="shippingAddress" class="textarea"><?php if(isset($pageData['shippingAddress'])){ echo $pageData['shippingAddress']; } ?></textarea>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Password </td>
										<td><input value="<?php if(isset($pageData['password'])){ echo $pageData['password']; } ?>" type="password" name="password" id="password" class="textbox fWidth"/>
                                        &nbsp;<input type="checkbox" id="showPassword" onclick="sp('showPassword','password')" /> <span id="spText">Show Password</span>
										</td>						
										</tr>
											
										<tr >
	  									<td>Dealer </td>
										<td><select name="dealer" id="dealer" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->yesNO,$pageData['dealer']);?></select>	
  
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
				 function sp(ckId,fieldId){
				 	if(os.getObj(ckId).checked==true){
						os.getObj(fieldId).setAttribute('type', 'text');
						os.setHtml('spText','Hide Password');						
					}
					else{os.getObj(fieldId).setAttribute('type', 'password');os.setHtml('spText','Show Password');}
				 }
				</script>	

   
	<? include('bottom.php')?>