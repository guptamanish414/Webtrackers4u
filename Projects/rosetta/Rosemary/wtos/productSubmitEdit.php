<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='productSubmit';
$primeryTable='productSubmit';
$primeryField='productSubmitId';
$editHeader='Edit Product Submit';
$addHeader='Add Product Submit';
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
										<td><input value="<?php if(isset($pageData['make'])){ echo $pageData['make']; } ?>" type="text" name="make" id="make" class="bigTextBox vtextbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Model </td>
										<td><input value="<?php if(isset($pageData['model'])){ echo $pageData['model']; } ?>" type="text" name="model" id="model" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Description </td>
										<td>
                                        <textarea name="description" id="description" class="textarea"><?php if(isset($pageData['description'])){ echo $pageData['description']; } ?></textarea>
										</td>						
										</tr>
										
                                        <tr >
	  									<td>Old Price </td>
										<td><input value="<?php if(isset($pageData['oldPrice'])){ echo $pageData['oldPrice']; } ?>" type="text" name="oldPrice" id="oldPrice" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>	
										
										<tr >
	  									<td>Price </td>
										<td><input value="<?php if(isset($pageData['price'])){ echo $pageData['price']; } ?>" type="text" name="price" id="price" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Available Quantity </td>
										<td><input value="<?php if(isset($pageData['availableQuantity'])){ echo $pageData['availableQuantity']; } ?>" type="text" name="availableQuantity" id="availableQuantity" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Dealer </td>
										<td><select name="dealerId" id="dealerId" class="newSelectBox" >
										<!--<option value="">Select Dealer</option>-->
							 		<?
							
							 $os->optionsHTML($pageData['dealerId'],'customerId','name','customer',"dealer='Yes'",'name ASC','');
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
											
											
										
										<tr >
	  									<td>Image 1 </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['img1']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="img1"  id="img1"/>
										</td>						
										</tr><tr >
	  									<td>Image 2 </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['img2']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="img2"  id="img2"/>
										</td>						
										</tr><tr >
	  									<td>Image 3 </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['img3']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="img3"  id="img3"/>
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