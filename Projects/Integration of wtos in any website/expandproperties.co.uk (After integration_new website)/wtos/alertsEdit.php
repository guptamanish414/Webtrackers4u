<?php
include('includes/config.php');
include('top-inner.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='alerts';
$primeryTable='alerts';
$primeryField='alertsId';
$editHeader='Edit Alerts';
$addHeader='Add Alerts';
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

	<table class="container">
				<tr>
					
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
	  									<td>Alert Type </td>
										<td><select name="alertType" id="alertType" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->alertType,$pageData['alertType']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Title </td>
										<td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
									
											
										
										<tr >
	  									<td>Booked By </td>
										<td><input value="<?php if(isset($pageData['bookedBy'])){ echo $pageData['bookedBy']; } ?>" type="text" name="bookedBy" id="bookedBy" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>ExecuteBy </td>
										<td><input value="<?php if(isset($pageData['executeBy'])){ echo $pageData['executeBy']; } ?>" type="text" name="executeBy" id="executeBy" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Execution Date </td>
										<td><input value="<?php if(isset($pageData['executionDate'])){ echo $os->showDate($pageData['executionDate']); } ?>" type="text" name="executionDate" id="executionDate" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Duration </td>
										<td><input value="<?php if(isset($pageData['duration'])){ echo $pageData['duration']; } ?>" type="text" name="duration" id="duration" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Time </td>
										<td><input value="<?php if(isset($pageData['startTime'])){ echo $pageData['startTime']; } ?>" type="text" name="startTime" id="startTime" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>EndTime </td>
										<td><input value="<?php if(isset($pageData['endTime'])){ echo $pageData['endTime']; } ?>" type="text" name="endTime" id="endTime" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Appo. Status </td>
										<td><input value="<?php if(isset($pageData['appoStatus'])){ echo $pageData['appoStatus']; } ?>" type="text" name="appoStatus" id="appoStatus" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Follow. Status </td>
										<td><input value="<?php if(isset($pageData['folloStatus'])){ echo $pageData['folloStatus']; } ?>" type="text" name="folloStatus" id="folloStatus" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Note </td>
										<td><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
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

   
	<? include('bottom-inner.php')?>