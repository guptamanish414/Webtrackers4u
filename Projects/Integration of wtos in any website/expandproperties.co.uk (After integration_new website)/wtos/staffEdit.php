<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='staff';
$primeryTable='staff';
$primeryField='staffId';
$editHeader='Edit Staff';
$addHeader='Add Staff';
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
										<td><input value="<?php if(isset($pageData['name'])){ echo $pageData['name']; } ?>" type="text" name="name" id="name" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Designation </td>
										<td><input value="<?php if(isset($pageData['designation'])){ echo $pageData['designation']; } ?>" type="text" name="designation" id="designation" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr style="display:none;" >
	  									<td>Status </td>
										<td><select name="status" id="status" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->statusActive,$pageData['status']);	?></select>	
  
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