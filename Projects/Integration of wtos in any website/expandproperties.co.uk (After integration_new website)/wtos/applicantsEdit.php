<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='applicants';
$primeryTable='member';
$primeryField='memberId';
$editHeader='Edit Applicants';
$addHeader='Add Applicants';
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
	  									<td>Code </td>
										<td><input value="<?php if(isset($pageData['code'])){ echo $pageData['code']; } ?>" type="text" name="code" id="code" class="textbox fWidth"/>
										</td>						
										
	  									<td>Mobile </td>
										<td><input value="<?php if(isset($pageData['mobile'])){ echo $pageData['mobile']; } ?>" type="text" name="mobile" id="mobile" class="textbox fWidth"/>
										</td>						
										
	  									<td>Telephone </td>
										<td><input value="<?php if(isset($pageData['telephone'])){ echo $pageData['telephone']; } ?>" type="text" name="telephone" id="telephone" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>First Name </td>
										<td><input value="<?php if(isset($pageData['firstName'])){ echo $pageData['firstName']; } ?>" type="text" name="firstName" id="firstName" class="textbox fWidth"/>
										</td>						
										
	  									<td>Last Name </td>
										<td><input value="<?php if(isset($pageData['lastName'])){ echo $pageData['lastName']; } ?>" type="text" name="lastName" id="lastName" class="textbox fWidth"/>
										</td>						
										
	  									<td>Email </td>
										<td><input value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" id="email" class="textbox fWidth"/>
										</td>						
										</tr>
										
										
											
										
										<tr >
	  									<td>House Name </td>
										<td><input value="<?php if(isset($pageData['flatOrHouseName'])){ echo $pageData['flatOrHouseName']; } ?>" type="text" name="flatOrHouseName" id="flatOrHouseName" class="textbox fWidth"/>
										</td>						
										
	  									<td>Address </td>
										<td><input value="<?php if(isset($pageData['address'])){ echo $pageData['address']; } ?>" type="text" name="address" id="address" class="textbox fWidth"/>
										</td>						
										
	  									<td>Post Code </td>
										<td><input value="<?php if(isset($pageData['postCode'])){ echo $pageData['postCode']; } ?>" type="text" name="postCode" id="postCode" class="textbox fWidth"/>
										</td>						
										</tr>
											<tr >
	  									<td>Purpose </td>
										<td><input value="<?php if(isset($pageData['purpose'])){ echo $pageData['purpose']; } ?>" type="text" name="purpose" id="purpose" class="textbox fWidth"/>
										</td>						
										
	  									<td>Source </td>
										<td><select name="source" id="source" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->source,$pageData['source']);	?></select>	
  
										</td>						
										
	  									<td>Status </td>
										<td><select name="status" id="status" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->status,$pageData['status']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Note </td>
										<td><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>						
										
	  									<td>Registered </td>
										<td colspan="10"><input value="<?php if(isset($pageData['registerDate'])){ echo $os->showDate($pageData['registerDate']); } ?>" type="text" name="registerDate" id="registerDate" class="dtpk textbox fWidth"/>
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