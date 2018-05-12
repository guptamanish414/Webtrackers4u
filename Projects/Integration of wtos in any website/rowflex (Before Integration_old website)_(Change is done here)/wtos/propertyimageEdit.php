<?php
include('includes/config.php');
 include('aaHeader.php'); 

// config 

$rowId=$_GET['editRowId'];
$listPAGE='propertyimage';
$primeryTable='propertyimage';
$primeryField='propertyImageId';
$editHeader='Edit Property Image';
$addHeader='Add Property Image';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','propertyId'),'');

$listPAGEUrl2='propertyimageEdit'.'.php?'.$os->addParams(array('hideTopLeft','propertyId'),'');

if($_GET['propertyId']!=''){ $pageData['propertyId']=$_GET['propertyId'];}
function resizeImage($img)
{

global $site;
 /*list($width, $height) = getimagesize($img);
   $newwidth = 50;
 $newheight = 50;
 echo $img;
  $thumb = imagecreatetruecolor($newwidth, $newheight);
  $source = imagecreatefromjpeg($img);
  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
  imagejpeg($thumb,$img,100);*/
  $img=$site['imgPath'].$img;
  include('resizeImage.php');
 
   $image = new SimpleImage();
   $image->load($img);
 //  $image->resize(503,311);
     $image->resize(656,437);
   $image->save($img);
    
}




##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	
	  #---- edit section ----#
		
		
 $dataToSave['propertyId']=varP('propertyId'); 
 $dataToSave['title']=varP('title'); 

 $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
				   	if($image!=''){
					$dataToSave['image']='wtos-images/'.$image;
						resizeImage($dataToSave['image']);
					if($rowId) { //  $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);
					}
					} 					
					
				
					
		 $dataToSave['type']=varP('type'); 
		 $dataToSave['active']=1; //varP('active'); 

		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	 // $rowId=$insertedId;
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	 
	 }
	
	
}
 

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
						
						<form  action="<? echo $listPAGEUrl2 ?>" method="post"   enctype="multipart/form-data"  

id="recordEditForm"  >
												
						<fieldset class="cFielSets"  >
						<legend  class="cLegend">Records Details</legend>
						<span>    </span> 
						
						<table border="0" class="formClass"   >
												
						
<tr style="display:none;"  >
	  									<td>Property </td>
										<td>
										<input value="<?php if(isset($pageData['propertyId'])){ echo $pageData['propertyId']; } ?>" type="text" name="propertyId" id="propertyId" class="textbox fWidth"/> 								</td>						
										
                                        <td>&nbsp;</td>
</tr>
											
										
										<tr >
	  									<td>Title </td>
										<td>
										<input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth"/>										</td>						
										<td rowspan="3" valign="top">&nbsp;<div style="  width:300px; margin:0px 0px 0px 20px; font-style:italic; font-size:16px; font-family:Verdana, Arial, Helvetica, sans-serif;   color:#FF0000;" > <!--slider home 558x265-->

Image should be  656 x 437  pixel
<!--feature 273 x 128  pixel<br />
listing 200 x 143  pixel<br />
listing small 138 x 73  pixel<br />
sliding 179 x 128  pixel-->

</div></td>
										</tr>
											
										
										<tr >
	  									<td>Image </td>
										<td>
										
										<?  if($pageData['image']!=''){ ?>
										<img src="<?php  echo $site['urlFront'].$pageData['image']; ?>"  height="100" width="100" />
										<? } ?>
                                         <br>  <input type="file" name="image"  id="image"/>										</td>						
										</tr><tr style="display:none;" >
	  									<td>Type </td>
										<td>
										
										<select name="type" id="type" class="textbox fWidth" style="width:160px; float:left;">
							
							 
							<?
							 
							$os->onlyOption($os->propImageType,$pageData['type']);
							  
							?>
							</select>										</td>						
										</tr>
											
										
										<tr style="display:none;" >
	  									<td>Active </td>
										<td>
										<input value="<?php if(isset($pageData['active'])){ echo $pageData['active']; } ?>" type="text" name="active" id="active" class="textbox fWidth"/>										</td>						
										<td>&nbsp;</td>
										</tr>
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Back to image list" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


					

   
	<? include('bottom.php')?>