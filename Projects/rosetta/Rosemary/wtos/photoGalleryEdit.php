<?php
include('includes/config.php');
include('top.php');

// config 
$rowId=$_GET['editRowId'];

$listPAGE='photoGallery';
$primeryTable='photogallery';
$primeryField='photoGalleryId';
$editHeader='EDIT IMAGE UPLOADER';
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
						
						
						<table border="0" class="formClass">
						<tr>
							<td>
							Title:</td>
							<td>
							<input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title"  style="width:210px;" class="textbox fWidth"/>							
							</td>
							<td>
							Category:</td>
							<td>
							<select name="galleryCatagoryId" id="gallerycatagory">
							<option> All Galary category</option>
							<?
							 $os->optionsHTML($pageData['galleryCatagoryId'],'galleryCatagoryId','categoryName','gallerycatagory');
							?>
							</select>
							</td>
							</tr>
							
							
						<tr>
							<td>Image</td>
											
											
                                         <td colspan="20">  
										 <img src="<?php  echo $site['urlFront'].'wtos-images/'.$pageData['name']; ?>"  height="200" width="200" />
                                           <input type="file" name="image" />
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