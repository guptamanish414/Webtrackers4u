<?php
include('includes/config.php');
include('top.php');

// config 
$rowId=$_GET['editRowId'];

$listPAGE='settings';
$primeryTable='settings';
$primeryField='settingsId';
$editHeader='EDIT SETTINGS';
// get row data
if($rowId)
  {
        
	   $where="$primeryField='$rowId'";
		$pageData=$os->getT($primeryTable,'',$where);
		
		
		if(isset($pageData[0]))
		{
		  $pageData=$pageData[0];
		}
        
  }




$admintypes=array('Admin'=>'Admin','Super Admin'=>'Super Admin');
$adminAccess=array('0'=>'No','1'=>'Yes');
?>

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						<form  action="<? echo $listPAGE ?>.php" method="post"   enctype="multipart/form-data">
						
						<fieldset class="cFielSet"  >
						<legend  class="cLegend">  Details</legend>
						
						
						<table border="0" class="formClass"   >
						<tr >
							
							
							<td>keyword</td>
							<td>
								<input value="<?php if(isset($pageData['keyword'])){ echo $pageData['keyword']; } ?>" type="text" name="keyword" class="textbox fWidth" readonly="readonly" style="background-color:#F7F7F9" />
								
								
								
								
								
							</tr>
							<tr>
							
							
							
							<td>value </td>
							<td>
							<textarea name="value" style="height:30px; width:500px;" ><?php if(isset($pageData['value'])){ echo $pageData['value']; } ?></textarea>
							
							
						</tr>
						
					
						
						
					
								
								
							</table>
						
						
						   
						
						</fieldset>
						
						
						
						
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit"  value="Cancel" 
									onclick="javascript:window.location='<? echo $listPAGE ?>.php';" />	
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


					

   
	<? include('bottom.php')?>