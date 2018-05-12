<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='events';
$primeryTable='events';
$primeryField='eventId';
$editHeader='Edit Events';
$addHeader='Add Events';
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
	  									<td>Event Title </td>
										<td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Event  Dated </td>
										<td><input value="<?php if(isset($pageData['dated'])){ echo $os->showDate($pageData['dated']); } ?>" type="text" name="dated" id="dated" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Venu </td>
										<td><input value="<?php if(isset($pageData['venu'])){ echo $pageData['venu']; } ?>" type="text" name="venu" id="venu" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Details </td>
										<td><textarea value="<?php if(isset($pageData['details'])){ echo $pageData['details']; } ?>" type="t" name="details" id="details" class="textbox fWidth"></textarea>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['image']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="image"  id="image"/>
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