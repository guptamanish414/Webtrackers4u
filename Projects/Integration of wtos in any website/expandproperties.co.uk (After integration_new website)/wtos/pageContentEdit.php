<?php
include('includes/config.php');
include('top.php');

// config 
$rowId=$_GET['editRowId'];

$listPAGE='pageContent';
$primeryTable='pagecontent';
$primeryField='pagecontentId';
$editHeader='EDIT PAGE CONTENT ';
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
<?
include('tinyMCE.php');
?>
<!--<select name="catId" id="propertycategory">
							<option> All Ads category</option>
							<?
							
							 $os->optionsHTML($pageData['catId'],'catId','title','propertycategory');
							?>
							</select>-->
	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						<form  action="<? echo $listPAGE ?>.php" method="post"   enctype="multipart/form-data">
						
						<fieldset class="cFielSets"  >
						<legend  class="cLegend">Details</legend>
						
						
						<table width="100%" border="0" class="formClass"   >
						
						 
                          <tr >
                            <td width="100">Link Name</td>
                            <td width="300" >
							<input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" style="width:300px;" type="text" name="title" class="textbox fWidth" onblur="setSeoId();" id="title" />                       </td>
                            <td colspan="3" >Page Under:  
                            
							 
							<select name="parentPage" id="parentPage" class="textbox fWidth" style="width:150px;">
							
							<option value="0"> No Parent </option>
							<?
							
							 $os->optionsHTML($pageData['parentPage'],'pagecontentId','title','pagecontent');
							?>
							</select>						
							
							 Language    <select name="langId" id="langId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['langId'],'langId','title','lang');
							?>
							</select>		
								</td>
                          </tr>
						  
						  
						  
						  <tr>  
                            <td>Page Link</td>
                            <td colspan="5"><input value="<?php if(isset($pageData['seoId'])){ echo $pageData['seoId']; } ?>" style="width:650px;" type="text" name="seoId" class="textbox fWidth"  id="seoId"/></td>
                           
                          
						  </tr>
						  <tr >
							<td  >&nbsp;</td>
							<td style="color:#0000CC;"  ><input type="checkbox" name="onHead" id="onHead" value="1" <?php if($pageData['onHead']=='1'){ ?> checked="checked" <? } ?>  />Place on Head Menu</td>
							<td colspan="20"   style="color:#0000CC;"  ><input type="checkbox" name="onBottom" value="1" <?php if($pageData['onBottom']=='1'){ ?> checked="checked" <? } ?>>
						    Place on Bottom Menu</td>
						</tr>
						  
						   <tr >
                            <td  >Heading</td>
                            <td colspan="5" >
							<input value="<?php if(isset($pageData['heading'])){ echo $pageData['heading']; } ?>" style="width:300px;" type="text" name="heading" class="textbox fWidth" id="heading"/>                            </td>
                             
                          </tr>
						  
 
	  
	  
	  <tr>  
	  
	      <td>External Link</td>
                            <td  ><input value="<?php if(isset($pageData['externalLink'])){ echo $pageData['externalLink']; } ?>" style="width:300px;" type="text" name="externalLink" class="textbox fWidth"/> 
							</td>
							<td colspan="5"> 
							 <input type="checkbox" name="openNewTab" value="1" <?php if($pageData['openNewTab']=='1'){ ?> checked="checked" <? } ?>  /> 
							 <font style="color:#0000FF">Open in a new tab</font><font style="font-size:9px; color:#FF0000;"> (Leave if you are not sure &nbsp;) </font>
							</td>
                           
                            
						  </tr>  <!--<tr>
                            <td>Pre Include</td>
                            <td colspan="5"><input value="<?php if(isset($pageData['preInclude'])){ echo $pageData['preInclude']; } ?>" style="width:300px;" type="text" name="preInclude" class="textbox fWidth"/></td>
                           
                            
						  </tr>-->
                          <tr>
                            <td>Description</td>
                            <td colspan="5">
			                <textarea  name="content" id="description" rows="1" cols="50"><?php if(isset($pageData['content'])){ echo stripslashes($pageData['content']); } ?></textarea>						</td>
                          </tr>
						  
						   <!--<tr>  
                            <td>Post Include</td>
                            <td colspan="5"><input value="<?php if(isset($pageData['postInclude'])){ echo $pageData['postInclude']; } ?>" style="width:300px;" type="text" name="postInclude" class="textbox fWidth"/></td>
                           
                            
						  </tr>-->
						  
						  
						 
						  <tr >
							<td>Meta Tag:</td>
							<td colspan="5">
							<textarea class="textbox fWidth" name="metaTag" id="metaTag"   style="width:650px; height:20px;"><?php if(isset($pageData['metaTag'])){ echo $pageData['metaTag']; } ?></textarea>							</td>
						  </tr>
						<tr >
							<td>Meta Description:</td>
							<td colspan="5">
								<textarea class="textbox fWidth" name="metaDescription" id="metaDescription"  style="width:650px; height:20px;"><?php if(isset($pageData['metaDescription'])){ echo $pageData['metaDescription']; } ?></textarea>							</td>
						  </tr>
						  
						  <tr style="display:none;">
							<td>Image</td>
											
											
                                         <td colspan="20">  
										 <img src="<?php  echo $site['urlFront'].$pageData['image']; ?>"  height="100"  /><br />
                                           <input type="file" name="image" />
										   
										   <input type="checkbox" name="showImage" value="1" <?php if($pageData['showImage']=='1'){ ?> checked="checked" <? } ?>  /> 
							 <font style="color:#0000FF">Show Image</font>
										   </td>
										   </tr>
										   <tr >
							<td>Page Css</td>
							<td colspan="5">
								<textarea class="textbox fWidth" name="pageCss" id="pageCss"  style="width:650px; height:30px;"><?php if(isset($pageData['pageCss'])){ echo $pageData['pageCss']; } ?></textarea>							</td>
						  </tr>
                        </table>
						</fieldset>
						
						
						
						
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit"  value="Cancel" 
									onclick="javascript:window.location='<? echo $listPAGE ?>.php';" />	
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						</form>
					</div>			  </td>
			  </tr>
			</table>


					
<script>

 tmce('description');
 function setSeoId()
 {
 
 <? if(!$rowId){ ?>
	var alise=os.getVal('title');
	os.setVal('heading',alise);
	os.setVal('seoId',alise);
	os.setVal('metaDescription', alise);
	os.setVal('metaTag', alise);
	os.getObj('onHead').checked=true;
	 
	<? } ?>
 
 }
 
</script>
   
	<? include('bottom.php')?>