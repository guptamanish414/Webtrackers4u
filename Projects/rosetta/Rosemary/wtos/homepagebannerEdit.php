<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='homepagebanner';
$primeryTable='homepagebanner';
$primeryField='homepagebannerId';
$editHeader='Edit Homepagebanner';
$addHeader='Add Homepagebanner';
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
										<td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['imageLink']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="imageLink"  id="imageLink"/>
										</td>						
										</tr><tr >
	  									<td>Category </td>
										<td><select name="productcategoryId" id="productcategoryId" class="textbox fWidth" >
                                        
                                                <?
												
                                                ?>
                                        </select>
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Image Status </td>
										<td><select name="status" id="status" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->homeBannerStatus,$pageData['status']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Show Order </td>
										<td><input value="<?php if(isset($pageData['showOrder'])){ echo $pageData['showOrder']; } ?>" type="text" name="showOrder" id="showOrder" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Banner Link </td>
										<td><input value="<?php if(isset($pageData['bannerLink'])){ echo $pageData['bannerLink']; } ?>" type="text" name="bannerLink" id="bannerLink" class="textbox fWidth"/>
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