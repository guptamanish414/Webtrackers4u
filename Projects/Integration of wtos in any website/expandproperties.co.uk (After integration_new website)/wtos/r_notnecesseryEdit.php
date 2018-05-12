<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='r_notnecessery';
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
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['applicantId']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="applicantId"  id="applicantId"/>
										</td>						
										</tr><tr >
	  									<td>Month </td>
										<td><input value="<?php if(isset($pageData['rentMonths'])){ echo $pageData['rentMonths']; } ?>" type="text" name="rentMonths" id="rentMonths" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>rentYears </td>
										<td><input value="<?php if(isset($pageData['rentYears'])){ echo $pageData['rentYears']; } ?>" type="text" name="rentYears" id="rentYears" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>amount </td>
										<td><input value="<?php if(isset($pageData['amount'])){ echo $pageData['amount']; } ?>" type="text" name="amount" id="amount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>amountStatus </td>
										<td><input value="<?php if(isset($pageData['amountStatus'])){ echo $pageData['amountStatus']; } ?>" type="text" name="amountStatus" id="amountStatus" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>llAmount </td>
										<td><input value="<?php if(isset($pageData['llAmount'])){ echo $pageData['llAmount']; } ?>" type="text" name="llAmount" id="llAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>llAmountStatus </td>
										<td><input value="<?php if(isset($pageData['llAmountStatus'])){ echo $pageData['llAmountStatus']; } ?>" type="text" name="llAmountStatus" id="llAmountStatus" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>profit </td>
										<td><input value="<?php if(isset($pageData['profit'])){ echo $pageData['profit']; } ?>" type="text" name="profit" id="profit" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>contractStatus </td>
										<td><input value="<?php if(isset($pageData['contractStatus'])){ echo $pageData['contractStatus']; } ?>" type="text" name="contractStatus" id="contractStatus" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>remarks </td>
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