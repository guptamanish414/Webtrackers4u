<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='contactus';
$primeryTable='contactus';
$primeryField='contactid';
$editHeader='Edit contactus';
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
												
						<fieldset class="cFielSets"  >
						<legend  class="cLegend"> Edit Records</legend>
						<span>    </span> 
						
						<table border="0" class="formClass"   >
												
						
<tr >
	  									<td>name </td>
										<td>
										<input value="<?php if(isset($pageData['name'])){ echo $pageData['name']; } ?>" type="text" name="name" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>email </td>
										<td>
										<input value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>mobile </td>
										<td>
										<input value="<?php if(isset($pageData['mobile'])){ echo $pageData['mobile']; } ?>" type="text" name="mobile" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>details </td>
										<td>
										<input value="<?php if(isset($pageData['details'])){ echo $pageData['details']; } ?>" type="text" name="details" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>image </td>
										<td>
									<!--	<img src="<?php  echo $site['urlFront'].$pageData['image']; ?>"  height="100" width="100" />-->
									<a href="<?php  echo $site['urlFront'].$record['image']; ?>" target="_blank"><?php  echo $site['urlFront'].$record['image']; ?></a>
                                         <br>  <input type="file" name="image" />
										</td>						
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