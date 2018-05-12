<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='image';
$primeryTable='image';
$primeryField='imageId';
$editHeader='Edit Image';
$addHeader='AddImage';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','imageType','imageTypeId'),'');



$imageType = $_GET['imageType'];

$imageTypeId = $_GET['imageTypeId'];


if($imageType=='' || $imageTypeId<1){echo '<font style="color:#FF0000; font-weight:bold;">Image Type or Image Type Id Not Found...</font>';exit();}


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
										<td>
										<input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="bigTextBox textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['image']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="image"  id="image"/>
										</td>						
										</tr><tr >
	  									<td>Image Type </td>
										<td>
										
										<select id="imageType"  name="imageType" class="SelectBox">										
										<?php $os->onlyOption($os->imageType,$pageData['imageType']);?>
										</select>
										</td>						
										</tr>
											
											
										
										
						
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Back" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


					

   
	<? include('bottom.php')?>