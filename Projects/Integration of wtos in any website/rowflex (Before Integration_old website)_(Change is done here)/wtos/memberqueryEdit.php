<?php
include('includes/config.php');
include('top-inner.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='memberquery';
$primeryTable='memberquery';
$primeryField='memberqueryId';
$editHeader='Edit Requirements';
$addHeader='Add Requirements';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','memberId'),'');
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

	<table class="container" style="width:100%; margin:0px;">
				<tr>
				 
			  <td   class="middle" style="padding-left:5px;">
			 
			  
			 <div class="formsection">
						 
						
						<form  action="<? echo $listPAGEUrl ?>" method="post"   enctype="multipart/form-data"  

id="recordEditForm"  >
												
						<fieldset class="cFielSets"  >
						<legend  class="cLegend"><?php  echo $editHeader; ?></legend>
						 
						
						<table border="0" class="formClass"   >
									
										<tr >
	  									<td>Date </td>
										<td><input value="<?php if(isset($pageData['qDate'])){ echo $os->showDate($pageData['qDate']); } ?>" type="text" name="qDate" id="qDate" class="dtpk textbox fWidth" style="width:80px;"/>
										</td>						
										 
	  									<td>Min Budget </td>
										<td><input value="<?php if(isset($pageData['minBudget'])){ echo $pageData['minBudget']; } ?>" type="text" name="minBudget" id="minBudget" class="textbox fWidth" style="width:80px;"/>
										</td>						
										 
	  									<td>Max Budget </td>
										<td><input value="<?php if(isset($pageData['maxBudget'])){ echo $pageData['maxBudget']; } ?>" type="text" name="maxBudget" id="maxBudget" class="textbox fWidth" style="width:80px;"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Location</td>
										<td><select name="preferedLoc" id="preferedLoc" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['preferedLoc'],'propertylocationId','title','propertylocation');
							?>
							</select>
  
										</td>						
										
	  									<td>Prop. Type </td>
										<td colspan="3"><select name="propType" id="propType" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->propertyType,$pageData['propType']);	?></select>	
  
										</td>						
										</tr>
											
										
										
										
										
										<tr >
										<td colspan="2"><input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Cancel" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" /></td>
	  									<td>Note </td>
										<td colspan="3"><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										
						
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						
						
						
						
						
						
						
						
						
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


				<script>
				 dateCalander();
				</script>	

   
	<? include('bottom-inner.php')?>