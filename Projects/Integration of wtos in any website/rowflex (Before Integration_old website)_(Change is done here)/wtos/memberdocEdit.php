<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='memberdoc';
$primeryTable='memberdoc';
$primeryField='memberdocId';
$editHeader='Edit Memberdoc';
$addHeader='Add Memberdoc';
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
	  									<td>Title </td>
										<td><input value="<?php if(isset($pageData['docTitle'])){ echo $pageData['docTitle']; } ?>" type="text" name="docTitle" id="docTitle" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Dated </td>
										<td><input value="<?php if(isset($pageData['dated'])){ echo $os->showDate($pageData['dated']); } ?>" type="text" name="dated" id="dated" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>File </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['docFile']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="docFile"  id="docFile"/>
										</td>						
										</tr><tr >
	  									<td>Status </td>
										<td><input value="<?php if(isset($pageData['status'])){ echo $pageData['status']; } ?>" type="text" name="status" id="status" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Note </td>
										<td><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Member </td>
										<td><input value="<?php if(isset($pageData['memberId'])){ echo $pageData['memberId']; } ?>" type="text" name="memberId" id="memberId" class="textbox fWidth"/>
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