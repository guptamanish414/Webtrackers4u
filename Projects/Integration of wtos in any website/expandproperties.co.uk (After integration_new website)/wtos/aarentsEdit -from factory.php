<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='aarents';
$primeryTable='rents';
$primeryField='rentsId';
$editHeader='Edit Rents';
$addHeader='Add Rents';
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
	  									<td>Property </td>
										<td><select name="propertyId" id="propertyId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['propertyId'],'propertyId','title','property');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Applicant </td>
										<td><select name="applicantId" id="applicantId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['applicantId'],'memberId','firstName','member');
							?>
							</select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Month </td>
										<td><select name="rentMonths" id="rentMonths" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->rentMonths,$pageData['rentMonths']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Year </td>
										<td><select name="rentYears" id="rentYears" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->rentYears,$pageData['rentYears']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Amount </td>
										<td><input value="<?php if(isset($pageData['amount'])){ echo $pageData['amount']; } ?>" type="text" name="amount" id="amount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Received? </td>
										<td><select name="amountStatus" id="amountStatus" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->amountStatus,$pageData['amountStatus']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Paid To landlord </td>
										<td><select name="llAmountStatus" id="llAmountStatus" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->llAmountStatus,$pageData['llAmountStatus']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Profit </td>
										<td><input value="<?php if(isset($pageData['profit'])){ echo $pageData['profit']; } ?>" type="text" name="profit" id="profit" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Contract Status </td>
										<td><select name="contractStatus" id="contractStatus" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->contractStatus,$pageData['contractStatus']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Remarks </td>
										<td><input value="<?php if(isset($pageData['remarks'])){ echo $pageData['remarks']; } ?>" type="text" name="remarks" id="remarks" class="textbox fWidth"/>
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